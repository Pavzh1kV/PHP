<?
$SERVER = "localhost"; 
$USER = "user"; 
$PASSWD = "12345"; 
$DB = "my_db";

//    ������������
if(!mysql_connect($SERVER,$USER,$PASSWD))
{
echo $HEAD;
echo $CP;
echo $BODY;
echo "<h2>$ERROR</h2>";
echo "</body></html>";
exit;
}

// �������� ���� ������ 
mysql_select_db($DB);

// ������� ��������� �������
echo "<table border=l width=100% bgcolor=gold>"; 
echo "<tr><td>E-mail</td><td>���</td><td>�����</td>"; 
echo "<td>�����</td><td>���</td></tr>";

// ������  select * from hbd 
$r=mysql_query("select * from hbd");

// ������� �������
for ($i = 0; $i<mysql_num_rows($r); $i++)
{
  echo "<tr>";

  $f=mysql_fetch_array($r);
  echo "<td>$f[email]</td><td>$f[name]</td><td>$f[month]</td>";
  echo "<td>$f[day]</td><td>$f[sex]</td>";

  echo "</tr>";
}
echo "</table></body></html>";
?>