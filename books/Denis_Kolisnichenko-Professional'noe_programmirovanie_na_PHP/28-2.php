<?
if (isset($upload)) 
{
// Мы получили файл 
$Filename="/var/www/html/galery/".$Filename;

// Файл существует: "приписываем" к его имени случайное число 
if (file_exists($Filename)) 
{
mt_srand(time());
$r = mt_rand(0,1000);                // случайное число 
$Filename = "/var/www/html/galery/$r".basename($Filename);
}

// Копируем файл
copy($File,$Filename);
echo "<PRE>Файл $File скопирован в $Filename</PRE>"; 
} else
{
// Кнопка upload не нажата, выводим форму 
echo "<html><head><title>Galery</title></head><body>";
echo    "<form action=upload.php method=POST enctype=multipart/ 
form-data>" ;
echo "<input type=file name=File>";
echo "Имя файла на сервере <input type=text name=Filename>"; 
echo "<input type=submit name=upload value=Загрузить>"; 
echo "</form></body></html>";
}

?>