<?

if (!isset($Questions))
{

// Cookies не установлены - первый запуск
for($i=0;$i<10;$i++) $Arr[]=$i;

// Преобразуем массив в строку
$Serialized_arr = serialize($Arr);

// Устанавливаем Cookies
setcookie("Questions",$Serialized_arr,time()+3600);

unset($Arr); 	// массив $Arr больше не существует
}
else
{
// Cookies установлены - "разворачиваем" массив 

$Arr = unserialize($Questions); 

foreach($Arr as $v) echo "$v ";

}
?>