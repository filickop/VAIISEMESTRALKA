<?php


    if(isset($_GET["player"])) {

    $_SESSION["player"] = $_GET["player"];
    header("Location: /playerPage.php");
    exit();
    }
?>
<div class="container">

    <div class="row row-cols-sm-2 row-cols-md-3">

        <?php
            foreach ($storage->readPlayers($_SESSION["game"]) as $player) {
        ?>
            <div class="text-center playercard col">
                <a href="?player=<?php echo $player["login"]?>">
                    <div class="playercard-background-back">
                        <img class="playercard-background center" src="<?php echo $player["image"]?>">
                    </div>
                        <div class="row playercard-name">
                            <div class="col">
                                <span><?php echo $player["login"]?></span>
                            </div>

                        </div>

                </a>
            </div>
        <?php
            }
        ?>
    </div>
</div>