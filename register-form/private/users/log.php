<?php
require_once('../../private/initial.php');
?>

<?php


$src=fopen(PUBLIC_PATH.'logs/'.$_POST['username'],'a+t');
echo filesize(PUBLIC_PATH.'logs/'.$_POST['username']);
while(!feof($src)) {
    echo fgets($src) . "<br>";
}
$string =  fread($src,filesize(PUBLIC_PATH.'logs/'.$_POST['username']));
$names = explode("\n",$string);
print_r($names);



fclose($src);
?>