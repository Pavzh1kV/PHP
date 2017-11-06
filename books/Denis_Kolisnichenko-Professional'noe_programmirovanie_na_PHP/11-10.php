<?
$str="stroka"

$f = fopen($f, "a+") or die("Ошибка!\n");

fwrite ($f, $str."\n");

fclose ($f) ;
?>