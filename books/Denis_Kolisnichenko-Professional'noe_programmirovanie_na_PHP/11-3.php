<?
$f = fopen("/home/den/lines.txt", "r+") or die("Ошибка!\n");

// Перемещаем указатель файла в конец файла 
fseek($f, 0, SEEK_END); 
fwrite($f,"\nLine4"); 
fflush($f);
?>