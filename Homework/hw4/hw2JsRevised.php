<!DOCTYPE html>
<html>
    <head>
        <style>
            @import url("./css/hw2styles.css");
        </style>
        <title> Bowling Simulator </title>
    </head>
    <body>
        
        <script>
            function bowlFunc() {
                var pinNum = 1;
                var pinsUp = [];
                while (pinNum < 11){
                    if (Math.floor(Math.random() * 3) == 2) {
                        pinsUp.push(pinNum);
                    }
                    pinNum = pinNum + 1;
                }
                
                document.getElementById("jpin1").style.visibility = "hidden";
                document.getElementById("jpin2").style.visibility = "hidden";
                document.getElementById("jpin3").style.visibility = "hidden";
                document.getElementById("jpin4").style.visibility = "hidden";
                document.getElementById("jpin5").style.visibility = "hidden";
                document.getElementById("jpin6").style.visibility = "hidden";
                document.getElementById("jpin7").style.visibility = "hidden";
                document.getElementById("jpin8").style.visibility = "hidden";
                document.getElementById("jpin9").style.visibility = "hidden";
                document.getElementById("jpin10").style.visibility = "hidden";
                
                var arrIndex = 0;
                while (arrIndex < pinsUp.length){
                    switch(pinsUp[arrIndex]){
                        case 1:
                            document.getElementById("jpin1").style.visibility = "visible";
                            break;
                        case 2:
                            document.getElementById("jpin2").style.visibility = "visible";
                            break;
                        case 3:
                            document.getElementById("jpin3").style.visibility = "visible";
                            break;
                        case 4:
                            document.getElementById("jpin4").style.visibility = "visible";
                            break;
                        case 5:
                            document.getElementById("jpin5").style.visibility = "visible";
                            break;
                        case 6:
                            document.getElementById("jpin6").style.visibility = "visible";
                            break;
                        case 7:
                            document.getElementById("jpin7").style.visibility = "visible";
                            break;
                        case 8:
                            document.getElementById("jpin8").style.visibility = "visible";
                            break;
                        case 9:
                            document.getElementById("jpin9").style.visibility = "visible";
                            break;
                        case 10:
                            document.getElementById("jpin10").style.visibility = "visible";
                            break;
                    }
                    arrIndex = arrIndex + 1;
                }
                document.getElementById("jAnnounce").innerHTML = "You knocked down " + (10 - pinsUp.length) + " pins!"
            }
        </script>
        
        <button class="bowlButt" onclick="bowlFunc();">Bowl!</button>
        <div id="hide">
            <img class="pin1" id="jpin1" src="./images/bowling_pin.png" alt="pin1">
            <img class="pin2" id="jpin2" src="./images/bowling_pin.png" alt="pin2">
            <img class="pin3" id="jpin3" src="./images/bowling_pin.png" alt="pin3">
            <img class="pin4" id="jpin4" src="./images/bowling_pin.png" alt="pin4">
            <img class="pin5" id="jpin5" src="./images/bowling_pin.png" alt="pin5">
            <img class="pin6" id="jpin6" src="./images/bowling_pin.png" alt="pin6">
            <img class="pin7" id="jpin7" src="./images/bowling_pin.png" alt="pin7">
            <img class="pin8" id="jpin8" src="./images/bowling_pin.png" alt="pin8">
            <img class="pin9" id="jpin9" src="./images/bowling_pin.png" alt="pin9">
            <img class="pin10" id="jpin10" src="./images/bowling_pin.png" alt="pin10">
        </div>
        
        <div class='announce' id='jAnnounce'></div>
        
        <div id="main">
        </div>
    </body>
</html>