<?php
session_start();
require_once 'conn.php';

$id = $_GET['id'];

$query = "SELECT * FROM reacties WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->execute(['id' => $id]);
$preData = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form naam="edit-menu-item" action="editRevieuw.php?id=<? echo $id; ?>" method="POST">

        <input name='name' type="text" value="<? echo $preData['naam'] ?>" required>

        <textarea name='bericht' cols="30" rows="10" required><? echo $preData['bericht'] ?></textarea>

        <input name="update" type="submit" value="update">
    </form>

    <?php
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $bericht = $_POST['bericht'];

        try {
            $query = "UPDATE reacties SET naam=:naam, bericht=:bericht WHERE id=:id";
            $stmt = $conn->prepare($query);
            $stmt->execute(['naam' => $name, 'bericht' => $bericht, 'id' => $id]);

            header("Location: gasten.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    ?>
</body>

</html>