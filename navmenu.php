<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="images/prosettings-logo.webp" alt="Logo"  class="d-inline-block align-text-top navbar-logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <?php  if(Auth::isLogged()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="account.php">Account</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php?logout=1" >Log out</a>
                    </li>
                <?php }
                else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="account.php">Log in</a>
                    </li>
                <?php }
                ?>
            </ul>
        </div>
    </div>
</nav>