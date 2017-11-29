<php
    
!>
    

<!DOCTYPE HTML>
<html>
    <head>
        <style>
            #sameName {
                color: red;
            }
        </style>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.min.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
    </head>
    
    <body>
        <div id="title1">Sign Up Application</div>
        Username: <input type="text" id="usern" onfocusout="checkNames()"><p1 id="sameName"></p1><br>
        Password: <input type="text" id="passw" onfocusout="checkPass()"><p2 id="invalPass"></p2><br>
        RetypePass: <input type="text" id="passwRe" onfocusout="doubleCheckPass()"><p3 id="noMatch"></p3><br>
        Email: <input type="text" id="email" onfocusout="emailVali()"><p4 id="badEmail"></p4><br>
        State: <input type="text" id ="state" name="state" onfocusout="countyUpdate()"><br>
        Zip: <input type="text" id="zip" onfocusout="zipUpdate()" ><p5 id="zipText"></p5><br>
        Phone: <input type="text" id="phone" onfocusout="phoneVali()"><p6 id="badPhone"></p6><br>
        <input id="enter1" type="button" value="Submit" onclick="complete()" /><br><p7 id="end"></p7>
        
        <table id="ZipResults" style="display:none;">
                    <thead>
                        <th>City</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                    </thead>
                    <tbody></tbody>
        </table>
        
        <table id="countyResults" style="display:none;">
                    <thead>
                        <th>Counties</th>
                    </thead>
                    <tbody></tbody>
        </table>
        
    </body>
    
    <script type="text/javascript">
        var count = 0;
        var nameArray = ["Cullen", "Adrian", "Carlos"];
        function checkNames() {
            if (nameArray.includes(document.getElementById("usern").value)) {
                document.getElementById("sameName").innerHTML = "Username Already In Use";
                return false;
            } else {
                document.getElementById("sameName").innerHTML = "";
                return true;
            }
        }
        function checkPass() {
            var passwordContents = document.getElementById("passw").value;
            var instructMake = "";
            if (passwordContents.length < 8) {
                instructMake = "|Password length must be at least 8 characters ";
            }
            if (passwordContents.toLowerCase() == passwordContents) {
                instructMake = instructMake + "|Password must have an uppercase letter ";
            }
            if (!passwordContents.match(/\d+/g)) {
                instructMake = instructMake + "|Password must have a number ";
            }
            document.getElementById("invalPass").innerHTML = instructMake;
            if (instructMake == "") {
                return true;
            } else {
                return false;
            }
        }
        function doubleCheckPass() {
            if (document.getElementById("passw").value != document.getElementById("passwRe").value) {
                document.getElementById("noMatch").innerHTML = "Passwords do not match";
                return false;
            } else {
                document.getElementById("noMatch").innerHTML = "";
                return true;
            }
        }
        function emailVali() {
            //sshhh this validation is close enough
            if (!document.getElementById("email").value.includes("@") || !document.getElementById("email").value.includes(".")) {
                document.getElementById("badEmail").innerHTML = "Invalid email syntax";
                return false;
            } else {
                document.getElementById("badEmail").innerHTML = "";
                return true;
            }
        }
        function countyUpdate()
        {
            if (document.getElementById("state").value.length > 0)
            {
                //displays countyResults table
                document.getElementById("countyResults").style.display = "block";
                //clears table in case there was one there previously
                $("#countyResults tbody tr").remove();
                //calls lab7_counties.js file
                $.getScript('lab7_counties.js', function() {
                });
                return true;
            }
        }
        function zipUpdate()
        {
            if (document.getElementById("zip").value.length != 5)
            {
                document.getElementById("zipText").innerHTML = "Zip must be 5 numbers long";
                return false;
            }
            else 
            {
                document.getElementById("zipText").innerHTML =""
                //displays ZipResults table
                document.getElementById("ZipResults").style.display = "block";
                //clears table in case there was one there previously
                $("#ZipResults tbody tr").remove();
                //calls lab7_zipCode.js file
                $.getScript('lab7_zipCode.js', function() {
                });
                return true;
            }
        }
        function phoneVali() {
            if (!document.getElementById("phone").value.length == 10 || !document.getElementById("phone").value.match(/^[0-9]+$/)) {
                document.getElementById("badPhone").innerHTML = "Invalid phone syntax";
                return false;
            } else {
                document.getElementById("badPhone").innerHTML = "";
                return true;
            }
        }
        function complete() {
            if (phoneVali() && emailVali() && doubleCheckPass() && checkPass() && checkNames()) {
                nameArray.push(document.getElementById("usern").value);
                document.getElementById("end").innerHTML = "(" + count + ")Add Success";
                document.getElementById("usern").value = "";
                document.getElementById("passw").value = "";
                document.getElementById("passwRe").value = "";
                document.getElementById("phone").value = "";
                document.getElementById("email").value = "";
                document.getElementById("state").value = "";
                document.getElementById("zip").value = "";
                count++;
                //clears zip code location table uppon sucessfull sign up
                $("#ZipResults tbody tr").remove();
                document.getElementById("ZipResults").style.display = "none";
            } else {
                document.getElementById("end").innerHTML = "Add Decline";
            }
            
        }
    </script>
    
    
    
</html>