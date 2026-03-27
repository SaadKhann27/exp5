<?php
$conn = new mysqli("localhost", "root", "password", "exp7");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>