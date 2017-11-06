<?
require "header.php"; 
require "options.php";

echo $head;
echo "<h1>Программа установки</h1>";

if(!mysql_connect($SERVER,$USER,$PASSWD))
{
  echo "<h1>Ошибка сервера MySQL. MySQL server error</h1>";
  echo "</body></html>";
  exit;
}

echo "<p>Пытаемся создать базу данных..."; 

echo $DB;

mysql_createdb($DB);

echo mysql_error(mysql_errno());

if (mysql_errno()==0)

{
echo "<р>База данных создана успешно! Создаем таблицы...";

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
echo "<р>Таблица создана. Добавляем данные";
mysql_query('INSERT INTO tovar values(1,"BK","Колисниченко Д.Н.
Linux-сервер своими руками, 2005",220)');
mysql_query('INSERT INTO tovar values(2,"BK","Колисниченко Д.Н.
Самоучитель Linux, 2005",175)');
mysql_query('INSERT INTO tovar values(3,"CD","Linux Mandiva
2005 6CD",235)');
mysql_query('INSERT INTO tovar values(4,"CD","Linux FC4
5CD",200)');

echo "<р>Инсталляция завершена!";
}
else { echo "<р>Ошибка при создании таблицы"; }

}
else
{
echo "Ошибка при создании БД: ".mysql_error();
}
?>