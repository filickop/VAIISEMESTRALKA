
<div class="container">
    <div class="row">
        <form action="" method="post">
            <select onchange="showCustomer(this.value)">

                <option value="">Select Game</option>
                <?php foreach ($storage->readGamesByPlayer($_SESSION["player"]) as $game) {?>
                    <option name="game" type="submit" value="<?php echo $game["ID_game"]  ?>"><?php echo $game["name"]  ?></option>
                <?php }  ?>


            </select>

        </form>
        <br>

    <div class="row" id="config">
<!--        --><?php //include "csgoconfig.php";?>
    </div>
</div>
