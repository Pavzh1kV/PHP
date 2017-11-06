<?
// Открываем   канал
$р = popen("/bin/ls","r");
$Files   =   array();

// Читаем вывод программы
for (;!eof($p);) $Files[] = gets($p,255); 

// Закрываем   канал

pclose ($p);
?>