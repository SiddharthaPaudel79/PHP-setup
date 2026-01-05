<?php

file_put_contents("output.txt", "Hello world");
$content = file_get_contents("Output.txt");
if($content === false){
    echo"error reading files";
}else{
    echo $content;
}
?>