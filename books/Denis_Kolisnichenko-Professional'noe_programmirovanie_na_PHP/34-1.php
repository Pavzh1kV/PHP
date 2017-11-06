<?
mysql_connect("localhost"); 
mysql_select_db("st");

// —оздаем таблицу дл€ регистрации пользователей 
mysql_query("CREATE TABLE ureg(login char(16)  PRIMARY  KEY, 
passwd char(128) NOT NULL, fullname char(32))");

$pswd=md5("123456");
mysql_query("INSERT INTO ureg values('user3','$pswd','Ivanov Ivan')");
// —оздаем таблицу дл€ регистрации тестов 
mysql_query("CREATE TABLE reg (no int PRIMARY KEY, desk 
char(32),qmax int, tbl char(64), autor char(32))"); 
mysql_query("INSERT INTO reg VALUES('1','Linux Test', '100', 'linux', 'Denis')");

// —оздаем таблицу дл€ тестов
mysql_query("CREATE TABLE linux(no int PRIMARY KEY, quest TEXT,
true char(6), dif char (1))");

mysql_query("CREATE TABLE 1inux_a(login char(16) NOT NULL
PRIMARY KEY, mark int, true int)");

// «аполн€ем таблицу любыми вопросами (всего вопросов 100) 
for($i=0; $i<100; $i++) 
{
$msg="Bonpoc $i<br>—колько вам лет?<br>$i?"; 
echo $msg;
if ($i%2==0) $ch='Y'; else $ch='N'; 
mysql_query("INSERT INTO linux VALUES($i,'$msg','1','$ch')");
}
?>