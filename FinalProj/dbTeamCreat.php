<?php
    if (isset($_GET['nameInp'])) {
        $nameT = $_GET['nameInp'];}
    if (isset($_GET['creatInp'])) {
        $creatT = $_GET['creatInp'];}
    
    if ($nameT != null && $creatT != null) {
    //connecting to db
    $dbHost = getenv('IP');
    $dbPort = 3306;
    $dbName = "pongDB";
    $username = getenv("C9_USER");
    $password = "";
    
    $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO teams (eman, creator, wins, losses) VALUES (\"" . $nameT . "\", \"" . $creatT . "\", 0, 0);";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute ();

    echo "completeT";
    } else {
        echo "nullT";
    }
?>