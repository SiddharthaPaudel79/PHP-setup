<?php
function addTAX($price, $taxRate = 0.1) {
    return $price + ($price * $taxRate);
}

echo "1st: " . addTAX(100) . "<br>";     
echo "2nd: " . addTAX(200, 0.2) . "<br>";
echo "3rd: " . addTAX(50, 0.05);          
?>
