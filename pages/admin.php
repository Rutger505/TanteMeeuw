<?php
session_start();
require_once '../utils/conn.php';
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
if (!$_SESSION['rules'] < 10) {
    header("Location: index.php");
}

$stmt = $conn->prepare("SELECT id, username, rules FROM users");
$stmt->execute();
$users = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- linking css -->
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/footer.css" />

    <!-- scripts -->
    <script src="../script/pageIndicator.js" defer></script>
    <script src="../script/imgSlider.js" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:wght@200&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap" rel="stylesheet" />
</head>

<body>
    <?php
    include "../webcomponents/header.php"
    ?>

    <div class="container">
        <div class="content">
            <div class="title_box">
                <h1>Admin panel</h1>
            </div>
            <p class="color-brown">Add admins</p>

            <?php
            echo "<div class='change-admin-container'>";
            foreach ($users as $user) {
                if ($user['rules'] < 10) {
                    continue;
                }

                $data = "
                <div class='change-admin'>
                    <p class='margin-0'>" . $user['username'] . "</p>
                    <p class='margin-0'>" . $user['rules'] . "</p> 
                    <a href='../utils/makeAdmin.php?id=" . $user['id'] . "'>Make admin</a>
                </div>
                ";
                echo $data;
            }
            echo "</div>";
            ?>
            <p class="color-brown">Remove admins</p>
            <?php

            echo "<div class='change-admin-container'>";
            foreach ($users as $user) {
                if ($user['rules'] >= 10) {
                    continue;
                }

                $data = "
                        <div class='change-admin'>
                            <p class='margin-0'>" . $user['username'] . "</p>
                            <p class='margin-0'>" . $user['rules'] . "</p> 
                            <a href='../utils/removeAdmin.php?id=" . $user['id'] . "'>Remove admin</a>
                        </div>
                        ";
                echo $data;
            }
            echo "</div>";
            ?>

        </div>
    </div>



    <div class="fill"></div>
    <?php
    include "../webcomponents/footer.php"
    ?>
</body>

</html>