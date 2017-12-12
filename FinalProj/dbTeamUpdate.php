<?php
    if (isset($_GET['nameT'])) {
        $nameT = $_GET['nameT'];}
    if (isset($_GET['creatorT'])) {
        $creatorT = $_GET['creatorT'];}
    if (isset($_GET['winsT'])) {
        $winsT = $_GET['winsT'];}
    if (isset($_GET['lossesT'])) {
        $lossesT = $_GET['lossesT'];}
    
    if ($nameT != null && $creatorT != null && $winsT != null && $lossesT != null) {
    //connecting to db
    $dbHost = getenv('IP');
    $dbPort = 3306;
    $dbName = "pongDB";
    $username = getenv("C9_USER");
    $password = "";
    
    $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $statement = "UPDATE teams SET creator = '" . $creatorT . "', wins = '" . $winsT . "', losses = '" . $lossesT . "' WHERE eman = '" . $nameT . "'";
    
    $stmt = $dbConn -> prepare($statement);
    $stmt -> execute ();

    echo "completeU";
    } else {
        echo "nullU";
    }
?>