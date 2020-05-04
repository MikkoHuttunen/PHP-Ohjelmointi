<?php
    //view.php tarkoitus on näyttää itse tietokannan sisältö ja käyttäjän tekemien kyselyiden tulokset

    //Sisällytetään yhteys sekä olio johon on tallennettu käyttäjän valitsema tietokanta ja sen taulu
    include 'backend/connection.php';
    include 'data_object.php';
    session_start();

    //Asetetaan tietokanta ja taulukko session muuttujiin
    if ($_POST['databases']) {$_SESSION['database'] = $_POST['databases'];}
    if ($_POST['tables']) {$_SESSION['table'] = $_POST['tables'];}

    //Luodaan olio johon sijoitetaan session muuttujat
    $data = new Data($_SESSION['database'], $_SESSION['table']);
    //Haetaan tietokanta oliosta ja otetaan se käyttöön
    $conn->select_db($data->getDatabase());
    //Tarkistetaan onko tietokanta olemassa, jos ei ole, viedään käyttäjä etusivulle
    if (!$conn->select_db($data->getDatabase())) {
        header('Location: index.php');
    }
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
                    /*Haetaan käyttäjän valitsema tietokanta oliosta ja näytetään sen sisältämät taulut.
                    Sen jälkeen käyttäjä voi valita haluamansa taulun dropdown valikosta.*/
                    echo 'Select table from <b>'.$data->getDatabase().'</b>:<br>';
                    echo "<form action='view.php' method='post'>";
                    echo '<select name="tables">';
                    $tables = mysqli_query($conn, "SHOW TABLES FROM ".$data->getDatabase()); 
            
                    while ($trow = mysqli_fetch_array($tables)) {
                        echo '<option value="'.$trow[0].'">'.$trow[0].'</option>';
                    }
            
                    echo '</select> ';
                    echo "<input type='submit' value='Select'/></form><br>";

                    //Kun käyttäjä on valinnut taulun, sivu päivittyy ja näyttää kaiken datan käyttäjän valitsemasta taulusta
                    if ($_POST['tables']) {
                        echo 'Displaying data from <b>'.$data->getTable().'</b>:<br><br>';

                        echo "<table><tr>";
                        $headers = mysqli_query($conn, "SHOW columns FROM ".$data->getTable());

                        while ($throw = mysqli_fetch_array($headers)) {
                            echo '<th>'.$throw[0].'</th>';
                        }

                        echo '</tr>';
                        $result = mysqli_query($conn, "SELECT * FROM ".$data->getTable());

                        while($row = $result->fetch_assoc()) { 
                            echo "<tr>";
                            foreach ($row as $value) {
                                echo "<td>" . $value . "</td>";
                            }
                            echo "</tr>";
                        }
                        echo '</table>';
                    }
                    
                    //Näytetään query.php:ssa käyttäjän tekemän kyselyn tulokset
                    else if ($_POST['query']) {
                        echo 'Query:<br><i><pre>'.$_POST['query'].'</pre></i>Results:<br><br><table>';
                        $result = mysqli_query($conn, $_POST['query']);
                        if ($result) {
                            echo 'Query was succesful!<br><br>';
                            echo "<table><tr>";
                            while($row = $result->fetch_assoc()) { 
                                echo "<tr>";
                                foreach ($row as $value) {
                                    echo "<td>" . $value . "</td>";
                                }
                                echo "</tr>";
                            }
                            echo '</table><br>';
                            echo "Affected rows: " . mysqli_affected_rows($conn);
                        } else {
                            //Näytetään virheilmoitus jos syntaksissa on virhe
                            echo mysqli_error($conn);
                        }
                    }
                ?>
            </p>
    </body>
</html> 