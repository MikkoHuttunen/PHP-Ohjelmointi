<?php
    require_once 'database_connections.php';
    $data = json_decode(file_get_contents("php://input"));
    $query = "DELETE FROM ilmot WHERE id=$data->id";
    mysqli_query($conn, $query);
    echo true;
?>