<?php
    function displaySymbol($randomVal, $pos){
        switch ($randomVal) {
            case 0:
                $symbol = "seven";
                break;
            case 1:
                $symbol = "cherry";
                break;
            case 2:
                $symbol = "lemon";
                break;
            case 3:
                $symbol = "bar";
                break;
        }
        echo "<img id='reel$pos' src='./img/$symbol.png' alt='$symbol' title='$symbol' width='70' />";
    }
    
    function displayPts($randomVal1, $randomVal2, $randomVal3){
        
        echo "<div id='output'>";
        if ($randomVal1 == $randomVal2 && $randomVal2 == $randomVal3){
            switch ($randomVal1){
                case 0:
                    $totalPoints = 1000;
                    echo "<h1>Jackpot!</h1>";
                    break;
                case 1:
                    $totalPoints = 500;
                    break;
                case 2:
                    $totalPoints = 250;
                    break;
                case 3:
                    $totalPoints = 900;
                    break;
            }
            echo "<h2>You won $totalPoints points!</h2>";
        } else {
            echo "<h3>Try Again!</h3>";
        }
        echo "</div>";
    }
    function play(){
        for ($i=1; $i<4; $i++){
            ${"randomValue" . $i} = rand(0,3);
            displaySymbol(${"randomValue" . $i}, $i);
        }
        displayPts($randomValue1, $randomValue2, $randomValue3);
    }
?>