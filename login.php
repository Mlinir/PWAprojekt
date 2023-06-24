<?php
include 'connect.php';
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
    mysqli_stmt_bind_result($stmt, $hash,$razina);
    mysqli_stmt_fetch($stmt);
    if (password_verify($lozinka,$hash)){
        echo "Uspjesan login";
        session_start();
        $_SESSION['k_ime']=$k_ime;
        $_SESSION['razina']=$razina;
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
            <label for="lozinka">Unesite lozinku:</label>
            <br />
            <input name="lozinka" type="password" />
            <br />
            <input name="submit" type="submit" value="Pošalji" />
        </form>
    </section>
    <footer> Weitere Online-Angebote der Axel Springer SE:</footer>
</body>

</html>