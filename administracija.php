<?php
include 'connect.php';
define('PATH', 'images/unos/');
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: administracija.php");
    die();
}

if (isset($_POST['submit'])) {
    $k_ime = $_POST['k_ime'];
    $lozinka = $_POST['lozinka'];

    $query = "SELECT lozinka,razina FROM korisnik WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 's', $k_ime);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
    mysqli_stmt_bind_result($stmt, $hash, $razina);
    mysqli_stmt_fetch($stmt);
    if (password_verify($lozinka, $hash)) {
        echo "Uspjesan login";
        $_SESSION['k_ime'] = $k_ime;
        $_SESSION['razina'] = $razina;
    }else{
        echo "Pogrešna lozinka";
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM vijesti WHERE id=$id";
    $result = mysqli_query($dbc, $query) or
        die("Error result");
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $naslov = $_POST['naslov'];
    $sazetak = $_POST['sazetak'];
    $sadrzaj = $_POST['sadrzaj'];
    $kategorija = $_POST['kategorija'];
    if (isset($_POST['izbor'])) {
        $izbor = 'DA';
    } else {
        $izbor = 'NE';
    }

    $query = "UPDATE vijesti SET naslov='$naslov', sazetak='$sazetak', tekst='$sadrzaj', kategorija='$kategorija', prikaz_obavijesti='$izbor'";

    if ($_FILES['slika']['error'] === UPLOAD_ERR_OK) {
        $imeslike = $_FILES['slika']['name'];
        $tmpslike = $_FILES['slika']['tmp_name'];
        $destimages = 'images/unos/' . $imeslike;
        move_uploaded_file($tmpslike, $destimages);
        $query .= ", ime_slike='$imeslike'";
    }

    $query .= " WHERE id='$id'";

    $result = mysqli_query($dbc, $query) or die("Error result");
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Projekt</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <a hreff="indeks.html"><img src="images/BZ_logo.png" alt="Logo" class="logo-image" /></a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">home</a></li>
                <li><a href="kategorija.php?id=sport">berlin-sport</a></li>
                <li><a href="kategorija.php?id=kultura">kultur und show</a></li>
                <li><a href="administracija.php">administracija</a></li>
                <li><a href="unos.html">unos</a></li>
            </ul>
        </nav>
    </header>
    <section class="admin">
        <?php
        if (isset($_SESSION['k_ime'])) {
            if ($_SESSION['razina']) {
                echo '<form method="post" action="administracija.php">
            <button type="submit" name="logout">Odjava</button>
            </form>';
                $query = "SELECT * FROM vijesti";
                $result = mysqli_query($dbc, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<form enctype="multipart/form-data" action="administracija.php" method="POST">
                    <br><label for="naslov">Naslov vijesti:</label><br/>
                    <textarea id="naslov" name="naslov" cols="30">' . $row['naslov'] . '</textarea><br/>
                    <label for="sazetak">Kratki sažetak vijesti:</label><br/>
                    <textarea id="sazetak" name="sazetak" rows="10" cols="30">' . $row['sazetak'] . '</textarea><br/>
                    <label for="sadrzaj">Sadržaj vijesti:</label><br/>
                    <textarea id="sadrzaj" name="sadrzaj" rows="10" cols="30">' . $row['tekst'] . '</textarea><br/>
                    <label for="kategorija">Kategorija:</label><br/>
                    <select id="kategorija" name="kategorija" value="' . $row['kategorija'] . '">
                        <option value="' . $row['kategorija'] . '"disable selected>' . ucfirst($row['kategorija']) . '</option>
                        <option value="sport">Sport</option>
                        <option value="kultura">Kultura</option>
                    </select><br/>
                    <label for="slika">Slika:</label><br/>
                    <img src="' . PATH . $row['ime_slike'] . '" width=100px><br/>
                    <input type="file" name="slika" id="slika" value="' . $row['ime_slike'] . '"/> <br>
                    <label>Spremljeno u arhivu: </label>';
                    if ($row['prikaz_obavijesti'] == "DA") {
                        echo '<input type="checkbox" name="izbor" id="izbor" checked />';
                    } else {
                        echo '<input type="checkbox" name="izbor" id="izbor" />';
                    }
                    echo '<br><input type="hidden" name="id" value="' . $row['id'] . '">
                    <button type="reset" value="Poništi">Poništi</button> 
                    <button type="submit" name="update" value="Izmijeni"> Izmijeni</button> 
                    <button type="submit" name="delete" value="Izbriši"> Izbriši</button>
                </form>';
                }
            } else {
                echo $_SESSION['k_ime'] . ", nemate pravo za pristup administratorskoj stranici.";
                echo '<form method="post" action="administracija.php">
                        <button type="submit" name="logout">Odjava</button>
                    </form>';
            }
        } else {

            echo '<form action="administracija.php" method="post">
                    <label for="k_ime">Unesite korisničko ime:</label>
                    <br />
                    <input name="k_ime" type="text" />
                    <br />
                    <label for="lozinka">Unesite lozinku:</label>
                    <br />
                    <input name="lozinka" type="password" />
                    <br />
                    <input name="submit" type="submit" value="Pošalji" />
                </form>';

            echo "<br />Registritajte se na <a href='registracija.php'>Ovom linku</a>";
        }
        ?>
    </section>
    <footer> Weitere Online-Angebote der Axel Springer SE:</footer>
</body>

</html>