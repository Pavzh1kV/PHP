<?
$SERVER = "localhost"; 
$USER = "user"; 
$PASSWD = "12345"; 
$DB = "my_db";

//    Подключаемся
if(!mysql_connect($SERVER,$USER,$PASSWD))
{
echo $HEAD;
echo $CP;
echo $BODY;
echo "<h2>$ERROR</h2>";
echo "</body></html>";
exit;
}

// Выбираем базу данных 
mysql_select_db($DB);

// Выводим заголовок таблицы
echo "<table border=l width=100% bgcolor=gold>"; 
echo "<tr><td>E-mail</td><td>Имя</td><td>Месяц</td>"; 
echo "<td>Число</td><td>Пол</td></tr>";

// Запрос  select * from hbd 
$r=mysql_query("select * from hbd");

// Выводим таблицу
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