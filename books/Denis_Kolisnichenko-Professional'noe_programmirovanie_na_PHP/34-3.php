<?
// Открываем сессию smarttest 
session_name("smarttest"); 
session_start(); 
session_register("Login"); 
session_register("FullName"); 
session_register("UserName");

$Dir="/smarttest/logs";
$text="";     // объявим переменную и будем использовать ее как
        // глобальную

// Функция получает текст вопроса, выводит его и создает
// средства (checkbox'ы) для
// выбора правильных вариантов ответа

function GetQuestText() 
{
global $Counter, $text;
$tmp=$Counter+1;

//echo "<title>SmartTest</title></head><body bgcolor=white>";
//echo "<h1>Система дистанционного контроля знаний<br>SmartTest</h1>" ;

echo "<br><b>Bonpoc $tmp</b><br>";
echo "$text";
echo "<br>";
echo "<form action=$SCRIPT_NAME><br>";

// Имена checkbox’ов - aN, где N от 1 до 6
echo "<input type=checkbox name=a1 value=1>1 <input
type=checkbox name=a2 value=2>2 ";
echo "<input type=checkbox name=a3 value=3>3 <input
type=checkbox name=a4 value=4>4 ";
echo "<input type=checkbox name=a5 value=5>5 <input type=checkbox name=a6 value=6>6 "; 
echo "<br><input type=submit value=\"Ответить!\">"; 
//echo "</form></body></html>";
}

// Функция подключения к серверу
function connect()
{
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("st");
}

// Функция выводит список вопросов в виде таблицы
function GetTestList()
{
global $SCRIPT_NAME;
echo "<center><i>Список доступных тестов :</i></center><br>";
echo "<table BORDER COLS=3 WIDTH=\"100%\" BGCOLOR=#CEFFCE>";
echo "<tr ALIGN=CENTER BGCOLOR=#3333FF>";
echo "<td><b><i><font color=#FFFFFF>Номер</font></i></b></td>"
echo "<td><b><i><font color=#FFFFFF>Название</font></i></b></td>";
echo "<td><b><i><font color=#FFFFFF>Автор</font></i></b></td>"

$res=mysql_query("SELECT no,desk,autor FROM reg");
while ($Row=mysql_fetch_row($res))
{
echo "<tr>";
for($i=0; $i<mysql_num_fields($res); $i++)
  echo "<td><a href=$SCRIPT_NAME?tno=$Row[0]>$Row[$i]</a></td>";
echo "</tr>";
}
echo "</table>";
}

// Функция проверяет имя пользователя и его пароль. Если
// они правильны, она
// присваивает глобальной переменной Login значение 1

function Register()
{
global $user, $pswd, $Accept, $Login;
global $UserName, $FullName;

$Login=0;
$res=mysql_query("SELECT * from ureg");

while ($Row=mysql_fetch_row($res))
{
if($Row[0]==$user) 
{ 
if($Row[1]===md5($pswd))
{ $FullName=$Row[2]; 
$UserName=$user; 
$Login=1; 
break; }
}
}
/* Основная программа */

if ($Login==0)  {

// Неправильные имя пользователя и/или пароль
echo "<html><head>
echo "<h1>Система дистанционного контроля знаний<br>SmartTest</h1>";
echo "<center><img src=stop.jpg alt = ST0P><h2>Access denied.</h2>";
echo "<р>Проверьте имя пользователя и пароль!";
echo "</body></html>";

unset($Accept);
session_unset();
global $Dir;
global $REMOTE_ADDR;

// Нужно обеспечить запись в этот каталог
@mkdir($Dir,755);
$f=fopen("$Dir"."/access.log","a+") or Die("Cannot to create access.log");
flock($f,2);
$dt=date("d.m.y H.i.s");
if(PHP_OS=="Linux") $NL="\n"; else $NL="\n\r";
fputs($f,"$dt Access denied for user $user [$pswd]. IP: $REMOTE_ADDR $NL");
flock($f,3);
fclose($f);
exit;
}
Else
{
// Все Ок, выводим список тестов

echo "<title>SmartTest</title></head><body bgcolor=white>";
echo "<h1>Система дистанционного контроля знаний<br>SmartTest</
hl>";
echo "<В><I>Здравствуйте, $Row[2]!</B></I><BR>";

GetTestList();
}
return;
}

connect();
echo "login=$Login $UserName";
if(!isSet($Login)) { Register)); }
else
{

// Регистрируем в сессии служебные переменные
session_register("TestNo");
session_register("Arr");
session_register("Counter");
session_register("Table");
session_register("True");
session_register("Max");
session_register("Prev");
session_register("Diff");
session_register("Total");
session_register("TT");

// При первом запуске устанавливаем номер теста и 
// инициализируем базу

if(!isSet($TestNo)) 
{
$Res=mysql_query("SELECT no,qmax,tbl FROM reg WHERE no=$tno");
$Row=mysql_fetch_row($Res);
$Max=$Row[1];
$Table=$Row[2];
$Diff=$Row[3];
$QDiff=0; $Total=0;
$ATable=$Table."_a"; // таблица ответов
echo $ATable;
$R=@mysql_query("SELECT * FROM $ATable") or die("Invalid SQL query [$ATable]");
while($Rw=mysql_fetch_row($R)) 
{ if($Rw[0]===$UserName)
{
echo "Вы уже проходили выбранный тест<br>"; 
echo "Ваша оценка $Rw[1]. Вы правильно ответили на $Rw[2] вопросов(а)";
GetTestList(); 
exit;
} // if($Rw) 
} //While($Rw);

$TestNo=tno; 
$Counter=0;

// проверяет все ли разные элементы в массиве
function checkarr($Arr)
{
// разные $Res=1;
for ($i=0; $i<10; $i++) 
for ($j=$i+1; $j<10; $j++)
if($Arr[$i]===$Arr[$j])  { $Res = 0; break(1); } 
return $Res;
}

mt_srand(time()+(double)microtime()*1000000); 
for ($i=0; $i<9;$i++) $Quest[]=mt_rand(0,100); 
while(checkarr($Quest)==O)
{
for ($i=0;$i<9;$i++) $Quest[$i]=mt_rand(0,100);
} // while

// массив сгенерирован, пишем его ... 
$Arr=serialize($Quest);
// сейчас нужно выдать первый вопрос... 
$Res=mysql_query("SELECT * FROM $Table WHERE no=$Quest[$Counter]");
$Row=mysql_fetch_row($Res); 
$Prev=$Row[2]; 
$text=$Row[1]; 
$Diff=$Row[3];

GetQuestText(); 
} // if (!isSet) 
else // уже не первый запуск, $TestNo установлена
// пришел ответ на предыдущий вопрос 
{
if(!isSet($al)) $al=""; if(!isSet($a2)) $a2=""; 
if !isset($аЗ)) $аЗ="";
if(!isSet($a4)) $a4=""; 
if(!isSet($a5)) $a5=""; 
if(!isSet($a6)) $a6="";
$Answer=$al.$a2.$a3.$a4.$a5.$a6; 
if ($Answer===$Prev) 
{
$True=@$True+1; 
$Trusted='Y';
If ($Diff=='Y') $Total=$Total+3; 
else $Total=$Total+1; 
} else $Trusted='N';

If ($Diff=='Y') $TT=$TT+3; 
else $TT=$TT+1;

if($Counter===9)  { 
// пора бы и закончить тест 
$АTable=$Table."_а"; 
$Ехр=($Total*100)/$TT; 
if ($Exp>=90) $Mark=5; 
else if($Exp>=75) $Mark=4; 
else if($Exp>=50) $Mark=3; 
else if($Exp<50) $Mark=2;

mysql_query("INSERT INTO $ATable VALUES('$UserName','$Mark','$True')");
$msg="<br>$FullName, вы ответили правильно на $True вопросов(а)
$msg=$msg+"<br>Вы набрали $Total баллов из возможных $ТТ ($Ехр)%";
$msg=$msg+"<br>Ваша оценка: $Mark";
echo $msg;
// удаляем сессию.
session_unset();
exit;
}
$Quest=unserialize($Arr);
$Res=mysql_query("SELECT * FROM $Table WHERE no=$Quest[$Counter]");
$Row=mysql_fetch_row($Res);
$Prev=$Row[2];
$text=$Row[1];
$Diff=$Row[3]; 
$Counter=$Counter+1; 
GetQuestText();
}
} // от самого первого else 
?>
