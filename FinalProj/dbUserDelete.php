<?php
    if (isset($_GET['uid'])) {
        $uid = $_GET['uid'];}
    
    if ($uid != null) {
    //connecting to db
    $dbHost = getenv('IP');
    $dbPort = 3306;
    $dbName = "pongDB";
    $username = getenv("C9_USER");
    $password = "";
    
    $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM userTable WHERE id = " . $uid;
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute ();

    echo "completeUdelete";
    } else {
        echo "nullU";
    }
?>