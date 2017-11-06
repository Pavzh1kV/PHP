<?

// Создаем объект класс Line
$myLine = new Java("Line");
echo "<br>Line created at (0,0,0,0) ... ";
// Устанавливаем координаты
echo $myLine->setCoordinates(5,5,7,77);
// Выводим Hello World
echo $myLine->sayHello();
?>