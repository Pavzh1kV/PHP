<?

$dir = opendir("/var/www/html"); 

chdir("/var/www/html");

echo "<html><head><title>������ Ka������</title></head><body>"; 
echo "<h1>���������� ��������</h1><�>" ; 
echo "<table width = 100%>";

while ($d=readdir($dir))
{
echo "<tr><td>";

if (is_dir ($d)) echo "$d</td><td>�������</td>" ;
if (is_file($d)) echo "$d</td><td>".filesize($d)."</td>";

echo "<tr>";
}

echo "</table></body></html>" ; 

closedir($dir);
?>