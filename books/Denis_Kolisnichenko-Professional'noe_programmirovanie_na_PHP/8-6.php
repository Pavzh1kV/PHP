<?
function print_str()
{
echo "<table border=l width=100%>";
echo "<tr><td bgcolor=blue><font color=white>Ho�ep</font></td>";
echo "<td bgcolor=blue><font color=white>Ilapa�e�p</font></td>";

for  ($i = 0; $i<func_num_args();  $i++)
{
echo "<tr><td>$i</td><td>".func_get_arg($i)."</td></tr>";
} 
echo "</table>";

}

print_str("������","������","������","���������");

?>