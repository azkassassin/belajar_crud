<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db   = 'db_sekolah';
    
    $conn = mysqli_connect($host, $user, $pass, $db);
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_select_db($conn, $db);
?>