<?
$CRLF = "\r\n"; 
$r = $loops = 0; 
$m = $line = " ";

//    Открываем   сокет

$s = fsockopen("localhost", "25", $r, $m);

//   Функция   чтения   ответа 
function get_data()
{
$return = " ";
global $line, $CRLF, $loops, $s;
while((strpos($return, $CRLF) === FALSE OR substr($line,3,1) !== ' ') AND $loops < 100){ 
$line = fgets($s, 512); 
$return = $line; 
echo $line; 
// loops++;
}
}

// Функция отправки команды
function send_data($data)
{
global $s, $CRLF;
fwrite($s, $data.$CRLF, strlen($data)+2);

// Читаем приветствие
get_data();
// Здороваемся
send_data("HELO localhost");
// Читаем ответ
get_data();

// Представляемся
send_data("MAIL FROM: den@localhost"); 
// Можно ли нам отправлять почту? 
get_data();

// Указываем адрес реципиента 
send_data("RCPT TO: lena"); 
// Правильный ли адрес? 
get_data();

// Сейчас будем отправлять сообщение
send_data("DATA");
// Читаем ответ сервера
get_data();

// А это само сообщение, после которого следует нажатие Enter. Enter
send_data("Message",$CRLF.".".$CRLF);

// Поставлено ли сообщение в очередь 
get_data();

// Закрываем соединение 
send_data("QUIT"); 
// Читаем ответ 
get_data();

// закрываем сокет 
fclose ($s);
?>