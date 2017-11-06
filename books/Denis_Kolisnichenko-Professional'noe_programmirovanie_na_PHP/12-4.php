<?
mysql_connect("localhost","user","password");
mysql_select_db("bp");

mysql_query('SET NAMES cp1251;');		// выбираем кодировку

$N = 5; 						// Показываем по 5 записей

// переменная $page задает номер страницы, которую мы должны вывести
if (!isset($page)) $page=0;			

// номера записей, которые мы должны вывести
$records = $page * $N;

// SQL-запрос
$q="select * from prop limit ".$records.", $N";

echo $q;						// выводим запрос для самоконтроля

$r=mysql_query($q);					// выполняем запрос
$n = mysql_num_rows($r);				// к-во записей (можете проверить = 5)

$page++;						// увеличиваем страницу

// выводим ссылку на следующие 5 записей (на след. страницу)
echo "<p><a href=limit.php?page=$page>Далее</a>";

// выводим записи в соответствии с требованием дизайна сайта
for ($i=0; $i<$n; $i++)
{
$f=mysql_fetch_array($r);

echo "<p><table width=100%>
<tr><td bgcolor=5685a2 width=30%><font name=tahoma size=2 color=white>Дата $f[dt]</font>";
echo "<td bgcolor=5685a2><font name=tahoma size=2 color=white>Тип:</font></td>";
echo "<td bgcolor=5685a2><font name=tahoma size=2 color=white># $f[no]</font></td>";
echo "<tr><td colspan=3 bgcolor=797d8c><font name=tahoma size=3 color=white>$f[txt]
<p><a href=mailto:manager@localhost>Написать письмо менеджеру</a>
</td></tr></table>";
}

?>