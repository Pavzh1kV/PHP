<?
error_reporting(E_ALL); 
// ����������   ����� htmlMimeMail 
include('htmlMimeMail.php');

// ������� ����� ������ ������ htmlMimeMail 
$mail = new htmlMimeMail();

// ������ ��������
$attachment = $mail->getFile('docs.zip');

// ������ ����� ���������
$text = $mail->getFile('msg.txt');

// ���������� ����� SetText ��� �������� 
// ���������� ��������� 
$mail->setText($text);

// ��������� ��������
$mail->addAttachment($attachment, 'docs.zip', 'application/zip');

//    ����������   ���������
$mail->setFrom('���� <ivan@localhost>');
$result = $mail->send(array('"�������" <sidorov@localhost>'));

echo $result ? '����������' : '������';
?>