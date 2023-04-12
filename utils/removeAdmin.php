<?php
session_start();
require_once 'conn.php';

$id = $_GET['id'];
$rules = 10;

$query = "UPDATE users SET rules=:rules WHERE id=:id";
$stmt = $conn->prepare($query);
$stmt->execute(['rules' => $rules, 'id' => $id]);

header("Location: ../pages/admin.php");
?>