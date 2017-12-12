<?php
    if (isset($_GET['winBoo'])) {
        $winBool = $_GET['winBoo'];}
    if (isset($_GET['userID'])) {
        $userId = $_GET['userID'];}
    if (isset($_GET['wlC'])) {
        $winLoss = $_GET['wlC'];}
    
    if ($userId != null && $winBool != null && $winLoss != null) {
    //connecting to db
    $dbHost = getenv('IP');
    $dbPort = 3306;
    $dbName = "pongDB";
    $username = getenv("C9_USER");
    $password = "";
    
    $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if ($winBool == 1) {
        $statement = "UPDATE userTable SET wins = " . $winLoss . " WHERE id = " . $userId;
    } else {
        $statement = "UPDATE userTable SET losses = " . $winLoss . " WHERE id = " . $userId;
    }
    
    $stmt = $dbConn -> prepare($statement);
    $stmt -> execute ();

    echo "completeUc";
    } else {
        echo "nellUc";
    }
?>