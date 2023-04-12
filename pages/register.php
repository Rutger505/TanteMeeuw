<?php
session_start();
require_once 'conn.php';
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
                <h2>Register</h2>
            </div>
            <form name="inlogform" action="register.php" method="POST">
                <input type="text" placeholder="username" name="username" autofocus required>
                <input type="password" placeholder="password" name="password" required>

                <input type="submit" value="Register" name="submit" required>
            </form>
            <p class="font-small">Already have an account? <a href="login.php">Login</a></p>
            <?php
            // if form submitted
            if (!isset($_POST['submit'])) {
                exit;
            }
            // get input from form into vars
            $username = $_POST['username'];
            $password = $_POST['password'];

            // search for same account
            $stmt = $conn->prepare("SELECT username FROM users WHERE username=:username");
            $stmt->execute(['username' => $username]);
            $user_exist = $stmt->fetch();

            if (!$user_exist) {
                // insert user an pass into database
                $query = "INSERT INTO users (username, password)VALUES (?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->execute([$username, $password]);
                echo "Account created succesfully <br>";
            } else {
                echo "username already taken <br>";
            }
            ?>
        </div>
    </div>
    <div class="fill"></div>
    <?php
    include "../webcomponents/footer.php"
    ?>
</body>

</html>