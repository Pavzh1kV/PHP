<?
$f = fopen("/home/den/lines.txt", "r") or die("������!\n"); 
$s = fread($f, 4); 
echo $s;
?>