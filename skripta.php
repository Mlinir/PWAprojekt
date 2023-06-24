<?php   
    include 'connect.php';
        if (isset($_POST['submit'])) {
            $naslov = $_POST['naslov'];
            $sazetak=$_POST['sazetak'];
            $sadrzaj = $_POST['sadrzaj'];
            $kategorija=$_POST['kategorija'];
            $imeslike = $_FILES['slika']['name'];
            if (isset($_POST['izbor'])){
                $izbor='DA';
            }else{
                $izbor='NE';
            }

            $query="INSERT INTO vijesti (naslov,sazetak, tekst, kategorija, ime_slike, prikaz_obavijesti)
            VALUES ('$naslov','$sazetak','$sadrzaj','$kategorija','$imeslike','$izbor')";

            $result=mysqli_query($dbc,$query) or
            die('Error querying database');
            if ($result){
                echo 'vijesti uspješno pohranjene';
            }else{
                echo 'pogreska pri pohrani';
            }
            mysqli_close($dbc);
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
                <a h    f="indeks.html"><img src="images/BZ_logo.png" alt="Logo" class="logo-image" /></a>
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
        if (isset($_POST['submit'])) {
            $naslov = $_POST['naslov'];
            $sadrzaj = $_POST['sadrzaj'];

            $slika = $_FILES['slika'];
            $imeslike = $_FILES['slika']['name'];
            $tmpslike = $_FILES['slika']['tmp_name'];


            $destimages = 'images/unos/' . $imeslike;
            move_uploaded_file($tmpslike, $destimages);


            echo '<h1>' . $naslov . '</h1>';
            echo "<img src='images/unos/$imeslike' style='width: 100%';>";
            echo '<p>' . $sadrzaj . '</p>';
        }
        ?>
    </section>
    <footer> Weitere Online-Angebote der Axel Springer SE:</footer>
</body>

</html>