<?php
require 'DBStorage.php';

$storage = new DBStorage();
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
            <img class="gamecard-background" src="/images/cs_go-2.webp" >
            <img class="gamecard-logo" src="/images/cs_go.svg">
        </div>
        <div class="col">
            <h1>CS:GO</h1>
            <p class="gamepage-text">Counter-Strike: Global Offensive is a multiplayer first-person shooter developed by Valve and Hidden Path Entertainment. It is the fourth game in the Counter-Strike series.</p>
        </div>

    </div>

</div>


</body>
</html>