<?php

session_start();
require 'DBStorage.php';

$storage = new DBStorage();

//echo $_SESSION["game"];
$game = $storage->readGame($_SESSION["game"]);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>PRO Settings</title>
    <link rel="icon" href="images/favicon.ico" type="image/icon type">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body class="p-3 m-0 border-0">

    <?php
        include 'navmenu.php';
    ?>

    <div class="container">

        <div class="row">
            <div class="col game-images">
                <img class="gamecard-background" src="<?php echo $game["background"]?>" >
                <img class="gamecard-logo" src="<?php echo $game["logo"]?>">
            </div>
            <div class="col">
                <h1><?php echo $game["name"]?></h1>
                <p class="gamepage-text"><?php echo $game["text"]?></p>
            </div>

        </div>

        <div class="row">
            <?php
                include 'players.php';
            ?>
        </div>

    </div>


</body>
</html>