<?php
    if (isset($_GET['teamName'])) {
        $tName = $_GET['teamName'];}
    
    if ($tName != null) {
    //connecting to db
    $dbHost = getenv('IP');
    $dbPort = 3306;
    $dbName = "pongDB";
    $username = getenv("C9_USER");
    $password = "";
    
    $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM teams WHERE eman = '" . $tName . "'";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute ();

    echo "completeTdelete";
    } else {
        echo "nullT";
    }
?>