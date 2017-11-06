<?
mysql_connect("localhost"); 
mysql_select_db("test");

if (!isSet($id)) $id=1; 
$table="id$id";

$R=mysql_query("select unq from ids where id=$id"); 
$Rw=mysql_fetch_row($R); 
$unq=$Rw[0];

$R=mysql_query("select * from $table");
echo "<html><body><h1>Здравствуйте, уважаемый пользователь!</h1>"; 
echo "Уникальных посетителей: $unq<br>";

// выводим таблицу со статистикой
echo "<table border>";
echo "<tr><td>Xocт</td><td>Последнее пoceщeниe</td><td>Бpayзep
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