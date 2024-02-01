<?php
require_once ("config.php");

session_start();
//echo "what is ", var_dump($_SESSION["is_admin"]);

$item_id = $_GET["item"];
//echo "Get Item was $item_id";

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
$highestBidder = $bids[0]["username"];
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
    <h1>Auction for <?=$item["item_name"] ?> ended at <?=$endTime?></h1>
    <h2><?= $highestBidder ?> has won the auction for <?=$item["item_name"]?> for $<?=$highestBid?></h2>
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
</body>
</html>