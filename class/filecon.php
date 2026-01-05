<?php
file_put_contents("sidd.txt", "Hello world");
$content = file_get_contents("sidd.txt");
if($content === false){
    echo"error reading files";
}else{
    echo $content;
}
?>
