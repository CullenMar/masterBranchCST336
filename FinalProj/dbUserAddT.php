<?php
    if (isset($_GET['userID'])) {
        $userId = $_GET['userID'];}
    if (isset($_GET['teamNew'])) {
        $teamInp = $_GET['teamNew'];}
    
    if ($userId != null && $teamInp != null) {
    //connecting to db
    $dbHost = getenv('IP');
    $dbPort = 3306;
    $dbName = "pongDB";
    $username = getenv("C9_USER");
    $password = "";
    
    $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $statement = "UPDATE userTable SET team = '" . $teamInp . "' WHERE id = " . $userId;
    
    $stmt = $dbConn -> prepare($statement);
    $stmt -> execute ();

    echo "completeTeamAdd";
    } else {
        echo "nullTeamAdd";
    }
?>