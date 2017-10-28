<?php
    session_start();
    if(isset($_GET["monthSelect"])){
        $_SESSION["monthInput"] = $_GET["monthSelect"];
    }
    if(isset($_GET["locNum"])){
        $_SESSION["locNumInput"] = $_GET["locNum"];
    }
    if(isset($_GET["locSelect"])){
        $_SESSION["locationInput"] = $_GET["locSelect"];
    }
    if(isset($_GET["alphabetical"])){
        $_SESSION["alphaInput"] = $_GET["alphabetical"];
    }
    $month1; $month2; $month3; $month4;
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Winter Vacation Planner</title>
    </head>
    <body>
        <div id="title1">Winter Vacation Planner</div>
        
        <form method="get">
        
            Select Month: <select name="monthSelect">
                <option value="">Select</option>
                <option value="November">November</option>
                <option value="December">December</option>
                <option value="January">January</option>
                <option value="February">February</option>
            </select> <br />
            
            Number of locations:<input type="radio" name="locNum" value=3>Three
                <input type="radio" name="locNum" value=4>Four
                <input type="radio" name="locNum" value=5>Five <br />
                
            Select Country: <select name="locSelect">
                <option value="USA">USA</option>
                <option value="Mexico">Mexico</option>
                <option value="Norway">Norway</option>
            </select> <br />
            
            Visit locations in alphabetical order:<input type="radio" name="alphabetical" value="a">A-Z
            <input type="radio" name="alphabetical" value="z">Z-A <br />
            
            <input type="submit" value="Create Itinerary">
            
        </form>
        
        <?php
        $monthIn = null;
        $locNumIn = null;
        $dayCount = null;
        if ($_SESSION["monthInput"] != null && $_SESSION["locNumInput"] != null){
            $monthIn = $_SESSION["monthInput"];
            echo $monthIn . " Itinerary <br />";
            switch($monthIn) {
                case "November" :
                    $dayCount = 30;
                    break;
                case "December" :
                    $dayCount = 31;
                    break;
                case "January" :
                    $dayCount = 31;
                    break;
                case "February" :
                    $dayCount = 28;
                    break;
            }
            $locNumIn = $_SESSION["locNumInput"];
            echo "Visiting " . $locNumIn . " places in " . $monthIn;
            
            $locsArray = array();
            $USA = array("chicago", "hollywood", "las_vegas", "ny", "washington_dc", "yosemite");
            $Mexico = array("acapulco", "cabos", "cancun", "chichenitza", "huatulco", "mexico_city");
            $Norway = array("alesund", "bergen", "hammerfest", "oslo", "stavanger", "trondheim");
            $x = 0;
            
            while ($x < $locNumIn + 1){
                ++$x;
                $y = 0;
                while ($y < count($locsArray)){
                    $randomNum = rand(0, $dayCount - 1);
                    if ($locsArray[$y] == $randomNum){
                        $y = 0;
                        $randomNum = rand(0, $dayCount - 1);
                    }
                    ++$y;
                }
                array_push($locsArray, $randomNum);
            }
            
            $x = 0;
            $y = 0;
            echo "<table border=1>";
            while ($x < $dayCount){
                if (($x % 7) == 0){
                    if ($x != 0){
                        echo "</tr>";
                    }
                    echo "<tr>";
                }
                ++$x;
                if (in_array($x, $locsArray)){
                    echo "<td width='100' height='100' align='center'> " . "<img src='/midterm/pictures/" . ${$_SESSION["locationInput"]}[$y] . ".png' alt='' height=70 width=70></img>" . "</td>";
                    ++$y;
                } else {
                    echo "<td width='100' height='100' align='center'> " . $x . "</td>";
                }
            }
            while ($x % 7 != 0) {
                ++$x;
                echo "<td width='100' height='100'> </td>";
            }
            echo "</tr> </table> <br />";
        }
        ?>
    </body>
</html>