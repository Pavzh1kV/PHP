<?
mysql_connect("localhost"); 
mysql_select_db("test");

if (!isSet($id)) $id=1; 
$table="id$id";

$R=mysql_query("select unq from ids where id=$id"); 
$Rw=mysql_fetch_row($R); 
$unq=$Rw[0];

$R=mysql_query("select * from $table");
echo "<html><body><h1>������������, ��������� ������������!</h1>"; 
echo "���������� �����������: $unq<br>";

// ������� ������� �� �����������
echo "<table border>";
echo "<tr><td>Xoc�</td><td>��������� �oce�e��e</td><td>�pay�ep
</td></tr>";

while($Rw=mysql_fetch_row($R))
 {
echo "<tr>";
for($i=0; $i<mysql_num_fields($R); $i++) 
echo "<td>$Rw[$i]</a></td>"; 
echo "</tr>"; 
}
echo "</table>"; 
echo "</body>";
?>