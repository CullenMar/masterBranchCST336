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
            ${"card" . $tracker}["suit"] = $suit;
            $deck[$tracker] = ${"card" . $tracker};
            $cardVal = $cardVal + 1;
            $tracker = $tracker + 1;
        }
        $suit = $suit + 1;
    }
    
    //draws a card
    function draw($currentHand){
        global $tracker, $deck;
        $tracker = $tracker - 1;
        //gets random card in deck
        $ranNum = rand(0, $tracker);
        //puts card in current players hand
        $currentHand[$currentHand[0] + 1] = $deck[ranNum];
        $deck[ranNum] = $deck[$tracker];
        $deck = array_pop($deck);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    
    <body>
        <form>
            <input type="button" value="Hit me!"/>
        </form>
    </body>
</html>