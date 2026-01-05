<?php
function greetUser(){
    echo"Welcome to PHP programming<br>";
}
greetUser();
function displaySum($a,$b){
$sum = $a + $b;
echo "Sum = $sum<br>";
}
displaySum(5,10);

function areaOfRectangle($length, $width){
    $area = $length *$width;
    return $area;
    }
    $result = areaOfRectangle(8,5);
    echo "Area = $result<br>";
    function welcomeUser ($name = "Guest"){
        echo"Hello $name!!<br>";
    }
    welcomeUser();
    welcomeUser("Ali");
    function testLocal(){
        global $x; //Local
        echo "Inside the function : $x <br>";
    
    }
    testLocal();
    echo "Outside Function : $x<br>"; //indefined

    function testglobal(){
        global $y;
        echo "Value of global y inside the fuunction:$y<br>";
    }
    testglobal();
    echo"Outside Function:$y";
    //Using globals
    $x = 20;
    function displayGlobal(){
        echo $GLOBALS["x"] . "<br>";
    }
    displayGlobal();
    function testStatic(){
        static $count = 0;
        $count++;
        echo "Call number: $count <br>";
    }
    testStatic();
    testStatic();
    testStatic();

?>