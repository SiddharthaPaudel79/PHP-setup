<?php session_start(); ?>

<h2>Products</h2>

<form method="post" action="cart.php">
    <input type="hidden" name="product" value="Laptop">
    <button type="submit" name="add">Add Laptop</button>
</form>

<form method="post" action="cart.php">
    <input type="hidden" name="product" value="Mobile">
    <button type="submit" name="add">Add Mobile</button>
</form>

<a href="cart.php">View Cart</a>
