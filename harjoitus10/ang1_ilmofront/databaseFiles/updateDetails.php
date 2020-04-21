<?php
    // Including database connections
    require_once 'database_connections.php';
    // Fetching the updated data & storin in new variables
    $data = json_decode(file_get_contents("php://input"));
    // Escaping special characters from updated data
    $id = mysqli_real_escape_string($conn, $data->id);
    $nimi = mysqli_real_escape_string($conn, $data->nimi);
    $email = mysqli_real_escape_string($conn, $data->email);
    $ruoka = mysqli_real_escape_string($conn, $data->ruoka);
    $sauna = mysqli_real_escape_string($conn, $data->sauna);
    // mysqli query to insert the updated data
    $query = "UPDATE ilmot SET nimi='$nimi', email='$email', ruoka='$ruoka', sauna='$sauna' WHERE id=$id";
    mysqli_query($conn, $query);
    echo true;
?>