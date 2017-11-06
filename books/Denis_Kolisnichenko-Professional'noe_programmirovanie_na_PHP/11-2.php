<?
$f = fopen("/home/den/lines.txt", "r+") or die("Ошибка!\n");
fseek($f, 4, SEEK_SET) ; 
fwrite($f, "BYTE"); 
fflush($f);
?>