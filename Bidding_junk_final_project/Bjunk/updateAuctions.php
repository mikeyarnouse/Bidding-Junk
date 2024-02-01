<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'biddingjunk_user');
define('DB_PASSWORD', 'p250sanddune');
#define('DB_USERNAME', 'root');
#define('DB_PASSWORD', 'root');
define('DB_NAME', 'biddingjunk');

/* Attempt to connect to MySQL database */
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";port=3306;dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
    $now = date("Y-m-d H:i:s");
    echo "It is now $now";
    $sql="Update auctions 
    Set is_active = 0
    Where end_time < :now";
    if($stmt=$pdo->prepare($sql))
    {
        echo "preparing sql";
        $stmt->bindParam(":now", $now);
        if($stmt->execute())
        {
            echo "Rows have been updated...";
        }
    }
?>