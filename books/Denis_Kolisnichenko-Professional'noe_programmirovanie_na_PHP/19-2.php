<?
// ���������� ��� ������ - ������ ��� ������� 
error_reporting(E_ALL);

// ���������� ����� htmlMimeMail. ����   htmlMimeMail.php 
// ������ ���������� � ����� �������� � ����� ��������� include('htmlMimeMail.php');

// ������� ����� ������ ������ htmlMimeMail
$mail = new htmlMimeMail();
// ������ ��������. ��� �������� ����� ��� ������ HTML-�����. 
// � ������ ������ ��� �������� �����.
$background = $mail->getFile('bg.gif');

// ������ �������� - ���� docs.zip
$attachment = $mail->getFile('docs.zip');

// ������ ����� ���������: ������� � ��������� ������� -
// ��� �������� ���������, �������
// �� ������������ HTML, � ����� - � ������� HTML.
// ����������, ����� ��� ����� ���� message.html
$text = $mail->getFile('message.txt');
$html = $mail->getFile('message.html');

// �������, ��� ���� ������ ����� � HTML � ��������� 
// ������ ����� ���������
$mail->setHtml($html, $text); 
// ��������� �������� � HTML
$mail->addHtmlImage($background, 'background.gif1, 'image/gif');

// ��������� ��������. MIME-���: application/zip
$mail->addAttachment($attachment, 'docs.zip1, 'application/zip');

// ����� ����������
$mail->setReturnPath('ivan@ivanov.com');

// � ��� - ��������� ���������
$mail->setFrom('"����" <ivan@ivanov.com');
$mail->setSubject('������');
$mail->setHeader('X-Mailer', 'HTML Mime mail class (http://phpguru.org)');

// ���������� ������ �� ������: sidorov@ukr.net 
$result = $mail->send(array('sidorov@ukr.net'), 'smtp');

 //���� ���� ������, ������� ��, � ���� ��� - ���������� "����������" 
if (!$result)
{
print_r($mail->errors); 
} else {
echo '����������'; 
}
?>