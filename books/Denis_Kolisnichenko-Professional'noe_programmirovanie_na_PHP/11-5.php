<?
$f = fopen("/home/den/lines.txt", "rt") or die("Ошибка!\n"); 

while (!feof($f)) 
{
$s = fgets($f,255); 
echo $s;
}

?>