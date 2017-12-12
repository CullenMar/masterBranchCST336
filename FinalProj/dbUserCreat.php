<?php
    if (isset($_GET['nameInp'])) {
        $nameT = $_GET['nameInp'];}
    if (isset($_GET['passInp'])) {
        $passT = $_GET['passInp'];}
    
    if ($nameT != null && $passT != null) {
    //connecting to db
    $dbHost = getenv('IP');
    $dbPort = 3306;
    $dbName = "pongDB";
    $username = getenv("C9_USER");
    $password = "";
    
    $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO userTable (eman, ssap, wins, losses, team) VALUES (\"" . $nameT . "\", \"" . $passT . "\", 0, 0, 'na');";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute ();

    echo "complete";
    } else {
        echo "null";
    }
?>