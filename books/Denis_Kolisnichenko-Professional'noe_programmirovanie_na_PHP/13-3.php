<?
// Создаем рисунок 200x200
$im = ImageCreate(200,200);
// первый размещенный цвет - это цвет фона
// RGB (0,0,0) - это черный цвет
$black = imagecolorallocate($im,0,0,0);
// Создаем массив $с[] и заполняем его цветами
$с[] = imagecolorallocate($im,255,0,0);  		  // красный
$с[] = imagecolorallocate($im,0,255,0);     	  // зеленый
$с[] = imagecolorallocate($im,0,0,255);    	  // синий
$с[] = imagecolorallocate($im,255,0,255);
$с[] = imagecolorallocate($im,100,0,100);
$c1 = 1; // индекс массива $с[]

// Рисуем концентрические квадраты
for ($i = 1; $i < 7; $i++)
{
$c1 = $i;
if ($c1>5) $c1 = 1;  

ImageRectangle($im,10*$i,10*$i,200-10*$i,200-10*$i,$c[$c1-l]);
}

// Сообщаем браузеру формат картинки
Header("Content-type: image/png");
// Выводим изображение в формате PNG
ImagePng($im);
// Освобождаем память
ImageDestroy($im);

?>