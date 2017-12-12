<?php
    if (isset($_GET['tSize'])) {
        $size = $_GET['tSize'];}
    if (isset($_GET['team1'])) {
        $team1 = $_GET['team1'];}
    if (isset($_GET['team2'])) {
        $team2 = $_GET['team2'];}
    if (isset($_GET['tWinner'])) {
        $winner = $_GET['tWinner'];}
    
    if ($team1 != null && $team2 != null && $size != null && $winner != null) {
    //connecting to db
    $dbHost = getenv('IP');
    $dbPort = 3306;
    $dbName = "pongDB";
    $username = getenv("C9_USER");
    $password = "";
    
    $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $date = getdate()[year] . "-" . (getdate()[month] + 1) . "-" . getdate()[mday];
    $sql = "INSERT INTO gameLog (teamSize, team1, team2, datePlayed, winner) VALUES (" . $size . ", '" . $team1 . "', '" . $team2 . "', '" . $date . "', " . $winner . ");";
    
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute ();

    echo "completeGL";
    } else {
        echo "nullGL";
    }
?>