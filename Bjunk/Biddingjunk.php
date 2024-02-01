<?php
require_once ("config.php");
session_start();
//echo "what is ", var_dump($_SESSION["is_admin"]);
if($_SESSION["is_admin"] == 1){
    sleep(1);
    header("location: admin.php");

}
$actionResponse="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $item_id=$_POST["item"];
    $hbid = $_POST["highestBid"];
    $aEndTime = strtotime($_POST["endTime"]);
    $userBid = $_POST["bid"];
    $now = strtotime(date("Y-m-d H:i:s"));
    //$aTimeStamp = $_POST["timestamp"];
    if($userBid>$hbid && $now < $aEndTime)
    {
        $bidSql = "Insert into bids (BiddingAmount,user_id, item_id) values (:amount, :user, :item)";
        if($stmt3 = $pdo->prepare($bidSql))
        {
            $stmt3->bindParam(":amount", $userBid );
            $stmt3->bindParam(":user", $_SESSION["id"]);
            $stmt3->bindParam(":item", $item_id);
            if($stmt3->execute())
            {
                $actionResponse="Bid created successfully";
            }
            else{
                $actionResponse="There was an error with your bid";
            }
        }
        else{
            $actionResponse ="There was an internal error. Please try again later";
        }
    }
    else{
        $actionResponse ="Sorry, your bid must be higher or the auction has already ended.";
    }
    //var_dump($_POST);
    //echo "posted item was $item_id";

}
else {
    $item_id = $_GET["item"];
    //echo "Get Item was $item_id";

}
$sql = "Select * from auctions where item_id = :itemId ";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":itemId", $item_id);
$stmt->execute();
$item = $stmt->fetch();
$endTime = $item["end_time"];

$sql2= "Select b.BiddingAmount, b.timestamp,u.username from bids b
         join users u on b.user_id = u.id
         where item_id=:itemId
         order by b.BiddingAmount desc
         limit 5";
if($stmt2 = $pdo->prepare($sql2)){
    $stmt2->bindParam(":itemId", $item_id);
    if($stmt2->execute())
    {
       $bids = $stmt2->fetchAll();
    }
}
$highestBid = $bids[0]["BiddingAmount"];
$highestBidTimestamp = $bids[0]["timestamp"];

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
<div class="border border-secondary p-2 mb-2 border-opacity-50 gap-3">


<h1><?=$item["item_name"] ?></h1>
<h2><?=$actionResponse?></h2>
<h2>Starting Bid:  <?=$item["starting_bid"]?></h2>
<h2><?=$item["item_category"] ?></h2>
<h1><?=$item["description"] ?></h1>
<h2>Auction will end at: <?=$item["end_time"]?></h2>
</div>
<table class="table table-striped table-info">
    <thead>
    <tr class="table-primary">
        <th scope="col">#</th>
        <th scope="col">Bid Amount</th>
        <th scope="col">Name</th>
        <th scope="col">Time</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $count=1;
    if(isset($bids)){
        foreach($bids as $bid)
        {
            ?>
            <tr class="<?php echo ($count==1) ? 'table-warning' :'' ?>">
                <th scope="row"><?=$count?></th>
                <td><?=$bid["BiddingAmount"]?></td>
                <td><?=$bid["username"]?></td>
                <td><?=$bid["timestamp"]?></td>
            </tr>
        <?php
            $count++;
        }
    }
    else{
        ?>
            <tr>
                <th>No bids</th>
            </tr>
    <?php
    }
    ?>
    </tbody>
</table>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="bid" class="form-label">Place Your Bid</label>
        <div class="input-group">
        <div class="input-group-text">$</div>
        <input type="text" class="form-control" id="bid" name="bid" aria-describedby="bidHelp">
        </div>
    <div id="bidHelp" class="form-text">You'll never fill the hole in your soul unless you win this item</div>
    <input type="hidden" name="item" value="<?= $item_id?>">
    <input type="hidden" name="endTime" value="<?= $endTime?>">
    <input type="hidden" name="highestBid" value="<?= $highestBid ?>">
    <input type="hidden" name="timestamp" value="<?= $highestBidTimestamp?>">
    <button type="submit" class="btn btn-primary">BID!</button>
</form>

</body>
</html>