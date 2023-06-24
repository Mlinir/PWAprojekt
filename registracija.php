<?php
include 'connect.php';
$msg="";
if (isset($_POST['submit'])) {
    $lozinka = $_POST['lozinka'];
    $lozinka2 = $_POST['lozinka2'];
    if ($lozinka == $lozinka2) {
        $hash = password_hash($lozinka, CRYPT_BLOWFISH);
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $k_ime = $_POST['k_ime'];
        $razina = 0;

        $query = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, 's', $k_ime);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        if (mysqli_stmt_num_rows($stmt) > 0) {
            $msg = 'Korisničko ime već postoji!';
        } else {

            $query = "INSERT INTO korisnik (ime,prezime,korisnicko_ime, lozinka,razina)
        VALUES (?,?,?,?,?)";
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $query)) {
                mysqli_stmt_bind_param($stmt, 'ssssi', $ime, $prezime, $k_ime, $hash, $razina);
                mysqli_stmt_execute($stmt);
            }
            echo "Uspješna registracija";
        }
    }else{
        echo "Lozinke nisu iste";
    }
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
                <a h f="indeks.html"><img src="images/BZ_logo.png" alt="Logo" class="logo-image" /></a>
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
    <section class="registracija">
        <form action="registracija.php" method="post">
            <label for="k_ime">Unesite korisničko ime:</label>
            <br />
            <input name="k_ime" type="text" />
            <?php echo '<br><span class="bojaPoruke">' . $msg . '</span>'; ?>
            <label for="ime">Unesite ime:</label>
            <br />
            <input name="ime" type="text" />
            <br />
            <label for="prezime">Unesite prezime:</label>
            <br />
            <input name="prezime" type="text" />
            <br />
            <label for="lozinka">Unesite lozinku:</label>
            <br />
            <input name="lozinka" type="password" />
            <br />
            <label for="lozinka2">Unesite ponovno lozinku:</label>
            <br />
            <input name="lozinka2" type="password" />
            <br />
            <input name="submit" type="submit" value="Pošalji" />
        </form>
    </section>
    <footer> Weitere Online-Angebote der Axel Springer SE:</footer>
</body>

</html>