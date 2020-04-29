<?php
    session_start();
    include 'backend/connection.php';
    include 'backend/database.php';

    if (!isset($_SESSION['database'])) {
        $_SESSION['database'] = $_POST['databases'];
    }

    $conn->select_db($_SESSION['database']);
    $_SESSION['table'] = $_POST['tables'];
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
                    echo 'Select table from '.$data->getDatabase().':<br>';
                    echo "<form action='view.php' method='post'>";
                    echo '<select name="tables">';
                    $tables = mysqli_query($conn, "SHOW TABLES FROM ".$data->getDatabase()); 
                
                    while ($trow = mysqli_fetch_array($tables)) {
                        echo '<option value="'.$trow[0].'">'.$trow[0].'</option>';
                    }
                
                    echo '</select> ';
                    echo "<input type='submit' value='Select'/></form><br><br>";

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
                ?>
            </p>
    </body>
</html> 