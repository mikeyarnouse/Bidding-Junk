<?php

// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
$now = date('Y-m-d H:i:s');


require_once "config.php";
$sql="Select * from auctions where is_active=0";
$stmt=$pdo->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll();

//echo "what is loggedin ", var_dump($_SESSION["loggedin"]);
//echo "what is is_admin ", var_dump($_SESSION["is_admin"]);
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    sleep(1);
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="griddy.css">
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://unpkg.com/@popperjs/core@2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

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
                <?php
                if($_SESSION["is_admin"] == true) {
                    ?>
                    <a class="nav-link" href="admin.php">Admin Actions</a>
                    <?php
                }
                else{
                    ?>

                    <a class="nav-link" href="#">BiddingJunk</a>

                    <?php
                }
                ?>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="endedauctions.php" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="logout.php">Sign Out of Your Account</a></li>
                    <li> <a class="dropdown-item" href="reset-password.php">Reset Your Password</a></li>
                    <li><hr class="dropdown-divider"></hr></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
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
<li class="divider"></li>
<div class='wrapper'>
    <?php
    foreach ($rows as $row)
    {
        ?>

        <div class="card">
            <img src="images\<?= $row["image"]?>" alt="placeholder">
            <div class="card-body">
                <h4 class="card-title">Item <?= $row["item_name"]?></h4>
                <h5 class="card-text">Category: <?= $row["item_category"]?></h5>
                <h6 class="card-text">Expires: <?=$row["end_time"]?></h6>
                <a href="ended.php?item=<?=$row["item_id"]?>" class="btn btn-info"> Results</a>
            </div>
        </div>

        <?php
    }
    ?>
</div>
<p>

    <!--    <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>-->
    <!--    <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>-->
    <!--    <a href="Biddingjunk.php" class="btn btn-info"> Create a Bid</a>-->
</p>
</body>
</html>