<?php
    $conn = mysqli_connect("localhost", "root", "", "ourbooks");    
    mysqli_set_charset($conn, 'UTF8');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>