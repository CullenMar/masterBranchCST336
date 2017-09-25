<?php
    include 'inc/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            @import url("./css/styles.css");
        </style>
        <title> 777 Slot Machine </title>
    </head>
    <body>
        
        <div id="main">
            <?php
                play();
            ?>
            
            <form>
                <input type="submit" value="Spin!"/>
            </form>
        </div>
        
    </body>
</html>