<?

$f = fopen("/home/den/lines.txt", "r+") or die("������!\n"); 

while (!feof($f))
{
$s = fread($f,4); 
echo $s;
}

?>