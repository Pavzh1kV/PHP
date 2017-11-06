<?
// Подключаем   вспомогательные   файлы 
include "header.php"; 
include "options.php";

// Функция   выводит   товар   указанной   категории
// Категория   по   умолчанию - CD
function ShowTovar($ct="CD")
{
global $SERVER, $USER, $PASSWD, $DB;

if (!mysql_connect($SERVER,$USER,$PASSWD))
{
echo $head;
echo "<h1>Ошибка сервера MySQL. MySQL server error</h1>";
echo "</body></html>";
exit;
}
mysql_select_db($DB);

if($ct==="BK") echo "<h1>Книги</h1>"; 
else echo "<h1>Компакт-диски</h1>";

echo "<table WIDTH=100% border=2 cellspacing=O cellpadding=3
bordercolor=#336699>";

echo "<tr><td bgcolor=#336699><font color=white>Наименование</td>
<td bgcolor=#336699><font color=white>Цена</td>
<td bgcolor=#336699><font color=white>Заказ</td>
</tr>";

$r=mysql_query("select * from tovar where cat=\"$ct\"");

echo "<form method=post action=index.php>";

echo mysql_error();

for ($i=0; $i<mysql_num_rows($r); $i++)
{
echo "<tr>";
$f=mysql_fetch_array($r);
echo "<td>$f[opis]</td><td>$f[price]</td>
<td><input type=checkbox name=Arr[] value=".$f['id']."
</tr>";
}
echo "</table>";
echo "<p><input type=submit name=buy value=Заказать><input
type=Reset value=C6poc></form>
<p>&copy Денис Колисниченко (dhsilabs at mail.ru), 2003</
body></html>";
}


// Проверяем, зарегистрирован ли пользователь 
if (!isset($myshop_email))  {

echo $head;
echo "<p>Вы не зарегистрированы. Пожалуйста, оставьте
информацию о себе. <PRE>";

echo "<form action=index.php method=post>
<table border=0 width=50%>
<tr>
<td>Ваше имя <td><input type=text name=myshop_name> 
<td>Фамилия <td><input type=text name=myshop_family>
<tr>
<td>Отчество <td><input type=text name=myshop_otch>
<td>E-mail <td><input type=text name=myshop_email>
<tr>
<td>Страна <td><input type=text name=myshop_country> 
<td>Город <td><input type=text name=myshop_city>
<tr>
<td>Адрес  <td><input type=text name=myshop_address> 
<td>Индекс <td><input type=text name=myshop_zip>
</table>
<p><input type=submit name=register value=OK>
";

}
else 
{

// Регистрируем пользователя 
if (isset($register))
{
SetCookie("myshop_name",$myshop_name); 
SetCookie("myshop_family",$myshop_family); 
SetCookie("myshop_otch",$myshop_otch); 
SetCookie("myshop_email",$myshop_email); 
SetCookie("myshop_country",$myshop_country); 
SetCookie("myshop_city",$myshop_city);
SetCookie("myshop_address",$myshop_address); 
SetCookie("myshop_zip",$myshop_zip);
}
echo $head;


// Пользователь уже выбрал товар и нажал кнопку Заказ
if(isset($buy))
{
$message = "Здравствуйте, $myshop_name!\n".date("d.m.Y") ." вы
посетили наш Internet-магазин\n";

$message = $message."Ваш заказ:\n";

$q = "select * from tovar where"; 
foreach($Arr as $k=>$v) $q=$q." (id=$v) or "; 
$q = substr($q,0,strlen($q)-4);

// echo "$q";

if(!mysql_connect($SERVER,$USER,$PASSWD))
{
echo $head;
echo "<h1>0шибка сервера MySQL. MySQL server error</h1>";
echo "</body></html>";
exit;
}

mysql_select_db($DB);

$r=mysql_query($q);

// echo mysql_error();

echo "<h1>Baш заказ:</h1>";
echo "<table WIDTH=100% border=2 cellspacing=O cellpadding=3
bordercolor=#336699>";

echo "<tr><td bgcolor=#336699><font color=white>Наименование</td>
<td bgcolor=#336699><font color=white>Цена</td></tr>";

$sum = 0;
for ($i=0; $i<mysql_num_rows($r); $i++)
{
echo "<tr>";
$f=mysql_fetch_array($r);
echo "<td>$f[opis]</td><td>$f[price]</td>" ;
$message=$message."$f[opis] \t\t $f[price]\n" ;
$sum+=$f['price'];
echo "</tr>";
}
echo "</table>";
echo "<p>Общая сумма заказа: $sum";

$message=$message."\nОбщая сумма: $sum\n
Для подтверждения заказа просто нажмите Reply\n\n
Спасибо за посещение нашего магазина!
---------------------------------------
Регистрационная карточка:\n 
Фамилия $myshop_family\n 
Имя $myshop_name\n 
Отчество $myshop_otch\n 
Email $myshop_email\n 
Страна $myshop_country\n 
Город $myshop_city\n 
Адрес $myshop_address\n 
Индекс $myshop_zip\n
";

mail($myshop_email,"MySHOP: ваш заказ",$message,"From: $REPLY"); 
echo "<p><b>Вам отправлено уведомление о заказе\n";

exit;

}

// Выводим категории или товар определенной категории
If(!isset($myshop_cat))
{
echo "<h2>Вы хотите купить:</h2>
<ul>
<li><a href=index.php?myshop_cat=CD>Компакт-диск</li></a> 
<li><a href=index.php?myshop_cat=BK>Kнигy</li></a>
</ul>";
}
else
{
ShowTovar($myshop_cat);
}

}
?>