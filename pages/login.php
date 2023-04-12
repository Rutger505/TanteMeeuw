<?php
session_start();
require_once 'conn.php';
if(isset($_SESSION['username'])){
    header("Location: admin.php");
}
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
                <h2>Login</h2>
            </div>
            <form name="inlogform" action="login.php" method="POST">
                <input name="username" type="text" placeholder="username" autofocus required>
                <input name="password" type="password" placeholder="password" required>

                <input name="submit" type="submit" value="Login">
            </form>
            <p class="font-small">No account? <a href="register.php">Register</a></p>
            <?php
            // if form submitted
            if (isset($_POST['submit'])) {
                // get input from form into vars
                $username = $_POST['username'];
                $password = $_POST['password'];

                // getting username/password
                $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
                $stmt->execute(['username' => $username, 'password' => $password]);
                $user = $stmt->fetch();

                // logged in or not
                if ($user) {
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['rules'] = $user['rules'];
                    $_SESSION['id'] = $user['id'];
                    header("Location: login.php");
                } else {
                    echo "account does not exist lel <br>";
                }
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