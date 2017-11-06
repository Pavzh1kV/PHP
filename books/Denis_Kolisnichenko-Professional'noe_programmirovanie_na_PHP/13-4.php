<?
$im = ImageCreateFromPng("./11-1.png"); 
$color = imagecolorallocate($im,255,0,0); // красным цветом - цвет шрифта

// Наша строка - IP-адрес клиента + имя сервера 
$str = "$REMOTE_ADDR $SERVER_NAME";

// Выводим строку $str в картинку $im, шрифт - 5, 
// координаты начала строки (70,200) 
// цвет  -  $color (красный)

imagestring($im,5,70,200,$str,$color);

Header("Content-type: image/png"); 
ImagePng($im); 
ImageDestroy($im);
?>
