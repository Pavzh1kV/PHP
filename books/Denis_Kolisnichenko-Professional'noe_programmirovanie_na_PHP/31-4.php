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
// ����������� ������������� ���� From � Reply-to
$this->From = $from;
$this->Reply = $reply;
}

function LoadFromFile($filename)
{
// ��������� ��������� �� �����
$this->Message = join('', file($filename));
}

function MailSend()
{

// �������� ������������� ���������, ���� ����� 
if ($this->enc_from !== $this->enc_to) 
{

// �������������� ���������� $fc � $tc � ����������� ���
// ��������� ���������� ����. �� ������ ������
// ����� $this->enc_from
// � $this->enc_to � ������ ������� convert_cyr_string 

$fc = $this->enc_from; 
$tc = $this->enc_to;

$this->Message = convert_cyr_string($this->Message, $fc, $tc);
$this->From = convert_cyr_string($this->From, $fc, $tc);
$this->Subject = convert_cyr_string($this->Subject, $fc, $tc);
}

// ���������� ���������
return mail($this->To,$this->Subject,$this->Message,"From: 
$this->From\nReply-to: $this->Reply\n");
}        // end of MailSend() 

}        // end of class

$ml = new EMail("Denis ","den@localhost.localdomain");

// ����
$ml->To = "root"; 		  // ������������ ��������� �������
// ����
$ml->Subject = "Hello";
// ��������� ���������
$ml->LoadFromFile("/home/den/message.txt");

// ���������� ��������� 
echo $ml->MailSend();

?>