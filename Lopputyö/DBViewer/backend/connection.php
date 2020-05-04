<?php
    //Määritetään serveri, käyttäjätunnus ja salasana tietokantaan pääsemiseksi
    $servername = 'localhost';
    $username = 'root';
    $password;
    $conn = new mysqli($servername, $username, $password);

    //Jos yhteys tuottaa ongelmia näytetään käyttäjälle varoitus
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
?> 