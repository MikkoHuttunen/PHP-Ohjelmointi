<html>
<head>
<title>naytasivu</title>
</head>
<body>
    <?php
        session_start(); 
        if (isset($_SESSION['username'])) {
    ?>

    <p><a href="muokkaasivua.php">Muokkaa sivua</a> - <a href="naytasivu.php">Näytä sivu</a> - <a href='logout.php'>Kirjaudu ulos</a></p>

    <!--Tekstitiedosto tuodaan sivulle-->
    <?php
        include ('sivu.txt');
    } else {
        print 'wrong username or/and password or login deprecated, because session is not used.';
    }
?>
</body>
</html>
