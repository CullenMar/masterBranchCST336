<?php
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Random Numbers</title></title>
    </head>
    $count = 0;
    $ranNums = array(
        0 => rand(0, 9),
        1 => rand(0, 9),
        2 => rand(0, 9),
        3 => rand(0, 9),
        4 => rand(0, 9),
        5 => rand(0, 9),
        6 => rand(0, 9),
        7 => rand(0, 9),
        8 => rand(0, 9),
    );
    
    echo "Odds: ";
    while ($count < 9) {
        if ($ranNums($count) % 2) {
            echo $ranNums($count) . " ";
        }
        $count = $count + 1;
    }
    $count = 0;
    
    echo "\nEvens: ";
    while ($count < 9) {
        if ($ranNums($count) % 2) {
            echo $ranNums($count) . " ";
        }
        $count = $count + 1;
    }
    
    </html>