<?php
session_start();
if($_SESSION["is_admin"] == 0){
    sleep(1);
    header("location: welcome.php");

}
// Include config file
require_once "config.php";
$itemCreated ="";
// Define variables and initialize with empty values
$itemName = $itemCategory= $itemDescription = $StartingBid="";
$itemName_err = $itemCategory_err = $itemDescription_err = $StartingBid_err ="";
#var_dump($_POST);
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if Item Name is empty
    if(empty(trim($_POST["itemName"]))){
        $itemName_err = "Please enter an item name";
    } else{
        $itemName = trim($_POST["itemName"]);
    }

    // Check if Item Category is empty
    if(empty(trim($_POST["itemCategory"]))){
        $itemCategory_err = "Please enter an Item Category.";
    } else{
        $itemCategory = trim($_POST["itemCategory"]);
    }

    // Check if item Description is empty
    if(empty(trim($_POST["itemDescription"]))){
        $itemDescription_err = "Please enter an Item Description.";
    } else{
        $itemDescription = trim($_POST["itemDescription"]);
    }

    // Check if StartingBid is empty
    if(empty(trim($_POST["StartingBid"]))){
        $StartingBid_err = "Please enter a Starting Bid.";
    } else{
        $StartingBid = trim($_POST["StartingBid"]);
    }

if(empty($itemName_err) && empty($itemCategory_err) && empty($itemDescription_err) && empty($StartingBid_err)){
        // Prepare a select statement
        $sql = "Insert into auctions (item_name, item_category, description, starting_bid, start_time, end_time) values (:item_name, :item_category, :description, :starting_bid, :start_time, :end_time)";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $startTime = strtotime("now");
            $startTime = date("Y-m-d H:i:s", $startTime);

            $daysToAdd = $_POST["numOfDays"];
            $endTime = strtotime("+$daysToAdd days");
            $endTime = date("Y-m-d H:i:s", $endTime);
            $stmt->bindParam(":item_name", $itemName, PDO::PARAM_STR);
            $stmt->bindParam(":item_category", $itemCategory, PDO::PARAM_STR);
            $stmt->bindParam(":description", $itemDescription, PDO::PARAM_STR);
            $stmt->bindParam(":starting_bid", $StartingBid);
            $stmt->bindParam(":start_time", $startTime);
            $stmt->bindParam(":end_time", $endTime);
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                echo "execute completed";
                $itemCreated = "An auction for $itemName has been created. It will be available until $endTime";
            }
            else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            //ob_end_clean();
            // Close statement
            unset($stmt);
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

    }
    unset($pdo);
}

?>


<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bid Creation</title>



<?php
if(!empty($itemCreated))
{
    ?>
    <h1 class="alert alert-danger" role="alert"><?=$itemCreated ?></h1>
    <?php
}
?>
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

                    <a class="nav-link" href="biddingjunk.php">BiddingJunk</a>

                    <?php
                }
                ?>
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

</head>
<body



    <form class="form-group " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="itemName">Item Name</label>
            <input type="text" class="form-control <?php echo (!empty($itemName_err)) ? 'is-invalid' : ''; ?>"
                   value="<?php echo $itemName; ?>" id="itemName" name="itemName" aria-describedby="itemNameHelp" placeholder="Enter an Item Name">
            <small id="itemNameHelp" class="form-text text-muted">Pick a Catchy name so people look!</small>
            <span class="invalid-feedback"><?php echo $itemName_err; ?></span>
        </div>
        <div class="form-group">
            <label for="itemcategory">Item Category</label>
            <input type="text" class="form-control <?php echo (!empty($itemCategory_err)) ? 'is-invalid' : ''; ?>"
                   value="<?php echo $itemCategory; ?>" id="itemCategory" name="itemCategory" aria-describedby="itemCategoryHelp" placeholder="Enter a Category">
            <small id="itemCategoryHelp" class="form-text text-muted">What Category does the Item belong to?</small>
            <span class="invalid-feedback"><?php echo $itemCategory_err; ?></span>
        </div>
        <div class="form-group">
            <label for="itemDescription">Item Description</label>
            <input type="text" class="form-control <?php echo (!empty($itemDescription_err)) ? 'is-invalid' : ''; ?>"
                   value="<?php echo $itemDescription; ?>" id="itemDescription" name="itemDescription" aria-describedby="itemDescriptionHelp" placeholder="Enter an Item Description">
            <small id="itemDescriptionHelp" class="form-text text-muted">Tell us about your sale</small>
            <span class="invalid-feedback"><?php echo $itemDescription_err; ?></span>
        </div>
        <div class="form-group">
            <label for="StartingBid">Starting Bid</label>
                <div class="input-group">
                <div class="input-group-text">$</div>
                <input type="text" class="form-control <?php echo (!empty($StartingBid_err)) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $StartingBid; ?>" id="StartingBid" name="StartingBid" aria-describedby="StartingBidHelp" placeholder="Enter an Starting Bid">
                </div>
            <small id="StartingBidHelp" class="form-text text-muted">What Should the minimum price it should sell for?</small>
            <span class="invalid-feedback"><?php echo $StartingBid_err ?></span>

        </div>
        <div class="form-group">
            <label for="numOfDays">Please Select How Many days you would like your auction to last</label>
            <select class="form-control" id="numOfDays" name="numOfDays">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
                <option>18</option>
                <option>19</option>
                <option>20</option>
                <option>21</option>
                <option>22</option>
                <option>23</option>
                <option>24</option>
                <option>25</option>
                <option>26</option>
                <option>27</option>
                <option>28</option>
                <option>29</option>
                <option>30</option>
                <option>31</option>
                <option>32</option>
            </select>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>

</body>
</html>
