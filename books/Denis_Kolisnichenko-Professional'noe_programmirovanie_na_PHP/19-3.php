<?
error_reporting(E_ALL); 
// подключаем   класс htmlMimeMail 
include('htmlMimeMail.php');

// создаем новый объект класса htmlMimeMail 
$mail = new htmlMimeMail();

// Читаем вложение
$attachment = $mail->getFile('docs.zip');

// Читаем текст сообщения
$text = $mail->getFile('msg.txt');

// Используем метод SetText для создания 
// текстового сообщения 
$mail->setText($text);

// Добавляем вложение
$mail->addAttachment($attachment, 'docs.zip', 'application/zip');

//    Отправляем   сообщение
$mail->setFrom('Иван <ivan@localhost>');
$result = $mail->send(array('"Сидоров" <sidorov@localhost>'));

echo $result ? 'Отправлено' : 'Ошибка';
?>