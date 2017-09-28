<?php
    $deck = array();
    $suit = 0;
    $cardVal;
    $tracker = 0;
    
    
    $hand1[0] = 0;
    $hand2[0] = 0;
    $hand3[0] = 0;
    $hand4[0] = 0;
    
    //setting deck of 52 cards up
    while ($suit < 4){
        $cardVal = 1;
        while ($cardVal < 14){
            ${"card" . $tracker}["value"] = $cardVal;
            switch($suit){
                case 0:
                    $suitString = "clubs";
                    break;
                case 1:
                    $suitString = "diamonds";
                    break;
                case 2:
                    $suitString = "hearts";
                    break;
                case 3:
                    $suitString = "spades";
                    break;
            }
            ${"card" . $tracker}["suit"] = $suitString;
            $deck[$tracker] = ${"card" . $tracker};
            $cardVal = $cardVal + 1;
            $tracker = $tracker + 1;
        }
        $suit = $suit + 1;
    }
    
    //draws a card
    function draw(){
        global $tracker, $deck;
        $tracker = $tracker - 1;
        //gets random card in deck
        $ranNum = rand(0, $tracker);
        
        $card = $deck[$ranNum];
        //deletes card out of deck
        $deck[$ranNum] = $deck[$tracker];
        array_pop($deck);
        
        $filesuit = $card["suit"];
        $fileVal = $card["value"];
        
        
        echo "<img src='/lab/lab3/cardpics/$filesuit/$fileVal.png' alt='card1'>";
        return $fileVal;
    }
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Silverjack</title>
    </head>
    
    <body>
        <p id='par1'>
            Silverjack
        </p>
        
        <?php
        //draw hands for players and finds totals plus winner
            $x = 0;
            while ($x < 4) {
                echo 'Player ' . ($x + 1) . ':';
                $y = rand(4, 6);
                $z = 0;
                while ($y > $z) {
                    $z = $z + 1;
                    ${Player . ($x + 1)} = ${Player . ($x + 1)} + draw();
                }
                if ($y == 5) {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
                } else if ($y == 4) {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
                }
                echo "Total: " . ${Player . ($x + 1)};
                echo "<br />";
                
                $x = $x + 1;
            }
            
            //find winner
            if (($Player1 > $Player2) && $Player1 < 43){
                $winner1 = "Player1";
            } else if ($Player2 < 43) {
                $winner1 = "Player2";
            } else {
                $winner1 = "NA";
            }
            
            if (($Player3 > $Player4) && $Player3 < 43){
                $winner2 = "Player3";
            } else if ($Player4 < 43) {
                $winner2 = "Player4";
            } else {
                $winner2 = "NA";
            }
            
            $finalScore = $Player1 + $Player2 + $Player3 + $Player4;
            if ($winner1 != "NA" && $winner2 != "NA") {
                if (${$winner1} > ${$winner2}) {
                    $finalScore = $finalScore - ${$winner1};
                    echo $winner1 . ' wins with ' . $finalScore . 'points!';
                } else {
                    $finalScore = $finalScore - ${$winner2};
                    echo $winner2 . ' wins with ' . $finalScore . 'points!';
                }
            } else if ($winner1 == "NA" && $winner2 == "NA") {
                echo "Everybody loses!";
            } else if ($winner1 == "NA") {
                $finalScore = $finalScore - ${$winner2};
                echo $winner2 . ' wins with ' . $finalScore . 'points!';
            } else {
                $finalScore = $finalScore - ${$winner1};
                echo $winner1 . ' wins with ' . $finalScore . 'points!';
            }
        ?>
        
        <form>
            <input type="submit" value="Play Again"/>
        </form>
        
    </body>
</html>