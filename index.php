<?php
    session_start();
    require 'DBStorage.php';

    $storage = new DBStorage();

    if(isset($_GET["game"])) {

        $_SESSION["game"] = $_GET["game"];
        header("Location: /gamePage.php");
        exit();
    }
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

        <div class="row row-cols-sm-2 row-cols-md-3">
            <?php
                foreach ($storage->readGames() as $game) {
            ?>
                <div class="text-center gamecard col">
                    <a href="?game=<?php echo $game["ID_game"]?>">
                        <div>
                            <img class="gamecard-background" src="<?php echo $game["background"]?>" >
                            <img class="gamecard-logo" src="<?php echo $game["logo"]?>">
                        </div>
                        <div class="gamecard-text">
                            <span><?php echo $game["name"]?></span>
                        </div>
                    </a>
                </div>
            <?php
                }
            ?>
        </div>
    </div>


</body>
</html>