<?php

$_server = "localhost";
$_username = "root";
$_password = "";
$_database = "morent";

$conn = new mysqli($_server, $_username, $_password, $_database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<script>alert('Database connected successfully');</script>";



?>