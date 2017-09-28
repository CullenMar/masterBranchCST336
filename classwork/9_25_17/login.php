<?php
    // If this is a post, process it
    $isPostback = $_SERVER['REQUEST_METHOD'] == 'POST';
    
    if ($isPostback) {
        $report = "Username: " . $_POST["fullName"] . "<br />" . "Password: " . $_POST["subject"];  
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Log In</title>
    </head>
    <body>
        <?php
            if ($isPostback) {
                include "inc.report.php";
            }
            else {
                include "inc.form.php";
            }
        ?>
    </body>
</html>