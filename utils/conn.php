<?php
if(session_status() === PHP_SESSION_NONE) {
    header("Location: index.php");
}

$servername = "localhost";
$username = "root";
$password = "root";
$db = "tantemeeuw";

// database connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
}
?>