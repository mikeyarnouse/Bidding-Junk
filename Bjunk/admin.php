<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="welcome.php">Welcome</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="endedauctions.php">Ended Auctions<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Sign Out of Your Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reset-password.php">Reset Your Password</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="logout.php">Sign Out of Your Account</a>
                    <a class="dropdown-item" href="reset-password.php">Reset Your Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<p>
    <?php

    ?>
<!--    <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>-->
<!--    <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>-->
    <a href="bidcreation.php" class="btn btn-info"> Create a Bid</a>

</p>
</body>
</html>