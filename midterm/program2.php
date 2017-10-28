<!DOCTYPE HTML>
<html>
    <head>
        <title>program 2</title>
    </head>
    <body>
        <?php
        $dbHost = getenv('IP');
        $dbPort = 3306;
        $dbName = "midterm";
        $username = getenv('C9_USER');
        $password = "";
        
        $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        echo "Report 1: <br />First Name, Last Name, Country of Birth<br />";
        $sql = "SELECT * FROM celebrity WHERE gender = 'F' ORDER BY lastName";
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute ();
        
        while ($row = $stmt -> fetch())  {
            echo  $row['firstName'] . ", " . $row['lastName'] . ", " . $row['country_of_birth'] . "<br />";
        }
        
        echo "<br /><br />Report 2:<br />";
        $sql = "SELECT movie_category FROM movie";
        //, COUNT(movie_category) as movieCount , COUNT(movie_category) AS movieCount, AVG(duration) AS avgLength
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute ();
        
        while ($row = $stmt -> fetch())  {
            echo  $row['movie_category'] . ", " . $row['movieCount'] . " seconds<br />";
            //", " . $row['avgLength'] . 
        }
        
        
        ?>
    </body>
</html>