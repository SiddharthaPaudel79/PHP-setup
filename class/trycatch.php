<?php
try {
    $age = -5;
    if ($age < 0) {
       throw new Exception("Age cannot be negative.");
    }
    echo "Your age is $age\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} finally {
    echo "(This line always executes)\n\n";
}
?>
<?php
try {
    $handle = fopen("testfile.txt", "r");
    if (!$handle) {
        throw new Exception("Unable to open the file.");
    }
    $line = fgets($handle);
    if ($line === false) {
        throw new Exception("Unable to read from file.");
    }
    echo $line . "\n";
} catch (Exception $e) {
    echo "Error reading file: " . $e->getMessage() . "\n";
} finally {
        fclose($handle);
}
?>
