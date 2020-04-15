<?php
    session_start();
    include('funktiot.php');
?>

<html>
    <head>
        <title>tallennasivu</title>
    </head>
    <body>
        <?php
            $data = $_POST['muokattu'];
            $yhteys = connect();
            echo update_field('sisalto', 'Sivukanta', $data, $yhteys);
            echo"<meta http-equiv=refresh content='0; url=naytasivu.php'>";
        ?>
    </body>
</html>
