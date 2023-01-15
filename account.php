<!DOCTYPE html>
<html lang="en">
<head>
    <title>PROsettings</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">

    <script src="js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
<?php

require "DBStorage.php";
require "Auth.php";
session_start();

$auth = new Auth();
$storage = new DBStorage();

if(isset($_POST["signin"])) {
    if($storage->login($_POST["login"], $_POST["password"])) {
        Auth::login($_POST["login"]);
    } else { ?>
        <script>
            sendWarning("Wrong username or password");
        </script>
<?php
    }
}
if(isset($_POST["signup"])) {
    if($storage->createUser($_POST["login"],$_POST["name"], $_POST["surname"], $_POST["password"])) {
        Auth::login($_POST["login"]);
    } else {
        ?>
        <script>
            sendWarning("User with this username already exists");
        </script>
        <?php
    }
}
if(isset($_POST["update"])) {
    $storage->updateUser(Auth::getUser(), $_POST["firstName"], $_POST["lastName"], $_POST["team"], $_POST["cpu"], $_POST["gpu"], $_POST["ram"], $_POST["monitor"], $_POST["mouse"], $_POST["keyboard"], $_POST["headset"], $_POST["mousepad"], $_POST["dpi"], $_POST["sensitivity"], $_POST["crosshair"], $_POST["viewmodel"]);
}
if(isset($_POST["delete"])) {
    $storage->deleteUser(Auth::getUser());
}
if(isset($_GET['logout']) && $_GET['logout'] == '1') {
    Auth::logout();
}


?>

<body>
<?php
    include 'navmenu.php';
?>

<?php
    if(!Auth::isLogged()) { ?>
        <div class="form-profile row row-cols-2">
            <div class="form-signin col">
                <form method="post" action="#">
                    <h1 class="h3 mb-3 fw-normal">Sign in</h1>

                    <div class="form-floating">
                        <input type="username" name="login" class="form-control" id="floatingInput" placeholder="Username" required="required" pattern=".{1,30}" title="{1,30}">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required="required" pattern=".{1,100}" title="pattern={1,100}">
                        <label for="floatingInput">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" name="signin" type="submit">Sign in</button>
                </form>
            </div>

            <div class="form-signin col">
                <form method="post" action="#">
                    <h1 class="h3 mb-3 fw-normal">Sign up</h1>

                    <div class="form-floating">
                        <input type="username" name="login" class="form-control" id="floatingInput" placeholder="Username" required="required" pattern=".{1,30}" title="pattern={1,30}">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="firstName" name="name" class="form-control" id="floatingInput" placeholder="First name" required="required" pattern="[A-Za-z]{1,30}" title="pattern=[A-Za-z]{1,30}">
                        <label for="floatingInput">First name</label>
                    </div>
                    <div class="form-floating">
                        <input type="lastName" name="surname" class="form-control" id="floatingInput" placeholder="Last name" required="required" pattern="[A-Za-z]{1,30}" title="pattern=[A-Za-z]{1,30}">
                        <label for="floatingInput">Last Name</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" name="password" class="form-control pass" id="floatingPassword" placeholder="Password" required="required" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,30}$" title="pattern=[A-Za-z0-9]{8,30}">
                        <label for="floatingInput">Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="cpassword" class="form-control confirm-pass" id="floatingPassword" placeholder="Confirm Password" required="required" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,30}$" title="pattern=[A-Za-z0-9]{8,30}">
                        <label for="floatingInput">Confirm Password</label>
                    </div>
                    <div class="indicator">
                        <span class="weak"></span>
                        <span class="medium"></span>
                        <span class="strong"></span>
                    </div>
                    <div class="weak-pass">Your password is too weak!</div>
                    <button class="w-100 btn btn-lg btn-primary signup" name="signup" type="submit">Sign up</button>
                </form>
            </div>
        </div>


<?php }
    else if (Auth::isLogged()){
        $user = $storage->readPlayer(Auth::getUser())?>

            <form class="form-profile" method="post" action="#">
                <h1 class="h3 mb-3 fw-normal ">Edit profile</h1>
                <div class="row configcard">
                    <!--PLAYER-->
                    <div class="col-4 playerData-image">
                        <img class="playercard-background center" src="<?php echo $user["image"]?>">
                    </div>

                    <div class="form-editdata col-8">
                        <h3 class="h4 mb-3 fw-normal">Player</h3>
                        <div class="form-floating">
                            <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Name" value="<?php echo $user["name"]?>">
                            <label for="floatingInput">First name</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="surname" class="form-control" id="floatingInput" placeholder="Surname" value="<?php echo $user["surname"]?>">
                            <label for="floatingInput">Last name</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="country" class="form-control" id="floatingInput" placeholder="Country" value="<?php echo $user["country"]?>">
                            <label for="floatingInput">Country</label>
                        </div>
                        <div class="form-floating">
                            <input type="date" name="birthdate" class="form-control" id="floatingInput" placeholder="Birthdate" value="<?php echo $user["birthdate"]?>">
                            <label for="floatingInput">Birthday</label>
                        </div>
                    </div>
                    <!--PLAYER END-->
                </div>

                <div class="row">
                    <form action="" method="post">
                        <select id="configSelector" onchange="setConfig(this.value)">

                            <option value="">Select Game</option>
                            <?php foreach ($storage->readGames() as $game) {?>
                                <option name="game" type="submit" value="<?php echo $game["ID_game"]  ?>"><?php echo $game["name"]  ?></option>
                            <?php }  ?>


                        </select>

                    </form>
                    <br>

                    <div class="row" id="setConfig">
                    </div>
                </div>

                </div>
                <div class="buttons row row-cols-2">
                    <div class="col">
                        <button class="w-100 btn btn-lg btn-primary sbutton" name="update" type="submit">Save settings</button>
                    </div>
                    <div class="col">
                     <button class="w-100 btn btn-lg btn-primary red sbutton" name="delete" type="submit">Delete account</button>
                    </div>
                </div>

            </form>
<?php } ?>


</body>

</html>