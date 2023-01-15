
<div class="container">
    <div class="row">
        <form action="" method="post">
            <select id="configSelector" onchange="showConfig(this.value)">

<!--                <option value="">Select Game</option>-->
                <?php foreach ($storage->readGamesByPlayer($_SESSION["player"]) as $game) {?>
                    <option name="game" type="submit" value="<?php echo $game["ID_game"]  ?>"><?php echo $game["name"]  ?></option>
                <?php }  ?>


            </select>

        </form>
        <br>

    <div class="row" id="config">
    </div>
</div>
    <script>showConfig(<?php echo $_SESSION["game"]  ?>);</script>

