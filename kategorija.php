<?php
include 'connect.php';
define('PATH', 'images/unos/');
if (isset($_GET['id'])) {
    $kategorija = $_GET['id'];
}
?>

<html>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <title>Projekt</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <a href="indeks.html"><img src="images/BZ_logo.png" alt="Logo" class="logo-image" /></a>
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
    <section class="<?php echo $kategorija;?>">
        <a href="#" class="section-link">
            <h2><?php echo $kategorija;?></h2>
        </a>
        <?php
        $query = "SELECT * FROM vijesti WHERE prikaz_obavijesti='DA' AND kategorija='$kategorija'";
        $result = mysqli_query($dbc, $query);
        while ($row = mysqli_fetch_array($result)) {
            echo '<article>';
            echo '<img src="' . PATH . $row['ime_slike'] . '" />';
            echo '<a href="clanak.php?id='.$row['id'].'">';
            echo '<h3>' . $row['naslov'] . '</h3>';
            echo '</a>';
            echo '<p>' . $row['sazetak'] . '</p>';
            echo '</article>';
        }
        ?>
    </section>
    <footer> Weitere Online-Angebote der Axel Springer SE:</footer>
</body>

</html>