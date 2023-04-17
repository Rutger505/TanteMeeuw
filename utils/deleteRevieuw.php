<?php
session_start();
require_once 'conn.php';

$id = $_GET['id'];

$query = "DELETE FROM reacties WHERE id=:id";
$stmt = $conn->prepare($query);
$stmt->execute(['id' => $id	]);
header("Location: ../pages/gasten.php");
?>