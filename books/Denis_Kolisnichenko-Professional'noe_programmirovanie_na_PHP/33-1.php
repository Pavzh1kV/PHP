<?
require "header.php"; 
require "options.php";

echo $head;
echo "<h1>��������� ���������</h1>";

if(!mysql_connect($SERVER,$USER,$PASSWD))
{
  echo "<h1>������ ������� MySQL. MySQL server error</h1>";
  echo "</body></html>";
  exit;
}

echo "<p>�������� ������� ���� ������..."; 

echo $DB;

mysql_createdb($DB);

echo mysql_error(mysql_errno());

if (mysql_errno()==0)

{
echo "<�>���� ������ ������� �������! ������� �������...";

mysql_select_db($DB);

echo mysql_error();

mysql_query('CREATE TABLE tovar (
id int primary key,
cat char(2) not null default \'CD\',
opis char(64) not null default \'\',
price numeric(9,2) not null default 0
)');

echo mysql_error();

if (mysql_errno()===0)
{
echo "<�>������� �������. ��������� ������";
mysql_query('INSERT INTO tovar values(1,"BK","������������ �.�.
Linux-������ ������ ������, 2005",220)');
mysql_query('INSERT INTO tovar values(2,"BK","������������ �.�.
����������� Linux, 2005",175)');
mysql_query('INSERT INTO tovar values(3,"CD","Linux Mandiva
2005 6CD",235)');
mysql_query('INSERT INTO tovar values(4,"CD","Linux FC4
5CD",200)');

echo "<�>����������� ���������!";
}
else { echo "<�>������ ��� �������� �������"; }

}
else
{
echo "������ ��� �������� ��: ".mysql_error();
}
?>