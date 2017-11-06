<?
$LoginScript="$HTTP_HOST/smarttest/login.php"; 
$NewsFile="news.html";

// Устанавливаем cookie для индивидуального счетчика посещений
if(!isSet($STCount)) $STCount=0;
$STCount++;
SetCookie("STCount",$STCount,0x7FFFFFFF);

// Устнавливаем общий счетчик посещений
$f=fopen("counter.dat","a+");
flock($f,2);
$count=fread($f,100);
// He засчитываем посещения со своего узла
$REMOTE_HOST=gethostbyaddr($REMOTE_ADDR);
if(!($HTTP_HOST===$REMOTE_HOST)) @$count=$count+ 1;
ftruncate($f,0);
fwrite($f,$count);
flock($f,3);
fclose ($f);

// Читаем файл с новостями 
if (file_exists($NewsFile))
{ $news = join('', file($NewsFile)); } 
else $news="No news today";

// Это заголовок
echo "<html><head><meta http-equiv=Content-Type
content=\"text/html; charset=windows-1251\">";
echo "<title>SmartTest</title><link rel=stylesheet type=\"text/ css\" href=\"st.css\">";
echo "</head><body text=#000000 bgcolor=#FFFFFF 
link=#0000EE vlink=#551A8B link=#FF0000 background=smarttest.jpg>";

// Тело
echo "<h1>Система проверки знаний<br>SmartTest</h1>";
echo "<table WIDTH=100% BGCOLOR=#336699><tr><td>";
echo "<font color=FFFFFF><font size=+1>Сегодня 27.01.02</
font></font></td></tr></table>";
echo "<table WIDTH=100% border=1 cellspacing=0
cellpadding=3 bordercolor=#336699>";
echo "<tr><td width=50%><font color=#336699><font
size=+1>Новости</font></font></td>";
echo "<td width=50%><font color=#336699><font
size=+1>Регистрация</font></font></td></tr><tr><td>";

echo $news;

echo "<td><form action=http://$LoginScript>";
echo "<br> Логин &nbsp<input type=text name=user><br>Пароль
<input type=password name=pswd>";
echo "<br><br><input type=submit value=Login><p>Вы должны
быть зарегистрированным <br>пользователем! По вопросам регистрации обращайтесь к <а href=mailto:st-admin@host.com>администратору системы
SmartTest</a>";
echo "</td></tr></table>";
echo "<p>Вы посещали систему SmartTest $STCount раз(а). Всего
посещений: $count.";
echo "<p>&copy 2001-2007 <a href=http://dkws.org.ua>Денис
Колисниченко</а>";
</body></html>";
?>