<?
function view()
{
$Messages=file('./gbook/gb.txt');

echo "<p><table width=100%>"; 

$i = 0;

foreach($Messages as $v)
{
$i++;
if ($i % 2 == 0) echo "<tr><td>$v</td></tr>"; 
else echo "<tr><td bgcolor = gray>$v</td></tr>";
if ($i==$Max) break;
}
}
?>