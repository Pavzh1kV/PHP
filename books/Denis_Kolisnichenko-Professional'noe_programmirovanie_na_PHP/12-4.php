<?
mysql_connect("localhost","user","password");
mysql_select_db("bp");

mysql_query('SET NAMES cp1251;');		// �������� ���������

$N = 5; 						// ���������� �� 5 �������

// ���������� $page ������ ����� ��������, ������� �� ������ �������
if (!isset($page)) $page=0;			

// ������ �������, ������� �� ������ �������
$records = $page * $N;

// SQL-������
$q="select * from prop limit ".$records.", $N";

echo $q;						// ������� ������ ��� ������������

$r=mysql_query($q);					// ��������� ������
$n = mysql_num_rows($r);				// �-�� ������� (������ ��������� = 5)

$page++;						// ����������� ��������

// ������� ������ �� ��������� 5 ������� (�� ����. ��������)
echo "<p><a href=limit.php?page=$page>�����</a>";

// ������� ������ � ������������ � ����������� ������� �����
for ($i=0; $i<$n; $i++)
{
$f=mysql_fetch_array($r);

echo "<p><table width=100%>
<tr><td bgcolor=5685a2 width=30%><font name=tahoma size=2 color=white>���� $f[dt]</font>";
echo "<td bgcolor=5685a2><font name=tahoma size=2 color=white>���:</font></td>";
echo "<td bgcolor=5685a2><font name=tahoma size=2 color=white># $f[no]</font></td>";
echo "<tr><td colspan=3 bgcolor=797d8c><font name=tahoma size=3 color=white>$f[txt]
<p><a href=mailto:manager@localhost>�������� ������ ���������</a>
</td></tr></table>";
}

?>