<?php

session_start();

require 'DBStorage.php';
$storage = new DBStorage();


?>
<div class="container">
    <h3>Players</h3>
    <div class="row row-cols-sm-2 row-cols-md-3">

        <?php
            foreach ($storage->readPlayers($_GET["game"], $_GET["page"]) as $player) {
        ?>

                <a class="text-center playercard col" href="?player=<?php echo $player["login"]?>">
                    <div class="playercard-background-back">
                        <img class="playercard-background center" src="
                        <?php if($player["image"] != "") {
                            echo $player["image"];
                        } else {
                            echo "images/blank_profile.webp" ;
                        }
                        ?>" >
                    </div>
                        <div class="row playercard-name">
                            <div class="col">
                                <span><?php echo $player["login"]?></span>
                            </div>

                        </div>

                </a>

        <?php
            }
        ?>
    </div>
</div>
