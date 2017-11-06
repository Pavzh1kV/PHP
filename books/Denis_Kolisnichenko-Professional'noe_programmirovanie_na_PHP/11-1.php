<?
$f = fopen("/home/den/lines.txt", "r") or die("Ошибка!\n"); 
$s = fread($f, 4); 
echo $s;
?>