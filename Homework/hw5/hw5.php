
<!DOCTYPE HTML>
<html>
    <head>
        <title>Homework 5</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
        <style>
            @import url("./styles.css");
        </style>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    </head>
    <body>
        <script type="text/javascript">
        
            function test1() {
                
                var userInput = document.getElementById('userIn').value;
                if (!(userInput.toString().match(/^\d+$/)) || userInput > 802) {
                    document.getElementById("userInput1").innerHTML = "Enter a number between 1 and 802 please!";
                    return;
                }
                if (!(sessionStorage.getItem(userInput.toString()) > 0)) {
                    sessionStorage[userInput.toString()] = 1;
                    console.log("hmm");
                } else {
                    sessionStorage.setItem(userInput.toString(), parseInt(sessionStorage.getItem(userInput.toString())) + 1);
                    console.log("yaya");
                }
                $.ajax({
                    
                        // The URL for the request
                        url: "https://corsfix.hensys.com/fix?url=http://pokeapi.co/api/v2/pokemon/" + userInput + "/",
            
                        // Whether this is a POST or GET request
                        type: "GET",
            
                        // The type of data we expect back
                        dataType: "json",
            
                        //jsonpCallback: 'callback',
                    })
                    // Code to run if the request succeeds (is done);
                    // The response is passed to the function
                    .done(function(data) {
                        console.log("Pokemon Data:", data);
            
                        // Do not do anything if there is no data
                        if (!data || data.length == 0) return;
                        
                        document.getElementById("pokename").innerHTML = "Pokemon Name: " + data.name;
                        var x = 0;
                        var y = "";
                        while (x < data.types.length) {
                            y += "Type " + (x + 1) + ": " + data.types[x].type.name + "<br>";
                            x++;
                        }
                        
                        document.getElementById("poketype").innerHTML = y;
                        document.getElementById("img1").src = data.sprites.front_default;
                        document.getElementById("userInput1").innerHTML = "ID searched: " + userInput + "<br>This ID has been searched " + sessionStorage.getItem(userInput.toString()) + " time(s) this session.";
                        // Print the standings
                        
                    })
                    // Code to run if the request fails; the raw request and
                    // status codes are passed to the function
                    .fail(function(xhr, status, errorThrown) {
                        console.log("Sorry, there was a problem!");
                        console.log("Error: " + errorThrown);
                        console.log("Status: " + status);
                        console.dir(xhr);
                    })
                    // Code to run regardless of success or failure;
                    .always(function(xhr, status) {
                        console.log("The request is complete!");
                    });
            }
        </script>
        <div id="title1">Cullen's Pokemon Looker Upper</div>
        Enter a number > 0:<input type="text" id="userIn">
        <input id="enter1" type="button" value="Search" onclick="test1()" />
        <br><pname id="pokename"></pname><br>
        <ptype id="poketype"></ptype><br>
        <img src="" id="img1"><br>
        <pdata id="userInput1"></pdata>
        
    </body>
</html>