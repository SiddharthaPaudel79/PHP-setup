<html>
<form method="get">
    <label><input type="checkbox" name="toppings[]" value="olives"> Olives</label>
    <label><input type="checkbox" name="toppings[]" value="pepper"> Pepper</label>
    <label><input type="checkbox" name="toppings[]" value="garlic"> Garlic Salt</label>
    <br>
    <select name="flower">
        <option value="poppy">Poppy</option>
          <option value="Daisy">Daisy</option>
            <option value="tulip">tulip</option>
</select>
    <input type="submit" value="Submit">
</form>
</html>

<?php
$toppings = filter_input(INPUT_GET, "toppings",options: FILTER_REQUIRE_ARRAY);

if (empty($toppings)) {
    print "No toppings selected";
} else {
    print"Toppings: ". implode("+",$toppings);
}
$flower=filter_input(INPUT_GET,"flower");
echo"Selected flower:$flower";
?>
