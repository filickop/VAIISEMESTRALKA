<?php

session_start();
require 'DBStorage.php';

$storage = new DBStorage();

$player = $storage->readPlayer($_SESSION["player"]);

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
    <script src="script.js"></script>
</head>
<body class="p-3 m-0 border-0">

    <?php
    include 'navmenu.php';
    ?>
    <div class="container playercontainer">

            <div class="row">
                <div class="col-4 playerData-image">
                    <img class="gamecard-background" src="<?php echo $player["image"]?>" >
                </div>
                <div class="col-8 playerData">
                    <div class="row">
                        <h1><?php echo $player["login"]?></h1>
                    </div>
                    <div class="row">
                        <table>
                            <tbody>
                                <tr class="playerTable-tr">
                                    <th class="playerTable-th">Name</th>
                                    <td class="playerTable-td"><?php echo $player["name"]?></td>
                                    <th class="playerTable-th">Surname</th>
                                    <td class="playerTable-td"><?php echo $player["surname"]?></td>
                                </tr>
                                <tr class="playerTable-tr">
                                    <th class="playerTable-th">Birthday</th>
                                    <td class="playerTable-td"><?php echo $player["birthdate"]?></td>
                                    <th class="playerTable-th">Country</th>
                                    <td class="playerTable-td"><?php echo $player["country"]?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </div>
    <?php
        include 'config.php';
    ?>

</body>
</html>

