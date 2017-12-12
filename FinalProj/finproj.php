<!DOCTYPE HTML>
<html>
    <head>
        <title>Beer Pong Game Tracker</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            @import url("./styles.css");
        </style>
    </head>
    <body>
        <!--For Testing-->
        <!--<input type="button" onclick="test01()" value="Test">-->
        <!--<script>function test01() { console.log(userJson["responseJSON"][0].eman); }</script>-->
        
        <div id="logInDisplay">
        Log In<br>
        Username: <input type="text" id="usernameL"><br>
        Password: <input type="text" id="passwordL"><br>
        <input type="button" value="LOG IN" id="logInL" onclick="logInL()"><br>
        <pV id="invalLogin"></pV>
        </div>
        <div id="createAccDisplay">
            --Create Account--<br>
            Username: <input type="text" id="usernameC"><pW id="userWarn"></pW><br>
            Password: <input type="text" id="passwordC"><pX id="passWarn"></pX><br>
            ConfirmPass: <input type="text" id="passRe"><pY id="passMatch"></pY><br>
            <input type="button" value="CREATE" id="createC" onclick="createAcc()"><br>
            -----------------------
        </div>
        <div id="adminSectionU" class="adminSect"></div>
        <div id="adminSectionT" class="adminSect"></div>
        <div id="adminSectionGL" class="adminSect"></div>
        <div id="backGroundCent" class="adminSect"></div>
        <input type="button" class="menuButts" id="logInButt" onclick="logIn()" value="Log In">
        <input type="button" class="menuButts" id="createAccButt" onclick="createAccount()" value="Create Account">
        <input type="button" class="menuButts" id="homeButt" onclick="homeLoad()" value="Home">
        <input type="button" class="menuButts" id="logOutButt" onclick="logOut()" value="Log Out">
        <input type="button" class="menuButts" id="myAccButt" onclick="matchSetUp()" value="Create A Game">
        <input type="button" class="menuButts" id="showReportsButt" onclick="showReports()" value="Show Reports">
        <input type="button" class="menuButts" id="hideReportsButt" onclick="hideReports()" value="Hide Reports">
        <img src="rscBg.jpg" alt="" id="cup1" class="rsc">
        <img src="rscBg.jpg" alt="" id="cup2" class="rsc">
        <img src="rscBg.jpg" alt="" id="cup3" class="rsc">
        <img src="rscBg.jpg" alt="" id="cup4" class="rsc">
        <img src="rscBg.jpg" alt="" id="cup5" class="rsc">
        <img src="rscBg.jpg" alt="" id="cup6" class="rsc">
        <script>
            sessionStorage.seshUser = "";
            sessionStorage.seshPass = "";
            var userJson;
            var teamsJson;
            var gameLogJson;
            getUserData();
            getTeamsData();
            getGameLogData();
            function showReports() {
                document.getElementById("adminSectionGL").innerHTML = "|-|-|-|-|-|-|Pong Data|-|-|-|-|-|-|<br>" +
                "User Count: " + userJson["responseJSON"].length + "<br>Team Count: " + userJson["responseJSON"].length +
                "<br>Games Logged: " + gameLogJson["responseJSON"].length +
                "<br><input type='button'>";
                
                document.getElementById("showReportsButt").style.visibility = "hidden";
                document.getElementById("hideReportsButt").style.visibility = "visible";
            }
            function hideReports() {
                document.getElementById("adminSectionGL").innerHTML = "";
                document.getElementById("hideReportsButt").style.visibility = "hidden";
                document.getElementById("showReportsButt").style.visibility = "visible";
            }
            function getUserData() {
                userJson = $.getJSON("dbUser.php").done(function(data){
                    console.log(data);
                    homeLoad();
                    return data;
                })
            }
            function getTeamsData() {
                teamsJson = $.getJSON("dbTeam.php").done(function(data){
                    console.log(data);
                    return data;
                })
            }
            function getGameLogData() {
                gameLogJson = $.getJSON("dbGLog.php").done(function(data){
                    console.log(data);
                    return data;
                })
            }
            function logIn() {
                hide();
                document.getElementById("logInButt").style.backgroundColor = "white";
                document.getElementById("logInDisplay").style.visibility = "visible";
            }
            function createAccount() {
                hide();
                document.getElementById("createAccButt").style.backgroundColor = "white";
                document.getElementById("createAccDisplay").style.visibility = "visible";
            }
            function homeLoad() {
                hide();
                document.getElementById("homeButt").style.backgroundColor = "white";
                if(checkUserAcc()) {
                    var x = findElementUser(sessionStorage.getItem("seshUser"));
                    var wins = userJson["responseJSON"][x].wins;
                    var losses = userJson["responseJSON"][x].losses;
                    var team = userJson["responseJSON"][x].team;
                    if (team == "na") {
                        team = "No Team";
                    }
                    var id = userJson["responseJSON"][x].id;
                    document.getElementById("adminSectionU").innerHTML = "Username: " + sessionStorage.getItem("seshUser") +
                    "<br>Games Played: " + (parseInt(wins) + parseInt(losses)) + "<br>Wins: " + wins + "<br>Losses: " + losses + "<br>Team: " + team +
                    "<br><input type='button' class='generatedButts' value='Join Team' onclick='userJoinTeam(" + x + ")'>";
                    
                } else {
                    var y = 0;
                    var userL = "-----USER LIST-----<br>";
                    while (y < userJson["responseJSON"].length) {
                        userL += userJson["responseJSON"][y].eman + "<br>";
                        y++;
                    }
                    document.getElementById("backGroundCent").innerHTML = userL + "-------------------------";
                    document.getElementById("backGroundCent").style.padding = "25px";
                }
            }
            function userJoinTeam(x) {
                homeLoad();
                var y = 0;
                var spinnerInp = "<select id='teamSelect'>";
                while (y < teamsJson["responseJSON"].length) {
                    spinnerInp += "<option value='" + teamsJson["responseJSON"][y].eman + "'>" + teamsJson["responseJSON"][y].eman + "</option>";
                    y++;
                }
                spinnerInp += "</select>";
                document.getElementById("adminSectionT").innerHTML = "Available Teams:<br>" + spinnerInp +
                "<br><input type='button' class='generatedButts' value='Join Team' onclick='teamJoin(" + x + ")'><br>- - - - - - - - - - - - - - - - -<br>" + 
                "<input type='button' class='generatedButts' value='Create New Team:' onclick='teamCreate(" + x + ")'><br><input type='text' id='teamInpStr'>";
            }
            function teamCreate(userIndex) {
                var teamName = document.getElementById("teamInpStr").value;
                if (teamName == "" || teamName == "Enter A Name") {
                    document.getElementById("teamInpStr").value = "Enter A Name";
                    return;
                }
                var userId = userJson["responseJSON"][userIndex].id;
                var creatReturn = $.get("dbUserAddT.php", {userID: userId, teamNew: teamName}).done(function(data){
                    console.log(data);
                });
                refrUserData();
                var creatInpU = sessionStorage.getItem("seshUser");
                creatReturn = $.get("dbTeamCreat.php", {nameInp: teamName, creatInp: creatInpU}).done(function(data){
                    console.log(data);
                });
                refrTeamsData();
            }
            function teamJoin(userIndex) {
                var teamName = document.getElementById("teamSelect").value;
                var userId = userJson["responseJSON"][userIndex].id;
                var creatReturn = $.get("dbUserAddT.php", {userID: userId, teamNew: teamName}).done(function(data){
                    console.log(data);
                });
                refrUserData();
            }
            function logOut() {
                document.getElementById("adminSectionGL").innerHTML = "";
                sessionStorage.seshUser = "";
                sessionStorage.seshPass = "";
                homeLoad();
                document.getElementById("logOutButt").style.visibility = "hidden";
                document.getElementById("myAccButt").style.visibility = "hidden";
                document.getElementById("logInButt").style.visibility = "visible";
                document.getElementById("createAccButt").style.visibility = "visible";
            }
            function matchSetUp() {
                document.getElementById("myAccButt").style.backgroundColor = "white";
                document.getElementById("homeButt").style.backgroundColor = "grey";
                document.getElementById("adminSectionT").innerHTML = "New Match<br>--Team 1--<br>" +
                "Player1: " + sessionStorage.getItem("seshUser") + "<br>Player2: <input type='text' id='p2'><br>--Team 2--<br>" +
                "Player3: <input type='text' id='p3'><br>Player4: <input type='text' id='p4'><br>" +
                "Winning Team: |Team 1<input checked='true' type='radio' name='actionIsComing' id='radWin1' value='1'>|Team 2<input type='radio' name='actionIsComing' id='radWin2' value='2'>|<br>" +
                "<input type='button' value='Input Match Data' class='generatedButts' onclick='matchInput()'>";
            }
            function matchInput() {//need to put teams and winner into the api function
                var x = findElementUser(sessionStorage.getItem("seshUser"));
                var uid = userJson["responseJSON"][x].id;
                var t1 = sessionStorage.getItem("seshUser") + "^." + document.getElementById("p2").value + "^.";
                var t2 = document.getElementById("p3").value + "^." + document.getElementById("p4").value + "^.";
                var tWin;
                var winAmnt;
                if (document.getElementById("radWin1").checked) {
                    tWin = 1;
                    winAmnt = parseInt(userJson["responseJSON"][x].wins) + 1;
                } else {
                    tWin = 0;
                    winAmnt = parseInt(userJson["responseJSON"][x].losses) + 1;}
                console.log(tWin);
                console.log(uid);
                console.log(winAmnt);
                var creatReturn = $.get("dbUserWin.php", {winBoo: tWin, userID: uid, wlC: winAmnt}).done(function(data){
                    console.log(data);
                });
                creatReturn = $.get("dbGLCreat.php", {tSize: 2, team1: t1, team2: t2, tWinner: tWin}).done(function(data){
                    console.log(data);
                });
                refrGameLogData();
                refrUserData();
            }
            function hide() {
                if (checkUserAcc()) {
                    document.getElementById("logInButt").style.visibility = "hidden";
                    document.getElementById("createAccButt").style.visibility = "hidden";
                    document.getElementById("logOutButt").style.visibility = "visible";
                    document.getElementById("myAccButt").style.visibility = "visible";
                    document.getElementById("showReportsButt").style.visibility = "visible";
                } else {
                    document.getElementById("showReportsButt").style.visibility = "hidden";
                }
                document.getElementById("logInButt").style.backgroundColor = "grey";
                document.getElementById("createAccButt").style.backgroundColor = "grey";
                document.getElementById("homeButt").style.backgroundColor = "grey";
                document.getElementById("myAccButt").style.backgroundColor = "grey";
                document.getElementById("logInDisplay").style.visibility = "hidden";
                document.getElementById("createAccDisplay").style.visibility = "hidden";
                document.getElementById("hideReportsButt").style.visibility = "hidden";
                document.getElementById("adminSectionU").innerHTML = "";
                document.getElementById("adminSectionT").innerHTML = "";
                document.getElementById("adminSectionGL").innerHTML = "";
                document.getElementById("backGroundCent").innerHTML = "";
                document.getElementById("backGroundCent").style.padding = "0px";
            }
            function createAcc() {
                var nameInpU = document.getElementById("usernameC").value;
                var passInpU = document.getElementById("passwordC").value;
                var return01 = false;
                if (nameInpU.length > 15) {
                    document.getElementById("userWarn").innerHTML = "Username must be 15 or less characters.";
                    return01 = true;
                }
                if (passInpU.length > 15 && passInpU.length < 5) {
                    document.getElementById("passWarn").innerHTML = "Password must be 15 or less characters and more than 5 characters.";
                    return01 = true;
                }
                if (passInpU != document.getElementById("passRe").value) {
                    document.getElementById("passMatch").innerHTML = "Passwords do not match.";
                    return01 = true;
                }
                if (return01) {
                    return;
                }
                passInpU = hashCode(passInpU);
                var creatReturn = $.get("dbUserCreat.php", {nameInp: nameInpU, passInp: passInpU}).done(function(data){
                    console.log(data);
                });
                console.log(creatReturn);
            }
            function logInL() {
                if (document.getElementById("usernameL").value == "nimdA" && document.getElementById("passwordL").value == "1q2w") {
                    hide();
                    adminLoad();
                    console.log("logIn:Admin");
                    return;
                }
                sessionStorage.setItem("seshUser", document.getElementById("usernameL").value);
                sessionStorage.setItem("seshPass", document.getElementById("passwordL").value);
                if (!checkUserAcc()){
                    sessionStorage.setItem("seshUser", "");
                    sessionStorage.setItem("seshPass", "");
                    console.log("logIn:fail");
                } else {
                    homeLoad();
                    console.log("logIn:success");
                }
            }
            function checkUserAcc() {
                var nameTemp = sessionStorage.getItem("seshUser");
                var passTemp = sessionStorage.getItem("seshPass");
                if (nameTemp != ""){
                    var x = 0;
                    while (x < userJson["responseJSON"].length) {
                        if ((userJson["responseJSON"][x].eman == nameTemp) && (userJson["responseJSON"][x].ssap == hashCode(passTemp))) {
                            return true;
                        }
                        x++;
                    }
                }
                return false;
            }
            function hashCode(strInp) {
                var len = strInp.length;
                var hash = 0;
                var char;
                for (var i = 1; i <= len; i++) {
                    char = strInp.charCodeAt((i - 1));
                    hash += char * Math.pow(31, (len - i));
                    hash = hash & hash; //js limitation to force 32 bit
                }
                return hash;
            }
            function findElementUser(nameInput) {
                var x = 0;
                while (x < userJson["responseJSON"].length && nameInput != userJson["responseJSON"][x].eman) {
                    x++;}
                return x;}
            function findElementTeam(nameInput) {
                var x = 0;
                while (x < teamsJson["responseJSON"].length && nameInput != teamsJson["responseJSON"][x].eman) {
                    x++;}
                return x;}
            function findElementGLog(nameInput) {
                var x = 0;
                while (x < gameLogJson["responseJSON"].length && nameInput != gameLogJson["responseJSON"][x].gameID) {
                    x++;}
                return x;}
            function adminLoad() {
                var x = 0;
                var inputStringU = "";
                var inputStringT = "";
                var inputStringGL = "";
                document.getElementById("adminSectionU").style.visibility = "visible";
                document.getElementById("adminSectionT").style.visibility = "visible";
                document.getElementById("adminSectionGL").style.visibility = "visible";
                while (x < userJson["responseJSON"].length) {
                    inputStringU += userJson["responseJSON"][x].eman + " <input type='button' class='generatedButts' onclick='adminEditU(\"" + userJson["responseJSON"][x].eman + "\")' value='Edit'><br>";
                    x++;
                }
                inputStringU += "<input type='button' id='createUA' class='generatedButts' onclick='createUserA()' value='CREATE USER'>";
                x = 0;
                console.log(teamsJson["responseJSON"].length);
                while (x < teamsJson["responseJSON"].length) {
                    inputStringT += teamsJson["responseJSON"][x].eman + " <input type='button' class='generatedButts' onclick='adminEditT(\"" + teamsJson["responseJSON"][x].eman + "\")' value='Edit'><br>";
                    x++;
                }
                inputStringT += "<input type='button' id='createTA' class='generatedButts' onclick='createTeamA()' value='CREATE TEAM'>";
                x = 0;
                while (x < gameLogJson["responseJSON"].length) {
                    inputStringGL += "Game ID:" + gameLogJson["responseJSON"][x].gameID + " <input type='button' class='generatedButts' onclick='adminEditGL(\"" + gameLogJson["responseJSON"][x].gameID + "\")' value='Edit'><br>";
                    x++;
                }
                document.getElementById("adminSectionU").innerHTML = "ADMIN USERLIST<br>" + inputStringU;
                document.getElementById("adminSectionT").innerHTML = "ADMIN TEAMLIST<br>" + inputStringT;
                document.getElementById("adminSectionGL").innerHTML = "ADMIN GAMES LOGGED<br>" + inputStringGL;
            }
            function adminEditU(userName01) {
                var y = findElementUser(userName01);
                document.getElementById("adminSectionT").style.visibility = "hidden";
                document.getElementById("adminSectionGL").style.visibility = "hidden";
                document.getElementById("adminSectionU").innerHTML = "Username: " + userName01 +
                "<br>New Name: <input type='text' id='nua' class='generatedButts'>" +
                "<br>New Pass: <input type='text' id='pua' class='generatedButts'><br>" +
                "Edit Wins: <input type='number' id='wua' class='generatedButts' value='" + userJson["responseJSON"][y].wins + "'><br>" +
                "Edit Losses: <input type='number' id='lua' class='generatedButts' value='" + userJson["responseJSON"][y].losses + "'><br>" +
                "<input type='button' class='generatedButts' onclick='editUA(" + userJson["responseJSON"][y].id + ")' value='CONVERT CHANGES'>" +
                "<input type='button' class='generatedButts' onclick='deleteUA(" + userJson["responseJSON"][y].id + ")' value='DELETE USER'>" +
                "<input type='button' class='generatedButts' onclick='logInL()' value='CANCEL'>";
            }
            function adminEditT(teamName01) {
                var y = findElementTeam(teamName01);
                document.getElementById("adminSectionU").style.visibility = "hidden";
                document.getElementById("adminSectionGL").style.visibility = "hidden";
                document.getElementById("adminSectionT").innerHTML = "Team Name: " + teamName01 +
                "<br>New Creator: <input type='text' id='pta' class='generatedButts' value='" + teamsJson["responseJSON"][y].creator + "'><br>" +
                "Edit Wins: <input type='text' id='wta' class='generatedButts' value='" + teamsJson["responseJSON"][y].wins + "'><br>" +
                "Edit Losses: <input type='text' id='lta' class='generatedButts' value='" + teamsJson["responseJSON"][y].losses + "'><br>" +
                "<input type='button' class='generatedButts' onclick='editTA(\"" + teamsJson["responseJSON"][y].eman + "\")' value='CONVERT CHANGES'>" +
                "<input type='button' class='generatedButts' onclick='deleteTA(\"" + teamsJson["responseJSON"][y].eman + "\")' value='DELETE TEAM'>" +
                "<input type='button' class='generatedButts' onclick='logInL()' value='CANCEL'>";
            }
            function adminEditGL(gameLogInp01) {
                var y = findElementGLog(gameLogInp01), x = 0; //ints
                var size = gameLogJson["responseJSON"][y].teamSize;
                var teamString = ""; //string
                console.log(size);
                var z1 = getData(size, gameLogJson["responseJSON"][y].team1);
                var z2 = getData(size, gameLogJson["responseJSON"][y].team2);
                if (z1 == "0") {
                    z1 = "Unregistered Team 1";}
                teamString += "Team: " + z1;
                while (x < size) {
                    teamString += "<br>P" + (x + 1) + ":<input type='text' id='1gla" + x + "' class='ptext' value='" + getData(x, gameLogJson["responseJSON"][y].team1) + "'<br>";
                    x++;
                }
                x = 0;
                if (z2 == "0") {
                    z2 = "Unregistered Team 2";}
                teamString += "<br>Team: " + z2;
                while (x < size) {
                    teamString += "<br>P" + (x + 1) + ":<input type='text' id='2gla" + x + "' class='ptext' value='" + getData(x, gameLogJson["responseJSON"][y].team2) + "'<br>";
                    x++;
                }
                document.getElementById("adminSectionU").style.visibility = "hidden";
                document.getElementById("adminSectionT").style.visibility = "hidden";
                document.getElementById("adminSectionGL").innerHTML = teamString + "<br><input type='button' id='glCancel' value='Cancel' onclick='logInL()'>" +
                "<input type='button' id='glUpdate' value='Update' onclick='updateGL(" + size + ", \"" + z1 + "\", \"" + z2 + "\", " + gameLogInp01 + ")'>" +
                "<input type='button' onclick='deleteGLA(" + gameLogJson["responseJSON"][y].gameID + ")' value='DELETE LOG'>";
            }
            function createUserA() {
                document.getElementById("adminSectionT").style.visibility = "hidden";
                document.getElementById("adminSectionGL").style.visibility = "hidden";
                document.getElementById("adminSectionU").innerHTML =
                "<br>Name: <input type='text' id='nua' class='generatedButts'>" +
                "<br>Pass: <input type='text' id='pua' class='generatedButts'><br>" +
                "<input type='button' class='generatedButts' onclick='createUA()' value='CREATE USER'>" +
                "<input type='button' class='generatedButts' onclick='logInL()' value='CANCEL'>";
            }
            function createUA() {
                var nameInpU = document.getElementById("nua").value;
                var passInpU = document.getElementById("pua").value;
                passInpU = hashCode(passInpU);
                var creatReturn = $.get("dbUserCreat.php", {nameInp: nameInpU, passInp: passInpU}).done(function(data){
                    console.log(data);
                })
                refrUserData();
            }
            function deleteUA(userID){
                var creatReturn = $.get("dbUserDelete.php", {uid: userID}).done(function(data){
                    console.log(data);
                })
                refrUserData();
            }
            function deleteTA(teamName){
                var creatReturn = $.get("dbTeamDelete.php", {teamName: teamName}).done(function(data){
                    console.log(data);
                })
                refrTeamsData();
            }
            function deleteGLA(glID){
                var creatReturn = $.get("dbGLDelete.php", {glID: glID}).done(function(data){
                    console.log(data);
                })
                refrGameLogData();
            }
            function createTeamA() {
                document.getElementById("adminSectionU").style.visibility = "hidden";
                document.getElementById("adminSectionGL").style.visibility = "hidden";
                document.getElementById("adminSectionT").innerHTML =
                "<br>Name: <input type='text' id='nua' class='generatedButts'>" +
                "<br>Creator: <input type='text' id='pua' class='generatedButts'><br>" +
                "<input type='button' class='generatedButts' onclick='createTA()' value='CREATE TEAM'>" +
                "<input type='button' class='generatedButts' onclick='logInL()' value='CANCEL'>";
            }
            function createTA() {
                var nameInpU = document.getElementById("nua").value;
                var creatInpU = document.getElementById("pua").value;
                var creatReturn = $.get("dbTeamCreat.php", {nameInp: nameInpU, creatInp: creatInpU}).done(function(data){
                    console.log(data);
                })
                refrTeamsData();
            }
            function editTA(teamName){
                console.log(teamName);
                var x = findElementTeam(teamName);
                var teamCreator = document.getElementById("pta").value;
                var wins = document.getElementById("wta").value;
                var losses = document.getElementById("lta").value
                var creatReturn = $.get("dbTeamUpdate.php", {nameT: teamName, creatorT: teamCreator, winsT: wins, lossesT: losses}).done(function(data){
                    console.log(data);
                })
                refrTeamsData();
            }
            function editUA(userId) {
                var nameInp = document.getElementById("nua").value;
                var passInp = hashCode(document.getElementById("pua").value);
                var winsInp = document.getElementById("wua").value;
                var lossesInp = document.getElementById("lua").value;
                
                var creatReturn = $.get("dbUserUpdate.php", {userID: userId, nameNew: nameInp, passNew: passInp, wins: winsInp, losses: lossesInp}).done(function(data){
                    console.log(data);
                });
                refrUserData();
            }
            function updateGL(y, name1, name2, gameId) {
                var team1Inp = "", team2Inp = "";
                var x = 0;
                while (x < y) {
                    team1Inp += document.getElementById("1gla" + parseInt(x)).value + "^.";
                    team2Inp += document.getElementById("2gla" + parseInt(x)).value + "^.";
                    x++;
                }
                if (name1 != "Unregistered Team 1") {
                    team1Inp += name1 + "^.";
                }
                if (name2 != "Unregistered Team 2") {
                    team2Inp += name2 + "^.";
                }
                var creatReturn = $.get("dbGLUpdate.php", {team1: team1Inp, team2: team2Inp, gameID: gameId}).done(function(data){
                    console.log(data);
                });
                refrGameLogData();
            }
            //data func from lab 8
            function getData(myInt, databaseData) {
                var outputString = "";
                var charCounter = 0;
                var periodCounter = 0;
                while (periodCounter < myInt) {
                    if ((databaseData.charAt(charCounter) == '^') && (databaseData.charAt(charCounter + 1) == '.')) {
                        periodCounter++;
                    }
                    charCounter++;
                    if ((charCounter + 1) >= databaseData.length) {
                        return "0";
                    }
                }
                if ((charCounter + 1) >= databaseData.length) { return "0";}
                if (charCounter != 0) {
                    charCounter++;
                }
                while (!((databaseData.charAt(charCounter) == '^') && (databaseData.charAt(charCounter + 1) == '.'))) {
                    outputString += databaseData.charAt(charCounter);
                    charCounter++;
                }
                return outputString;
            }
            function refrUserData() {
                userJson = $.getJSON("dbUser.php").done(function(data){
                    console.log(data);
                    logInL();
                    return data;
                })}
            function refrTeamsData() {
                teamsJson = $.getJSON("dbTeam.php").done(function(data){
                    console.log(data);
                    logInL();
                    return data;
                })}
            function refrGameLogData() {
                gameLogJson = $.getJSON("dbGLog.php").done(function(data){
                    console.log(data);
                    logInL();
                    return data;
                })}
        </script>
    </body>
</html>