<?
$f = fopen("/home/den/lines.txt", "rt") or die("������!\n"); 

while (!feof($f)) 
{
$s = fgets($f,255); 
echo $s;
}

?>