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
                <li><a href="administracija.php">administracija</a></li>
                <li><a href="unos.html">unos</a></li>
            </ul>
        </nav>
    </header>
    <section class="ispis">
        <?php
        if (isset($_GET['id'])) {
            $id=$_GET['id'];
            $query="SELECT * FROM vijesti WHERE id=$id";
            $result = mysqli_query($dbc, $query) or
            die('Error result');
            $row=mysqli_fetch_array($result);
            echo '<h1>' . $row['naslov'] . '</h1>';
            echo "<img src='images/unos/".$row['ime_slike']."' style='width: 100%';>";
            echo '<p>'.$row['tekst'].'</p>';
        }
        ?>
    </section>
    <footer> Weitere Online-Angebote der Axel Springer SE:</footer>
</body>

</html>