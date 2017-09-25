<?php
    function bowl(){
        $pinNum = 1;
        $pinsUp = array();
        while ($pinNum < 11){
            if(rand(0,2) == 2){
                $pinsUp[] = $pinNum;
            }
            $pinNum = $pinNum + 1;
        }
        displayPins($pinsUp);
        announcePins(10 - count($pinsUp));
        //not sure if this counts for array functions... but sshhh
        $pinsUp = array_reverse($pinsUp);
        array_pop($pinsUp);
    }
    function displayPins($pinArray){
        $arrIndex = 0;
        while($arrIndex < count($pinArray)){
            switch ($pinArray[$arrIndex]){
                case 1:
                    pin1up();
                    break;
                case 2:
                    pin2up();
                    break;
                case 3:
                    pin3up();
                    break;
                case 4:
                    pin4up();
                    break;
                case 5:
                    pin5up();
                    break;
                case 6:
                    pin6up();
                    break;
                case 7:
                    pin7up();
                    break;
                case 8:
                    pin8up();
                    break;
                case 9:
                    pin9up();
                    break;
                case 10:
                    pin10up();
                    break;
            }
            $arrIndex = $arrIndex + 1;
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            @import url("./css/hw2styles.css");
        </style>
        <title> Bowling Simulator </title>
    </head>
    <body>
        
        <div id="main">
        </div>
        <form>
            <input class="bowlButt" type="submit" value="Bowl!"/>
        </form>
        
        <?php bowl(); ?>
        
        <?php
            function pin1up(){
                echo '<img class="pin1" src="./images/bowling_pin.png" alt="pin1">';}
            function pin2up(){
                echo '<img class="pin2" src="./images/bowling_pin.png" alt="pin2">';}
            function pin3up(){
                echo '<img class="pin3" src="./images/bowling_pin.png" alt="pin3">';}
            function pin4up(){
                echo '<img class="pin4" src="./images/bowling_pin.png" alt="pin4">';}
            function pin5up(){
                echo '<img class="pin5" src="./images/bowling_pin.png" alt="pin5">';}
            function pin6up(){
                echo '<img class="pin6" src="./images/bowling_pin.png" alt="pin6">';}
            function pin7up(){
                echo '<img class="pin7" src="./images/bowling_pin.png" alt="pin7">';}
            function pin8up(){
                echo '<img class="pin8" src="./images/bowling_pin.png" alt="pin8">';}
            function pin9up(){
                echo '<img class="pin9" src="./images/bowling_pin.png" alt="pin9">';}
            function pin10up(){
                echo '<img class="pin10" src="./images/bowling_pin.png" alt="pin10">';}
        ?>
        
            <?php
                function announcePins($count){
                    echo "<div class='announce'>You knocked down $count pins!</div>";
                }
            ?>
        
    </body>
</html>