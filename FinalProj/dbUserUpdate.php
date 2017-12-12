<?php
    if (isset($_GET['userID'])) {
        $userId = $_GET['userID'];}
    if (isset($_GET['nameNew'])) {
        $nameU = $_GET['nameNew'];}
    if (isset($_GET['passNew'])) {
        $passU = $_GET['passNew'];}
    if (isset($_GET['wins'])) {
        $winsU = $_GET['wins'];}
    if (isset($_GET['losses'])) {
        $lossesU = $_GET['losses'];}
    
    if ($userId != null && $nameU != null && $passU != null && $winsU != null && $lossesU != null) {
    //connecting to db
    $dbHost = getenv('IP');
    $dbPort = 3306;
    $dbName = "pongDB";
    $username = getenv("C9_USER");
    $password = "";
    
    $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $statement = "UPDATE userTable SET eman = '" . $nameU . "', ssap = '" . $passU . "', wins = '" . $winsU . "', losses = '" . $lossesU . "' WHERE id = " . $userId;
    
    $stmt = $dbConn -> prepare($statement);
    $stmt -> execute ();

    echo "completeU";
    } else {
        echo "nullU";
    }
?>