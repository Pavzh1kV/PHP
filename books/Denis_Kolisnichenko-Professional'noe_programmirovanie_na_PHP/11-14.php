<?

$dir = opendir("/var/www/html"); 

chdir("/var/www/html");

echo "<html><head><title>Печать Kaталога</title></head><body>"; 
echo "<h1>Оглавление каталога</h1><р>" ; 
echo "<table width = 100%>";

while ($d=readdir($dir))
{
echo "<tr><td>";

if (is_dir ($d)) echo "$d</td><td>Каталог</td>" ;
if (is_file($d)) echo "$d</td><td>".filesize($d)."</td>";

echo "<tr>";
}

echo "</table></body></html>" ; 

closedir($dir);
?>