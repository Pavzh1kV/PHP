<?
// ������������ � ���� ������
mysql_connect("localhost");
mysql_select_db("counter");
$R=mysql_query("SELECT * FROM ids") or die("Invalid SQL query 1");

$max=mysql_num_rows($result);
// ����� ����� 
$N=$max+l;

// �������   ���   ����������
$table="id$N";
mysql_query("insert into ids values ($N,0)");

// ������� �������
mysql_query("create table $table (ip char(15) primary key, vdate
char(8), browser char (127))");

echo "�����������! ����������� ��������� �������!";
echo "<br>���������� ��������� ��� �� ���� ���������: ";
echo "<br>&lt img src = \"reg.php?id=$N\">";
?>