<?php
    // Including database connections
    require_once 'database_connections.php';
    // Fetching and decoding the inserted data
    $data = json_decode(file_get_contents("php://input"));
    // Escaping special characters from submitting data & storing in new variables.
    $nimi = mysqli_real_escape_string($conn, $data->nimi);
    $email = mysqli_real_escape_string($conn, $data->email);
    $ruoka = mysqli_real_escape_string($conn, $data->ruoka);
    $sauna = mysqli_real_escape_string($conn, $data->sauna);

    // mysqli insert query
    $query = "INSERT into ilmot (nimi, email, ruoka, sauna) VALUES ('$nimi','$email','$ruoka','$sauna')";
    // Inserting data into database
    mysqli_query($conn, $query);
    echo true;
?>