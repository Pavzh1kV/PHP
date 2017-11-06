<?
echo "<html><head><title>Гостевая книга</title></head><body>"; 
echo "<h1>Гостевая книга/h1>";

$file_gb="./gbook/gb.txt";        //это файл гостевой книги
$file_tmp="./gbook/gb_tmp.txt";   //это временный файл,
                                  //используемый   сценарием
$Мах=50;                          // максимальное к-во выводимых сообщений

// Функция для вывода файла gb.txt
function view()
{	
$Messages=file('./gbook/gb.txt');
echo "<p><table width=100%>"; 

$i=0;

foreach($Messages as $v)
{
$i++;
if ($i % 2 == 0) echo "<tr><td>$v</td></tr>" ;
else echo "<tr><td bgcolor=gray>$v</td></tr>" ;

// Если номер сообщения = 50 (т.е. уже выведено 50 сообщений), прерываем цикл 
if ($i==$Max) break;
}
}

if (!isset($Post)) {

// Выводим форму для ввода нового сообщения
echo "<table width=100% border=l>";
echo "<tr><td><h2>Hoвoe cooбщeниe</h2><form method=post action=$SCRIPT_NAME>";
echo "Email: <input type=text name=email>" ;
echo "Сообщение <input type=text name=mes> <input type=submit
name = Post></td></tr>";
echo "</table></form>";

// Выводим сообщения 
view();

}
else
{
if(file_exists($file_tmp)) die("fatal error!");

// Добавляем новое сообщение в начало файла 
if(copy($file_gb, $file_tmp)) 
{ 
if($w=fopen($file_gb,"w"))
{
flock($w,2);            // блокируем доступ к основному файлу

// $mes - это сообщение пользователя
// перед внесением сообщения в файл удалим из него HTML-теги 
// strip_tags($mes);

fwrite($w,"[".date("d.m.Y H:i:s").$email."]".
strip_tags($mes)."\n");

if(!$r = fopen($file_tmp,"r")) die("can't open file"); 
flock($r,1);             // блокируем доступ к временному файлу

while($mes=fgets($r,10240)) 
{ 
fputs($w,$mes);
}

// Снимаем блокировку и закрываем файлы 
flock($r,3); 
fclose($r); 
flock($w,3); 
fclose($w);

// Удаляем временный файл 
unlink($file_tmp);
}
}
echo "Сообщение успешно записано в файл"; 
//   Выводим   гостевую   книгу 
view();
}
?>