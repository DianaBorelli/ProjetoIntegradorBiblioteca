<?php
    $servername = "localhost";
    $database = "biblioteca";
    $username = "root";
    $password = "1234";


    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou. Erro: " . mysqli_connect_error());
    }
?>