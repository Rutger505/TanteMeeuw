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

    <!-- custom header/footer element -->
    <script src="../script/header.js"></script>
    <script src="../script/footer.js"></script>
    <script src="../script/pageIndicator.js" defer></script>

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
    <custom-header></custom-header>

    <div class="container">
        <div class="content">
            <div class="title_box">
                <h2>Register</h2>
            </div>
            <form name="inlogform" action="login.php" method="POST">
                <input type="text" placeholder="username" name="username" autofocus required>
                <input type="password" placeholder="password" name="password" required>

                <input type="submit" value="Register" name="submit" required>
            </form>
                <p class="font-small">Already have an account? <a href="login.php">Login</a></p>
            <?php
            require 'conn.php';

            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $query = "INSERT INTO users (username, password)VALUES (?, ?)";

                $stmt = $conn->prepare($query);
                $stmt->execute([$username, $password]);

                echo "new record created <br>";
            }
            ?>
        </div>
    </div>
    <div class="fill"></div>
    <custom-footer></custom-footer>
</body>

</html>