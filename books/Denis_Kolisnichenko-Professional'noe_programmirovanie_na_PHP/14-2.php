<?
$CRLF = "\r\n"; 
$r = $loops = 0; 
$m = $line = " ";

//    ���������   �����

$s = fsockopen("localhost", "25", $r, $m);

//   �������   ������   ������ 
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

// ������� �������� �������
function send_data($data)
{
global $s, $CRLF;
fwrite($s, $data.$CRLF, strlen($data)+2);

// ������ �����������
get_data();
// �����������
send_data("HELO localhost");
// ������ �����
get_data();

// ��������������
send_data("MAIL FROM: den@localhost"); 
// ����� �� ��� ���������� �����? 
get_data();

// ��������� ����� ���������� 
send_data("RCPT TO: lena"); 
// ���������� �� �����? 
get_data();

// ������ ����� ���������� ���������
send_data("DATA");
// ������ ����� �������
get_data();

// � ��� ���� ���������, ����� �������� ������� ������� Enter. Enter
send_data("Message",$CRLF.".".$CRLF);

// ���������� �� ��������� � ������� 
get_data();

// ��������� ���������� 
send_data("QUIT"); 
// ������ ����� 
get_data();

// ��������� ����� 
fclose ($s);
?>