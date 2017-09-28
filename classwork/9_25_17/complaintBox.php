<?php
    session_start();
    
    // If this is a post, process it
    $isPostback = $_SERVER['REQUEST_METHOD'] == 'POST';
    
    if ($isPostback) {
        $report = "Username: " . $_POST["subject"] . "<br />" . "Password: " . $_POST["fullName"];
        if ($_POST["subject"] == "Snoop" && $_POST["fullName"] == "Dogg"){
            $report = $report . "<br />" . "Smoke code every day.";
        } else {
            $report = $report . "<br />" . "Incorrect log in.";
        }
        $_SESSION["report"] = $report;
    }
    else {
        $_SESSION["report"] = "";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Log-In description</title>
    </head>
    <body>
        <?php
            if ($isPostback) {
                include "inc.report.php";
            }
            else {
                header("Jasons-Special-Header: He is special");
                include "inc.form.php";
            }
        ?>
    </body>
</html>