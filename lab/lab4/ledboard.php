<?php
    session_start();
    if (isset($_GET["message"])){
        $_SESSION["userMsg"] = $_GET["message"];
    }
    if (isset($_GET["color"])){
        $_SESSION["userColor"] = $_GET["color"];
    }
    if (isset($_GET["colorPerCell"])){
        $_SESSION["userCPC"] = $_GET["colorPerCell"];
    }
    if (isset($_GET["displayForm"])){
        $_SESSION["userDisplay"] = $_GET["displayForm"];
    }
    if (isset($_GET["wordColor1"])){
        $_SESSION["userColor1"] = $_GET["wordColor1"];
    }
    if (isset($_GET["wordColor2"])){
        $_SESSION["userColor2"] = $_GET["wordColor2"];
    }
    if (isset($_GET["wordColor3"])){
        $_SESSION["userColor3"] = $_GET["wordColor3"];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 2: LED Board </title>
    </head>
    <body>
       <main>
            <h1> Custom LED Board</h1>
            <?php
            if ($_SESSION["userDisplay"] != "no") {
            echo "
            <form method='get'>
                Message:
                <input type='text' name='message' maxlength='15' value='CST336 is cool!'/>
                <br /><br />
                Select a color: 
                <select name='color'>
                    <option value='red'> Red </option>
          	        <option value='green'> Green </option>
          	   	    <option value='blue'> Blue </option>
          	   	    <option value='yellow' selected> Yellow </option>
                </select>
          	    <br /><br />
                Display Different Color per Cell: 
                Yes
                <input type='radio' name='colorPerCell' value='yes'>
                No
                <input type='radio' name='colorPerCell' value='no'>
                <br /><br />
                <input type='hidden' value='no' name='displayForm'>
                <input type='checkbox' name='displayForm' value='yes' checked>
                Display Form Again
          	    <br /><br />
          	    Display custom colors per word:
          	    <br />
          	    (Enter colors names or hexadecimal values)<br />
          	    <input type='text' name='wordColor1' value = ''/> 
          	    <input type='text' name='wordColor2'  value = ''/>
          	    <input type='text' name='wordColor3' value = ''/>
          	    <br /><br />
          	    <input type='submit' value='Display!!' name='submit' />
            </form>
            ";}
            ?>
            
            <style type="text/css">
                body {
                    text-align: center;
                }
                table {
                    display: inline-block;
                    /*padding-right:5px;*/
                    /*margin: 0px auto;*/
                }
                .table1{
                    text-align: center;
                    width:20px;
                    height:20px;
                    border:1px solid black;
                    border-radius:20px;
                    border-collapse:collapse;
                }
                form {
                    border: 1px solid black;
                    text-align: center;
                }
            </style>
            <?php
                $led_A = array(
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                );
                $led_B = array(
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 0, 1),
                        array(1, 1, 0, 0, 0, 0, 0, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 0, 1),
                        array(1, 1, 0, 0, 0, 0, 0, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                );
                
                $led_C = array(
                        array(0, 0, 1, 1, 1, 1, 1, 0),
                        array(0, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 0, 0),
                        array(1, 1, 0, 0, 0, 0, 0, 0),
                        array(1, 1, 0, 0, 0, 0, 0, 0),
                        array(1, 1, 0, 0, 0, 0, 0, 0),
                        array(0, 1, 1, 1, 1, 1, 1, 1),
                        array(0, 0, 1, 1, 1, 1, 1, 0),
                );
                
                $led_D = array(
                        array(1, 1, 1, 1, 1, 1, 1, 0),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 0),
                );
                
                $led_E = array(
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 0, 0, 0, 0, 0, 0, 0),
                        array(1, 0, 0, 0, 0, 0, 0, 0),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 0, 0, 0, 0, 0, 0, 0),
                        array(1, 0, 0, 0, 0, 0, 0, 0),
                        array(1, 0, 0, 0, 0, 0, 0, 0),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                );
                
                $led_F = array(
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 0, 0),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 0, 1),
                        array(1, 1, 0, 0, 0, 0, 0, 0),
                        array(1, 1, 0, 0, 0, 0, 0, 0),
                );
                
                $led_G = array(
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 0, 0),
                        array(1, 1, 0, 0, 1, 1, 1, 1),
                        array(1, 1, 0, 0, 1, 1, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                );
                
                $led_H = array(
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                );
                
                $led_I = array(
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(0, 0, 0, 1, 1, 0, 0, 0),
                        array(0, 0, 0, 1, 1, 0, 0, 0),
                        array(0, 0, 0, 1, 1, 0, 0, 0),
                        array(0, 0, 0, 1, 1, 0, 0, 0),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                );
                
                $led_J = array(
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(0, 0, 0, 0, 1, 1, 0, 0),
                        array(0, 0, 0, 0, 1, 1, 0, 0),
                        array(0, 0, 0, 0, 1, 1, 0, 0),
                        array(1, 1, 0, 0, 1, 1, 0, 0),
                        array(1, 1, 1, 1, 1, 1, 0, 0),
                        array(1, 1, 1, 1, 1, 1, 0, 0),
                );
                
                $led_K = array(
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 0, 0, 0, 1, 1, 0),
                        array(1, 1, 0, 0, 1, 1, 1, 1),
                        array(1, 1, 1, 1, 0, 0, 0, 0),
                        array(1, 1, 1, 1, 0, 0, 0, 0),
                        array(1, 1, 0, 0, 1, 1, 0, 0),
                        array(1, 1, 0, 0, 0, 1, 1, 0),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                );
                
                $led_L = array(
                        array(1, 1, 0, 0, 0, 0, 0, 0),
                        array(1, 1, 0, 0, 0, 0, 0, 0),
                        array(1, 1, 0, 0, 0, 0, 0, 0),
                        array(1, 1, 0, 0, 0, 0, 0, 0),
                        array(1, 1, 0, 0, 0, 0, 0, 0),
                        array(1, 1, 0, 0, 0, 0, 0, 0),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                );
                
                $led_M = array(
                        array(1, 1, 1, 0, 0, 1, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 0, 1, 1, 0, 1, 1),
                        array(1, 1, 0, 1, 1, 0, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                );
                
                $led_N = array(
                        array(1, 0, 0, 0, 0, 0, 0, 1),
                        array(1, 1, 0, 0, 0, 0, 0, 1),
                        array(1, 0, 1, 0, 0, 0, 0, 1),
                        array(1, 0, 0, 1, 0, 0, 0, 1),
                        array(1, 0, 0, 0, 1, 0, 0, 1),
                        array(1, 0, 0, 0, 0, 1, 0, 1),
                        array(1, 0, 0, 0, 0, 0, 1, 1),
                        array(1, 0, 0, 0, 0, 0, 0, 1),
                );
                
                $led_O = array(
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                );
                
                $led_P = array(
                        array(1, 1, 1, 1, 1, 1, 1, 0),
                        array(1, 0, 0, 0, 0, 0, 0, 1),
                        array(1, 0, 0, 0, 0, 0, 0, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 0),
                        array(1, 0, 0, 0, 0, 0, 0, 0),
                        array(1, 0, 0, 0, 0, 0, 0, 0),
                        array(1, 0, 0, 0, 0, 0, 0, 0),
                        array(1, 0, 0, 0, 0, 0, 0, 0),
                );
                
                $led_Q = array(
                        array(1, 1, 1, 1, 1, 1, 1, 0),
                        array(1, 0, 0, 0, 0, 0, 1, 0),
                        array(1, 0, 0, 0, 0, 0, 1, 0),
                        array(1, 0, 0, 0, 0, 0, 1, 0),
                        array(1, 0, 0, 0, 0, 0, 1, 0),
                        array(1, 0, 0, 0, 0, 0, 1, 0),
                        array(1, 1, 1, 1, 1, 1, 1, 0),
                        array(0, 0, 0, 0, 0, 0, 0, 1),
                );
                
                $led_R = array(
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 0, 1),
                        array(1, 1, 0, 0, 0, 0, 0, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 0),
                        array(1, 1, 0, 0, 0, 1, 0, 0),
                        array(1, 1, 0, 0, 0, 0, 1, 0),
                        array(1, 1, 0, 0, 0, 0, 0, 1),
                );
                
                $led_S = array(
                        array(0, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 1),
                        array(1, 1, 0, 0, 0, 0, 0, 0),
                        array(0, 1, 1, 1, 1, 1, 1, 0),
                        array(0, 1, 1, 1, 1, 1, 1, 1),
                        array(0, 0, 0, 0, 0, 0, 0, 1),
                        array(1, 1, 1, 1, 1, 1, 1, 0),
                        array(1, 1, 1, 1, 1, 1, 1, 0),
                );
                $led_T = array(
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                );
                $led_U = array(
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(0, 1, 1, 1, 1, 1, 1, 0),
                );
                $led_V = array(
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(0, 1, 1, 0, 0, 1, 1, 0),
                    array(0, 1, 1, 0, 0, 1, 1, 0),
                    array(0, 0, 1, 1, 1, 1, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                );
                $led_W = array(
                    array(1, 0, 0, 0, 0, 0, 0, 1),
                    array(1, 0, 0, 0, 0, 0, 0, 1),
                    array(0, 1, 0, 1, 1, 0, 1, 0),
                    array(0, 1, 0, 1, 1, 0, 1, 0),
                    array(0, 1, 0, 1, 1, 0, 1, 0),
                    array(0, 0, 1, 0, 0, 1, 0, 0),
                    array(0, 0, 1, 0, 0, 1, 0, 0),
                    array(0, 0, 1, 0, 0, 1, 0, 0),
                );
                $led_X = array(
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(0, 0, 1, 0, 0, 1, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 1, 0, 0, 1, 0, 0),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                );
                $led_Y = array(
                    array(1, 0, 0, 0, 0, 0, 0, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(0, 1, 1, 0, 0, 1, 1, 0),
                    array(0, 0, 1, 1, 1, 1, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                );
                $led_Z = array(
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(0, 0, 0, 0, 0, 1, 1, 1),
                    array(0, 0, 0, 1, 1, 1, 0, 0),
                    array(0, 0, 1, 1, 1, 0, 0, 0),
                    array(1, 1, 1, 0, 0, 0, 0, 0),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                );
                $led_0 = array(
                    array(0, 1, 1, 1, 1, 1, 1, 0),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 0, 0, 1, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 1, 0, 0, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(0, 1, 1, 1, 1, 1, 1, 0),
                );
                $led_1 = array(
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(1, 1, 1, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                );
                $led_2 = array(
                    array(0, 1, 1, 1, 1, 1, 1, 0),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(0, 0, 0, 0, 0, 0, 1, 1),
                    array(0, 0, 0, 0, 1, 1, 0, 0),
                    array(0, 0, 1, 1, 0, 0, 0, 0),
                    array(1, 1, 0, 0, 0, 0, 0, 0),
                    array(1, 1, 0, 0, 0, 0, 0, 0),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                );
                $led_3 = array(
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(0, 0, 0, 0, 0, 0, 1, 1),
                    array(0, 0, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(0, 0, 0, 0, 0, 0, 0, 1),
                    array(0, 0, 0, 0, 0, 0, 0, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                );
                $led_4 = array(
                    array(0, 0, 0, 0, 0, 1, 0, 0),
                    array(0, 0, 0, 0, 1, 1, 0, 0),
                    array(0, 0, 0, 1, 0, 1, 0, 0),
                    array(0, 0, 1, 0, 0, 1, 0, 0),
                    array(0, 1, 0, 0, 0, 1, 0, 0),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(0, 0, 0, 0, 0, 1, 0, 0),
                    array(0, 0, 0, 0, 0, 1, 0, 0),
                );
                $led_5 = array(
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 0, 0, 0, 0, 0, 0, 0),
                    array(1, 0, 0, 0, 0, 0, 0, 0),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(0, 0, 0, 0, 0, 0, 0, 1),
                    array(0, 0, 0, 0, 0, 0, 0, 1),
                    array(0, 0, 0, 0, 0, 0, 0, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                );
                $led_6 = array(
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 0, 0),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 0, 0, 0, 0, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                );
                $led_7 = array(
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(1, 1, 1, 1, 1, 1, 1, 1),
                    array(0, 0, 0, 0, 0, 1, 1, 0),
                    array(0, 0, 0, 0, 1, 1, 0, 0),
                    array(0, 0, 0, 0, 1, 1, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 1, 1, 0, 0, 0, 0),
                );
                $led_8 = array(
                    array(0, 0, 1, 1, 1, 1, 0, 0),
                    array(0, 1, 1, 0, 0, 1, 1, 0),
                    array(0, 1, 1, 0, 0, 1, 1, 0),
                    array(0, 0, 1, 1, 1, 1, 0, 0),
                    array(0, 0, 1, 1, 1, 1, 0, 0),
                    array(0, 1, 1, 0, 0, 1, 1, 0),
                    array(0, 1, 1, 0, 0, 1, 1, 0),
                    array(0, 0, 1, 1, 1, 1, 0, 0),
                );
                $led_9 = array(
                    array(0, 1, 1, 1, 1, 1, 1, 1),
                    array(0, 1, 1, 1, 1, 1, 1, 1),
                    array(0, 1, 1, 0, 0, 0, 1, 1),
                    array(0, 1, 1, 1, 1, 1, 1, 1),
                    array(0, 1, 1, 1, 1, 1, 1, 1),
                    array(0, 0, 0, 0, 0, 0, 1, 1),
                    array(0, 0, 0, 0, 0, 0, 1, 1),
                    array(0, 0, 0, 0, 0, 0, 1, 1),
                );
                $led_Excla = array(
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                    array(0, 0, 0, 0, 0, 0, 0, 0),
                    array(0, 0, 0, 1, 1, 0, 0, 0),
                );
                $ranColors = array ("red", "blue", "green", "yellow", "purple", "orange", "teal", "magenta");
                session_start;
                $x = 0;
                $fColor = $_SESSION["userColor1"];
                $colorCount = 1;
                
                if ($_SESSION["userCPC"] != "yes" && $_SESSION["userCPC"] != "no"){
                    echo "'Display a different color per cell' must be answered!";
                } else {
                
                if ($_SESSION["userColor1"] == "") { $colorCount = 4; }
                while ($x < strlen($_SESSION["userMsg"])){
                    if ($_SESSION["userMsg"][$x] == " "){
                        echo "<br />";
                        $x = $x + 1;
                        if ($colorCount == 1) {
                            $colorCount = 2;
                            $fColor = $_SESSION["userColor2"];
                        } else if ($colorCount == 2) {
                            $colorCount = 3;
                            $fColor = $_SESSION["userColor3"];
                        }
                        continue;
                    } else {
                        $charVar = strtoupper($_SESSION["userMsg"][$x]);
                    }
                    echo "<table border=0>";
                    $row = 0;
                    while ($row < 8){
                        $column = 0;
                        echo "<tr>";
                        while ($column < 8){
                            //required in order to use exclamtion mark
                            if ($charVar == "!") {
                                $exclamation = "Excla";
                            } else {
                                $exclamation = $charVar;
                            }
                            
                            if ($colorCount == 4 && ($_SESSION["userCPC"] == "yes")) {
                                $fColor = $ranColors[array_rand($ranColors)];
                            }
                            if (${"led_" . $exclamation}[$row][$column] == 1){
                                echo "<td style = 'background-color:" . $fColor . "' class='table1'>" . $charVar . "</td>";
                            } else {
                                echo "<td style = 'background-color:white' class='table1'></td>";
                            }
                            $column = $column + 1;
                        }
                        echo "</tr>";
                        $row = $row + 1;
                    }
                    $x = $x + 1;
                    echo "</table>";
                }
                }
            ?>
            
        </main>
    </body>
    <?php
        session_start();
        session_unset();
    ?>
</html>