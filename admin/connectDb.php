<?php
$servername = "localhost";
$database   = "web_basic";
$username   = "root";
$password   = "";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {
    die("connection failed: " . mysqli_connect_error());
}

// PDO connection

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
//     // echo "Connected to $database at $servername successfully.";
// } catch (PDOException $pe) {
//     die("Tidak bisa konek ke database $database : " . $pe->getMessage());
// }
