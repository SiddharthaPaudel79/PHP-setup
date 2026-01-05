<?php
$taxRate = 1;
function addTAX($price){
    global $taxRate;
    $pricewithTax = $price + ($price * $taxRate);
    return $pricewithTax;
}
$productPrice = 100;
$totalPrice = addTAX($productPrice);
echo "Price before tax: $productPrice<br>";
echo "Price after tax: $totalPrice";
?>