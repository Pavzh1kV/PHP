<?
$t = file('http://www.linuxcenter.ru/trans/export_types.phtml?sid=stjcvd25');
foreach($t as $s)
{

// преобразуем полученный массив в обычные переменные 
// $num - номер категории
// $link - ссылка
// $name - название категории
list($num, $link, $name) = explode("\t",$s); 

echo "<br><a href=$link>$name</a>";

}

?>