<?php
    if (isset($_GET['team1'])) {
        $team1 = $_GET['team1'];}
    if (isset($_GET['team2'])) {
        $team2 = $_GET['team2'];}
    if (isset($_GET['gameID'])) {
        $gameID = $_GET['gameID'];}
    
    if ($team1 != null && $team2 != null) {
    //connecting to db
    $dbHost = getenv('IP');
    $dbPort = 3306;
    $dbName = "pongDB";
    $username = getenv("C9_USER");
    $password = "";
    
    $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $statement = "UPDATE gameLog SET team1 = '" . $team1 . "', team2 = '" . $team2 . "' WHERE gameID = " . $gameID;
    
    $stmt = $dbConn -> prepare($statement);
    $stmt -> execute ();

    echo "completeGL";
    } else {
        echo "nullGL";
    }
?>