<?php
include 'connect.php';
define('PATH', 'images/unos/');

    if(isset($_POST['delete'])){
        $id=$_POST['id'];
        $query="DELETE FROM vijesti WHERE id=$id";
        $result=mysqli_query($dbc,$query) or
        die("Error result");
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
        <?php $query = "SELECT * FROM vijesti";
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
                        <option value="prazan" disabled selected>' . ucfirst($row['kategorija']) . '</option>
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
        } ?>
    </section>
    <footer> Weitere Online-Angebote der Axel Springer SE:</footer>
</body>

</html>