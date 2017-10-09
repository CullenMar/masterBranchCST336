<?php
    //places a textbox
    function placeText($inputNum) {
        echo "<form method='get'><input type='text' id='placementPiece" . $inputNum ."' name='input" . $inputNum . "' maxlength='10' value='text'/><form method='get'>";
    }
    //places radio options
    function placeRadio($inputNum) {
        echo "<div id='placementPiece" . $inputNum ."'><form method='get'>
            radio:<input type='radio' name='input" . $inputNum . "' value='radio' checked='checked'/>
            &nbsp&nbsptext:<input type='radio' name='input" . $inputNum . "' value='text'/>
            &nbsp&nbspselect:<input type='radio' name='input" . $inputNum . "' value='select'/><form method='get'></div>";
    }
    //places a select menu
    function placeSelect($inputNum) {
        echo "<form method='get'><select name='input" . $inputNum . "' id='placementPiece" . $inputNum ."'>
            <option value='select'>select</option>
            <option value='text'>text</option>
            <option value='radio'>radio</option>
            </select><form method='get'>";
    }
    session_start();
    //getting previous user specifications and placing them or placing defualts
    if (isset($_GET["input1"])){
        $_SESSION["input_1"] = $_GET["input1"];
        if ($_SESSION["input_1"] == "radio") {placeRadio(1);}
        else if ($_SESSION["input_1"] == "text") {placeText(1);}
        else if ($_SESSION["input_1"] == "select") {placeSelect(1);}
        else {
            echo "IMPROPER TEXT SUBMISSION<br />Accepted text: 'text', 'select', 'radio'";
            placeText(1);
        }
    } else {
        placeText(1);
    }
    echo "<br />";
    if (isset($_GET["input2"])){
        $_SESSION["input_2"] = $_GET["input2"];
        if ($_SESSION["input_2"] == "radio") {placeRadio(2);}
        else if ($_SESSION["input_2"] == "text") {placeText(2);}
        else if ($_SESSION["input_2"] == "select") {placeSelect(2);}
        else {
            echo "IMPROPER TEXT SUBMISSION<br />Accepted text: 'text', 'select', 'radio'";
            placeRadio(2);
        }
    } else {
        placeRadio(2);
    }
    echo "<br />";
    if (isset($_GET["input3"])){
        $_SESSION["input_3"] = $_GET["input3"];
        if ($_SESSION["input_3"] == "radio") {placeRadio(3);}
        else if ($_SESSION["input_3"] == "text") {placeText(3);}
        else if ($_SESSION["input_3"] == "select") {placeSelect(3);}
        else {
            echo "IMPROPER TEXT SUBMISSION<br />Accepted text: 'text', 'select', 'radio'";
            placeSelect(3);
        }
    } else {
        placeSelect(3);
    }
    echo "<br />";
    echo "
        <form method='get'>
        <input type='submit' value='UPDATE' id='placeButt' name='submit' />
        </form>
        ";
    //session_unset();
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            @import url("./css/hw3styles.css");
        </style>
        <title> Custom HTML 9k </title>
    </head>
    <body>
        <p1>
            Textbox || Radio Button || Select Tag
            <br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Customization
        </p1>
    </body>
</html>