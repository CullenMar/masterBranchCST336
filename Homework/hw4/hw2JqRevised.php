<!DOCTYPE html>
<html>
    <head>
        <style>
            @import url("./css/hw2styles.css");
        </style>
        <title> Bowling Simulator </title>
    </head>
    <body>
        <button class="bowlButt" id="jButt">Bowl!</button>
        
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script>
            $("#jButt").click(function(){
                var pinNum = 1
                var pinsUp = []
                while (pinNum < 11){
                    if (Math.floor(Math.random() * 3) == 2) {
                        pinsUp.push(pinNum);
                    }
                    pinNum = pinNum + 1;
                }
                $("#jpin1").css("visibility", "hidden")
                $("#jpin2").css("visibility", "hidden")
                $("#jpin3").css("visibility", "hidden")
                $("#jpin4").css("visibility", "hidden")
                $("#jpin5").css("visibility", "hidden")
                $("#jpin6").css("visibility", "hidden")
                $("#jpin7").css("visibility", "hidden")
                $("#jpin8").css("visibility", "hidden")
                $("#jpin9").css("visibility", "hidden")
                $("#jpin10").css("visibility", "hidden")
                
                var arrIndex = 0;
                while (arrIndex < pinsUp.length){
                    switch(pinsUp[arrIndex]){
                        case 1:
                            $("#jpin1").css("visibility", "visible")
                            break;
                        case 2:
                            $("#jpin2").css("visibility", "visible")
                            break;
                        case 3:
                            $("#jpin3").css("visibility", "visible")
                            break;
                        case 4:
                            $("#jpin4").css("visibility", "visible")
                            break;
                        case 5:
                            $("#jpin5").css("visibility", "visible")
                            break;
                        case 6:
                            $("#jpin6").css("visibility", "visible")
                            break;
                        case 7:
                            $("#jpin7").css("visibility", "visible")
                            break;
                        case 8:
                            $("#jpin8").css("visibility", "visible")
                            break;
                        case 9:
                            $("#jpin9").css("visibility", "visible")
                            break;
                        case 10:
                            $("#jpin10").css("visibility", "visible")
                            break;
                    }
                    arrIndex = arrIndex + 1;
                }
                $("#jAnnounce").html("You knocked down " + (10 - pinsUp.length) + " pins!")
            })
        </script>
        
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