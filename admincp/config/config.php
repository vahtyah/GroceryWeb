<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dtbase = "grocerytuan";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dtbase);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
?>