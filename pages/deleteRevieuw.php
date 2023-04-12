<?php
session_start();
require_once 'conn.php';

$id = $_GET['id'];
echo $id;

$query = "DELETE FROM reacties WHERE id=:id";
$stmt = $conn->prepare($query);
$stmt->execute(['id' => $id	]);
header("Location: gasten.php");
?>