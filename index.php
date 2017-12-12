<!DOCTYPE HTML>
<html>
    <a href="./Homework/hw2/index.php">Homework 2</a>
    <a href="./Homework/hw3/hw3index.php">Homework 3</a>
    <a href="./Homework/hw4/hw2JsRevised.php">Homework 4 JS</a>
    <a href="./Homework/hw4/hw2JqRevised.php">Homework 4 Jquery</a>
    <a href="./Homework/hw5/hw5.php">Homework 5</a>
    <br>
    <a href="./lab/777/index.php">Lab 2</a>
    <a href="./lab/lab3/silverjack.php">Lab 3</a>
    <a href="./lab/lab4/ledboard.php">Lab 4</a>
    <a href="./lab/lab5/techCheckout.php">Lab 5</a>
    <a href="./lab/lab6/lab6.php">Lab 6</a>
    <a href="./lab/lab7/lab7.php">Lab 7</a>
    <a href="https://ide.c9.io/carlosgarcia/project_1">Lab 8(Carlos&My Shared Space)</a>
    <br>
    <a href="./Projects/proj1.php">PROJECT 1</a>
    <br>
    <a href="./FinalProj/finproj.php">PROJECT FINAL</a>
    <br>
    <a onmouseover="jsfunction()" href="#" id="test1">LAURA GRADE THIS ASSIGNMENT ASAP PLEASE!!!</a>
    <script type="text/javascript">
    var x = 0;
        function jsfunction() {
            document.getElementById("test1").innerHTML ="<br>" + document.getElementById("test1").innerHTML;
            x++;
            if (x > 30) {
                document.getElementById("test1").innerHTML = "LAURA GRADE THIS ASSIGNMENT ASAP PLEASE!!!";
                x = 0;
            }
            if (x == 15) {
                document.body.style.backgroundImage = "url('fun.png')";
            }
        }
    </script>
</html>