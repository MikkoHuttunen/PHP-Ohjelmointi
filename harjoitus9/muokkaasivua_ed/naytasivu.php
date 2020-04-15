<?php
    session_start();
    include('funktiot.php');
?>

<html>
    <head>
        <title>naytasivu</title>
    </head>
    <body>
        <?php
            if (isset($_SESSION['username'])) {
        ?>

        <p><a href="muokkaasivua.php">Muokkaa sivua</a> - <a href="naytasivu.php">Näytä sivu</a> - <a href='logout.php'>Kirjaudu ulos</a></p>
        <!--Tekstitiedosto tuodaan sivulle-->
        <?php

        $yhteys = connect();
        echo search_field('sisalto', 'Sivukanta', $yhteys);
            } else {
                print 'wrong username or/and password or login deprecated, because session is not used.';
            }
        ?>
    </body>
</html>
