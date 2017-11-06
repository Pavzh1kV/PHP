<?

// Функция вывода галереи
/* ------------------------------------------------------------- */
function view_gal()
{
// Пустой массив картинок
$Galery = array();
// Каталог галереи
$GalDir = "/var/www/html/galery";

// Ссылка на сценарий upload.php
echo "<html><head><title>Galery</title></head><body>"; 
echo "<center><a href=upload.рhр>Загрузка картинки</а><hr width=100%>";

// Открываем каталог галереи 
$dir = opendir($GalDir);

// Читаем все элементы галереи - файлы каталога $GalDir 
while(($item = readdir($dir))!==false)
{
// Если расширение файла не GIF, JPG, PNG, переходим к следующему файлу
if(!ereg("A(.*)\\.(gif|jpg|png)$",$item,$p)) continue;

$path_to_file="$item";

// Получаем размер картинки (не файла!) и
// время модификации файла
$size = @GetImageSize($path_to_file);
$time = @filemtime($path_to_file);

// Заполняем массив $Galery 
$Galery[$item] = array( 
'name' => $item,           // имя файла 
't' => $time,              // время 
'url' => $path_to_file,    // URL 
'w'   => $size[0],         // ширина 
'h'  => $size[l],          // высота 
'wh' => $size[2] ,         // ширина х высота
);
}

// Сортируем галерею по именам файлов 
ksort($Galery);

echo "<br><table><tr>";
$count = 0;

// Выводим галерею в виде таблицы
foreach($Galery as $k=>$v)
{
// Выводим по три картинки
if ($count % 3 == 0) echo "<tr>";
echo "<td>";
echo "<a href=http://localhost/galery/.@$v[url].><img src=http://localhost/galery/".@$v[url]." width=250 height=250>
<br>$v[url] $v[w] x $v[h]</a>";
$time = @$v[t];
echo date("d.m.Y H:i:s", $time);
echo "</td>";

$count++;
}
echo "</table></body></html>";
}

/* ----------------------------------------------------------- */

// Вызываем функцию просмотра галереи 
view_gal();
?>