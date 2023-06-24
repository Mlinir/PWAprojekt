<?php
include 'connect.php';
define('PATH', 'images/unos/');
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
                <li><a href="nav/administracija.html">administracija</a></li>
                <li><a href="unos.html">unos</a></li>
            </ul>
        </nav>
    </header>
    <section class="admin">
        <?php $query = "SELECT * FROM vijesti";
        $result = mysqli_query($dbc, $query);
        while ($row = mysqli_fetch_array($result)) {
            echo '<form enctype="multipart/form-data" action="administracija.php" method="POST">
    <div class="form-item"> <label for="title">Naslov vjesti:</label>
        <div class="form-field"> <input type="text" name="title" class="form-field-textual" value="' . $row['naslov'] . '"> </div>
    </div>
    <div class="form-item"> <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
        <div class="form-field"> <textarea name="about" id="" cols="30" rows="10" class="form-field-textual">' . $row['sazetak'] . '</textarea> </div>
    </div>
    <div class="form-item"> <label for="content">Sadržaj vijesti:</label>
        <div class="form-field"> <textarea name="content" id="" cols="30" rows="10" class="form-field-textual">' . $row['tekst'] . '</textarea> </div>
    </div>
    <div class="form-item"> <label for="pphoto">Slika:</label>
        <div class="form-field">
            14
            <input type="file" class="input-text" id="pphoto" value="' . $row['ime_slike'] . '" name="pphoto" /> <br><img src="' . PATH . $row['ime_slike'] . '" width=100px> // pokraj gumba za odabir slike pojavljuje se umanjeni prikaz postojeće slike
        </div>
    </div>
    <div class="form-item"> <label for="category">Kategorija vijesti:</label>
        <div class="form-field"> <select name="category" id="" class="form-field-textual" value="' . $row['kategorija'] . '">
                <option value="sport">Sport</option>
                <option value="kultura">Kultura</option>
            </select> </div>
    </div>
    <div class="form-item"> <label>Spremiti u arhivu: <div class="form-field">';
            if ($row['prikaz_obavijesti'] == 0) {
                echo '<input type="checkbox" name="archive" id="archive" /> Arhiviraj?';
            } else {
                echo '<input type="checkbox" name="archive" id="archive" checked /> Arhiviraj?';
            }
            echo '</div> </label> </div>
    </div>
    <div class="form-item"> <input type="hidden" name="id" class="form-field-textual" value="' . $row['id'] . '"> <button type="reset" value="Poništi">Poništi</button> <button type="submit" name="update" value="Prihvati"> Izmjeni</button> <button type="submit" name="delete" value="Izbriši"> Izbriši</button> </div>
</form>';
        } ?>
    </section>
    <footer> Weitere Online-Angebote der Axel Springer SE:</footer>
</body>

</html>