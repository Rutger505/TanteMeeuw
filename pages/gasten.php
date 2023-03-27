<?php
session_start();
require_once 'conn.php';
// header('Location: login.php')
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include "../webcomponents/header.php"
    ?>
    <div class="container">
        <div class="content">
            <div class="title_box">
                <h2>Hier kun je lezen hoe gasten het verblijf hebben ervaren....
                    en kun je kwijt hoe jij het vond.</h2>
            </div>

            <p class="color-brown">Reactie plaatsen</p>

            <form class="reactie-form" name="reactie-plaatsen" action="gasten.php" method="POST">
                <input type="text" placeholder="naam" name="naam" required>
                <input type="text" placeholder="email" name="email" required> <!-- miss email type maken -->
                <textarea type="text" rows="100" placeholder="bericht" name="bericht" required></textarea>

                <input type="submit" value="Plaatsen" name="submit" required>
            </form>
            <?php
            // if form submitted
            if (isset($_POST['submit'])) {
                // get input from form into vars
                $naam = $_POST['naam'];
                $email = $_POST['email'];
                $bericht = $_POST['bericht'];
                date_default_timezone_set("Europe/Amsterdam");
                $date = date("d-m-Y");

                // search for same reacion
                $stmt = $conn->prepare("SELECT naam, email, bericht FROM reacties WHERE naam=:naam AND bericht=:bericht");
                $stmt->execute(['naam' => $naam, 'bericht' => $bericht]);
                $reaction_exist = $stmt->fetch();

                if (!$reaction_exist) {
                    // insert reaction into database
                    $query = "INSERT INTO reacties (naam, email, bericht, date)VALUES (?, ?, ?, ?)";
                    $stmt = $conn->prepare($query);
                    $stmt->execute([$naam, $email, $bericht, $date]);
                }
            }
            // getting reaction details
            $stmt = $conn->prepare("SELECT * FROM reacties");
            $stmt->execute();
            $reactie = $stmt->fetchAll();

            // print data
            foreach ($reactie as $data) {
                $frame = "
                <div class='reaction'>
                    <div>
                        <h3>" . $data['naam'] . "</h3>
                        <p>" . $data['date'] . "</p>
                    </div>
                    <p style='white-space: pre-line'>"
                    . $data['bericht'] .
                    "</p>
                </div>
                ";
                echo $frame;
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