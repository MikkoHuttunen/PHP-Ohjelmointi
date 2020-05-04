<?php
    //query.php:n tarkoitus on antaa käyttäjälle mahdollisuus tehdä kyselyitä valitsemaansa tietokantaan
    session_start();
    include 'backend/connection.php';
    include 'data_object.php';

    //Luodaan uusi tietokanta jos käyttäjä päätti tehdä sellaisen index.php:ssa sijaitsevan lomakkeen kautta 
    if ($_POST['dbname']) {
        $query = mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS ".$_POST['dbname']);
        //Tarkistetaan onko samannimistä tietokantaa jo olemassa, jos on, viedään käyttäjä takaisin etusivulle.
        if ($query) {
            $_SESSION['database'] = $_POST['dbname'];
        } else {
            header('Location: index.php');
        }
    //Tarkistetaan ettei tietokannan nimi ole tyhjä, jos on, viedään käyttäjä takaisin etusivulle.
    //Tarkistetaan myös tuleeko käyttäjä view.php:sta tarkistamalla onko tietokanta jo asetettu session muuttujaan
    } else if ($_POST['dbname'] == '' && !$_SESSION['database']){
        header('Location: index.php');
    }

    //Olio joka sisältää view.php:ssa määritetyt session muuttujat
    $data = new Data($_SESSION['database'], $_SESSION['table']);
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
            <li><a href='view.php'>View</a></li>
            <li><a href='query.php'>Query</a></li>
        </ul>
            <p>
                <?php
                    /*Näytetään käyttäjälle valittu tietokanta ja alue johon tietokantakyselyt voi kirjoittaa.
                    Kyselyn voi suorittaa painamalla Execute painiketta joka lähettää käyttäjän takaisin view.php
                    sivulle ja näyttää siellä tulokset.*/
                    echo 'Run query for <b>'.$data->getDatabase().'</b>:';
                    echo "<form action='view.php' method='post'>";
                    echo "<textarea name='query' rows='20' cols='80' placeholder='Write your query here and press execute.'></textarea> ";
                    echo "<input type='submit' value='Execute'>";
                    echo "</form>"; 
                ?>
            </p>
    </body>
</html> 