<?
class EMail {

var $From = "PHP Simple Mail class";
var $Reply = "den@localhost";
// var $Reply = $GLOBALS['USER']."@".$GLOBALS['HOSTNAME'];
var $To = "";
var $Subj ect = "";
var $Message = "";
var $enc_from = "k";
var $enc_to = "k";

function EMail($from, $reply)
{
// конструктор устанавливает поля From и Reply-to
$this->From = $from;
$this->Reply = $reply;
}

function LoadFromFile($filename)
{
// Загружаем сообщение из файла
$this->Message = join('', file($filename));
}

function MailSend()
{

// Пытаемся преобразовать кодировку, если нужно 
if ($this->enc_from !== $this->enc_to) 
{

// Дополнительные переменные $fc и $tc я использовал для
// улучшения читаемости кода. Вы можете писать
// сразу $this->enc_from
// и $this->enc_to в вызове функции convert_cyr_string 

$fc = $this->enc_from; 
$tc = $this->enc_to;

$this->Message = convert_cyr_string($this->Message, $fc, $tc);
$this->From = convert_cyr_string($this->From, $fc, $tc);
$this->Subject = convert_cyr_string($this->Subject, $fc, $tc);
}

// Отправляем сообщение
return mail($this->To,$this->Subject,$this->Message,"From: 
$this->From\nReply-to: $this->Reply\n");
}        // end of MailSend() 

}        // end of class

$ml = new EMail("Denis ","den@localhost.localdomain");

// Кому
$ml->To = "root"; 		  // пользователь локальной системы
// Тема
$ml->Subject = "Hello";
// Загружаем сообщение
$ml->LoadFromFile("/home/den/message.txt");

// Отправляем сообщение 
echo $ml->MailSend();

?>