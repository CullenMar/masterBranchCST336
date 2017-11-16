<?php
//IF APP NOT WORKING USE HEROKU || OR || LOOK AT bash.rc FOR ENVIRONMENT VARIABLES

    session_start();
    if(isset($_GET["log"])){
        session_unset();
    }
    //session variables for updating user
    if(isset($_GET["nameChange"]))
        $_SESSION["name"] = $_GET["nameChange"];
        
    if(isset($_GET["passChange"]))
        $_SESSION["pass"] = $_GET["passChange"];
        
    if(isset($_GET["animalChange"]))
        $_SESSION["animal"] = $_GET["animalChange"];
        
    if(isset($_GET["colorChange"]))
        $_SESSION["color"] = $_GET["colorChange"];
        
    if(isset($_POST["nameInput"]))
        $_SESSION["userName"] = $_POST["nameInput"];
    if(isset($_POST["passInput"]))
        $_SESSION["userPass"] = $_POST["passInput"];
    
    //session variables for new user
    if(isset($_GET["newName"]))
        $_SESSION["addName"] = $_GET["newName"];
        
    if(isset($_GET["newPass"]))
        $_SESSION["addPass"] = $_GET["newPass"];
        
    if(isset($_GET["newAnimal"]))
        $_SESSION["addAnimal"] = $_GET["newAnimal"];
        
    if(isset($_GET["newColor"]))
        $_SESSION["addColor"] = $_GET["newColor"];

    //delete confirmation variable
    if(isset($_GET["deleteConfirmation"]))
        $_SESSION["deleteUser"] = $_GET["deleteConfirmation"];        

    $dbHost = getenv("sqlhost");
    $dbPort = 3306;
    $dbName = getenv("sqldb3");
    $username = getenv("sqluser");
    $password = getenv("sqlpw");
    
    $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
        <link rel="stylesheet" href="./css/styles.css" />
    </head>
    <body>
        <br><br><br>
        <?php
            $sqlAdmin = "SELECT * FROM admin";
            $stmtAdmin = $dbConn -> prepare($sqlAdmin);
            $stmtAdmin -> execute ();
            $rowAdmin = $stmtAdmin -> fetch();
            
            if($_SESSION["userName"] == $rowAdmin['name'] && password_verify($_SESSION["userPass"], $rowAdmin['pass'])){
                if(isset($_GET['deleteUser']))
                {
                    $sql = "SELECT * FROM userList WHERE name = '" . $_GET['lookup'] . "'";
                    $stmt = $dbConn -> prepare($sql);
                    $stmt -> execute ();
                    $row = $stmt -> fetch();
                    
                    echo "User Name: ". $row['name']. "<br>
                         <form method = 'GET'>
                         To confirm user account delete, enter user's name: <input type='text' name='deleteConfirmation'>
                         <input type='submit' value='Submit'>
                         </form>";
                         
                        //pass name to compare with what they entered
                        $_SESSION['passName'] = $row['name'];
                        $_SESSION['passIDdelete'] = $row['id'];
                    
                } 
                
                else if(isset($_GET["lookup"])){
                    $sql = "SELECT * FROM userList WHERE name = '" . $_GET['lookup'] . "'";
                    $stmt = $dbConn -> prepare($sql);
                    $stmt -> execute ();
                    $row = $stmt -> fetch();

                    // CHANGE "EDIT" UNDER #edit
                    echo "<div id='edit'>EDIT:</div><br>";
                    echo "<form method = 'GET'>
                        Username: " . $row['name'] . "<br>New Username: <input type='text' name='nameChange'><br><br>
                        Hashed Password: " . $row['pass'] . "<br>New Password: <input type='text' name='passChange'><br><br>
                        Favorite Animal: " . $row['animal'] . "<br>New Animal: <input type='text' name='animalChange'><br><br>
                        Favorite Color: " . $row['color'] . "<br>New Color: <input type='text' name='colorChange'><br><br>
                        <input type='submit' value='Submit'>
                        </form>";
                        
                        //used to pass name after this form is submitted
                        $_SESSION['passID'] = $row['id'];
                    echo "<br><br> <a id='deleteLink' href='./lab6.php?deleteUser=1&lookup=" . $row['name'] . "'>Delete User</a>";
                } 
                
                else if(isset($_GET["addUser"]))
                {
                    echo "<div id='edit'>Add new User</div><br>
                          <form method = 'GET'>
                                Username: <input type='text' name='newName'><br>
                                Password: <input type='text' name='newPass'><br>
                                Animal: <input type='text' name='newAnimal'><br>
                                Color: <input type='text' name='newColor'><br><br>
                                <input type='submit' value='Submit'>
                          </form>";
                          
                    
                } else {
                    //NEW USER: Prepares the sql statement for edit user
                     echo "<div id='userlist'>USER LIST</div><br><br>";
                    //delete user if delete confirmation is set
                    if($_SESSION["deleteUser"] !=null)
                    {
                        if($_SESSION["deleteUser"] == $_SESSION["passName"])
                        {
                            $sql = "DELETE FROM `userList` WHERE id = ".$_SESSION['passID'];
                            $stmt = $dbConn -> prepare($sql);
                            $stmt -> execute ();
                            
                            echo "<div id='edit'>User deleted</div><br><br>";
                        }
                        else{
                            echo "User not deleted. Incorrect name input.<br><br>";
                        }
                        
                        unset($_SESSION["deleteUser"]);
                    }
                    
                    if (($_SESSION["addName"] != null)){
                        $sql = "INSERT INTO `userList` (";
                        $AND = 0;
                    
                    
                        if ($_SESSION["addName"] != null){
                            $sql = ($sql . " `name`");
                            $AND = 1;
                        }
                        if ($_SESSION["addPass"] != null){
                            if ($AND == 1){
                                $sql = ($sql . ", ");
                            }
                            
                            $sql = $sql . " `pass`";
                            $AND = 1;
                        }
                        if ($_SESSION["addAnimal"] == !null){
                            if ($AND == 1){
                                $sql = ($sql . ", ");
                            }
                            $sql = ($sql . " `animal`");
                            $AND = 1;
                        }
                        if($_SESSION["addColor"]!=null)
                        {
                            if ($AND == 1){
                                $sql = ($sql . ", ");
                            }
                            $sql = ($sql . " `color`");
                        }
                        
                        $sql = $sql . ") VALUES (";
                        $AND=0;
                        //second checking pass to add VALUES
                        if ($_SESSION["addName"] != null){
                            $sql = ($sql .  "'" . $_SESSION["addName"]) . "'";
                            $AND = 1;
                        }
                        if ($_SESSION["addPass"] != null){
                            if ($AND == 1){
                                $sql = ($sql . ", ");
                            }
                            $options = [
                                'cost' => 11,
                                'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
                            ];
                            $hash = password_hash($_SESSION["addPass"], PASSWORD_BCRYPT, $options);
                            
                            $sql = $sql . "'" . $hash . "'";
                            
                            $AND = 1;
                        }
                        if ($_SESSION["addAnimal"] == !null){
                            if ($AND == 1){
                                $sql = ($sql . ", ");
                            }
                            $sql = $sql . "'". $_SESSION["addAnimal"] . "'";
                            $AND = 1;
                        }
                        if($_SESSION["addColor"]!=null)
                        {
                            if ($AND == 1){
                                $sql = ($sql . ", ");
                            }
                            $sql = ($sql . "'" . $_SESSION["addColor"] . "'");
                        }
                        
                        $sql = $sql . ")";
                        
                        //executes sql statement for adding user
                         echo "<div id='success'>ADD SUCCESS</div><br>";
                        
                         $stmt = $dbConn -> prepare($sql);
                         $stmt -> execute();
                            
                        //unset session variables for new user
                            unset($_SESSION["addName"]);
                            unset($_SESSION["addPass"]);
                            unset($_SESSION["addAnimal"]);
                            unset($_SESSION["addColor"]);
                    }
                    
                    //EDIT USER: prepares and exwcutes sql statement to edit user
                    if (($_SESSION["name"] != null) || ($_SESSION["pass"] != null ) || ($_SESSION["animal"] != null) || ($_SESSION["color"] != null)){
                        $sql = "UPDATE `userList` SET ";
                        $AND = 0;
                    
                    
                        if ($_SESSION["name"] != null){
                            $sql = ($sql . " name = '" . $_SESSION["name"] . "'");
                            $AND = 1;
                        }
                        if ($_SESSION["pass"] != null){
                            if ($AND == 1){
                                $sql = ($sql . ", ");
                            }
                            $options = [
                                'cost' => 11,
                                'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
                            ];
                            $hash = password_hash($_SESSION["pass"], PASSWORD_BCRYPT, $options);
                            $sql = $sql . " pass = '" . $hash ."'";
                            $AND = 1;
                        }
                        if ($_SESSION["animal"] == !null){
                            if ($AND == 1){
                                $sql = ($sql . ", ");
                            }
                            $sql = ($sql . " animal = '" . $_SESSION["animal"] ."'");
                            $AND = 1;
                        }
                        if($_SESSION["color"]!=null)
                        {
                            if ($AND == 1){
                                $sql = ($sql . ", ");
                            }
                            $sql = ($sql . " color = '" . $_SESSION["color"] ."'");
                        }
                        
                        $sql = $sql . " WHERE id = '" . $_SESSION['passID'] . "'";
                        
                        //executes sql statement for editing user
                         echo "<div id='success'>EDIT SUCCESS</div><br>";
                        
                         $stmt = $dbConn -> prepare($sql);
                         $stmt -> execute();
                         
                         //unset session variables for editing user
                            unset($_SESSION["name"]);
                            unset($_SESSION["pass"]);
                            unset($_SESSION["animal"]);
                            unset($_SESSION["color"]);
                    }
                    
                    
                    $sql = " SELECT * FROM userList";
                    $stmt = $dbConn -> prepare($sql);
                    $stmt -> execute ();
                    while ($row = $stmt -> fetch())  {
                        echo  "<a href='./lab6.php?lookup=" . $row['name'] . "' >" . $row['name'] .  "</a><br />";
                    }
                    
                    echo "<br>--------------------<br><a href='./lab6.php?addUser=1'>Add New User</a><br>--------------------";
                }
                echo "<br><a href='./lab6.php?log=1' class='button'>Log Out</a>";
            } else {
                if ($_SESSION["userName"] != null){
                    echo "<div id='edit'>INVALID USERNAME/PASSWORD FOR ADMIN LOGIN</div>";
                }
                echo "<form method='post'>
                    Username: <input type='text' name='nameInput'><br>
                    Password: <input type='text' name='passInput' autocomplete='off'><br>
                <input type='submit' value='Log-In'>
                </form>";
            }

        ?>
    </body>
</html>