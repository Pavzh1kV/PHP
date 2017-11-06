<?
// отображаем все ошибки - только для отладки 
error_reporting(E_ALL);

// подключаем класс htmlMimeMail. Файл   htmlMimeMail.php 
// должен находиться в одном каталоге с нашим сценарием include('htmlMimeMail.php');

// создаем новый объект класса htmlMimeMail
$mail = new htmlMimeMail();
// Читаем картинку. Эта картинка нужна для нашего HTML-файла. 
// В данном случае она является фоном.
$background = $mail->getFile('bg.gif');

// Читаем вложение - файл docs.zip
$attachment = $mail->getFile('docs.zip');

// Читаем текст сообщения: сначала в текстовом формате -
// для почтовых программы, которые
// не поддерживают HTML, а затем - в формате HTML.
// Желательно, чтобы имя файла было message.html
$text = $mail->getFile('message.txt');
$html = $mail->getFile('message.html');

// Говорим, что наше письмо будет в HTML и указываем 
// просто текст сообщения
$mail->setHtml($html, $text); 
// Связываем картинку с HTML
$mail->addHtmlImage($background, 'background.gif1, 'image/gif');

// Добавляем вложение. MIME-тип: application/zip
$mail->addAttachment($attachment, 'docs.zip1, 'application/zip');

// Адрес отравителя
$mail->setReturnPath('ivan@ivanov.com');

// А это - некоторые заголовки
$mail->setFrom('"Иван" <ivan@ivanov.com');
$mail->setSubject('Привет');
$mail->setHeader('X-Mailer', 'HTML Mime mail class (http://phpguru.org)');

// Отправляем письмо по адресу: sidorov@ukr.net 
$result = $mail->send(array('sidorov@ukr.net'), 'smtp');

 //Если есть ошибки, выводим их, а если нет - отображаем "Отправлено" 
if (!$result)
{
print_r($mail->errors); 
} else {
echo 'Отправлено'; 
}
?>