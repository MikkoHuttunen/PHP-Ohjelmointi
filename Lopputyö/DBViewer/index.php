<?php
    /*index.php tarkoitus on toimia DBViewerin etusivuna jossa haetaan käyttäjän tietokannat localhostista
    ja näytetään ne hänelle dropdown -valikkona. Jos tietokantoja ei ole, käyttäjä voi tehdä sellaisen
    helposti sivun kautta*/

    //Sisällytetään yhteys tietokantaan
    //Aloitetaan sessio mutta tyhjennetään session muuttujat
    session_start();
    session_unset();
    include 'backend/connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' href='css/styles.css'>
        <title>DBViewer</title>
    </head>
    <body>
        <h1>DBViewer</h1><hr><br>
        <ul>
            <li><a href='index.php'>Database</a></li>
        </ul>
        <p>
            <?php
                //Tehdään kysely joka hakee tietokannat serveriltä
                echo 'Select database:<br>';
                $databases = mysqli_query($conn, 'SHOW DATABASES');

                //Jos tietokantoja löytyy, näytetään ne käyttäjälle dropdown listana
                if ($databases) {
                    echo "<form action='view.php' method='post'>";
                    echo '<select name="databases">';

                    while ($dbrow = mysqli_fetch_array($databases)) {
                        echo '<option value="'.$dbrow[0].'">'.$dbrow[0].'</option>';
                    }

                    echo '</select> ';
                    echo "<input type='submit' value='Select'/></form><br>OR<br><br>";
                } else {
                    echo 'No databases found. Create one from below.';
                }

                //Käyttäjä voi lisätä tietokannan antamalla sen nimen ja painamalla create -nappulaa
                echo "<form action='query.php' method='post'>";
                echo "<label for='name'>Create new database: </label>";
                echo "<input type='text' name='dbname' placeholder='Name of the database'> ";
                echo "<input type='submit' value='Create'/></form>";
            ?>
        </p>
    </body>
</html> 