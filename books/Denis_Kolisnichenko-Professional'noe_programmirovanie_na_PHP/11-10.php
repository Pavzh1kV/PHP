<?
$str="stroka"

$f = fopen($f, "a+") or die("������!\n");

fwrite ($f, $str."\n");

fclose ($f) ;
?>