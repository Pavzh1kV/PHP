<?
// Открываем   сокет
$s = fsockopen("localhost",80);

// Отправляем команду GET - получить index.html (/)
fputs($s, "GET / HTTP/1.0\n\n");

// Читаем ответ
while (!feof($s)) echo fgets($s,1000);

// Закрываем сокет
fclose($s);
?>