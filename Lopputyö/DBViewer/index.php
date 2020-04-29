<?php
    include 'backend/connection.php';
    session_start();
    session_unset();
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
                echo 'Select database:<br>';
                echo "<form action='view.php' method='post'>";
                echo '<select name="databases">';
                $databases = mysqli_query($conn, 'SHOW DATABASES');

                while ($dbrow = mysqli_fetch_array($databases)) {
                    echo '<option value="'.$dbrow[0].'">'.$dbrow[0].'</option>';
                }

                echo '</select> ';
                echo "<input type='submit' value='Select'/></form>"; 
            ?>
        </p>
    </body>
</html> 