<?php
    if (isset($_GET['glID'])) {
        $gameLogID = $_GET['glID'];}
    
    if ($gameLogID != null) {
    //connecting to db
    $dbHost = getenv('IP');
    $dbPort = 3306;
    $dbName = "pongDB";
    $username = getenv("C9_USER");
    $password = "";
    
    $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM gameLog WHERE gameID = " . $gameLogID;
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute ();

    echo "completeGLdelete";
    } else {
        echo "nullGL";
    }
?>