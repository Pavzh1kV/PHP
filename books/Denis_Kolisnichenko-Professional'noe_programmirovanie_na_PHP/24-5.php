<? 

/* ���������� ������� Poll ����� ����� HTML-����� */
include "./poll_cookie.php"; 

?>
<b>��� HTML ���</b>
<?
/* ���� � ��������, � ������� ����������� ������� */ 

$poll_path = "c:/web5/www/poll";

// ���������� ���� ������������ � ���� ������ 
require $poll_path."/include/config.inc.php";
require $poll_path."/include/class_poll.php";

$php_poll = new poll();

/* ������� ����������� */
echo "<center>";

$php_poll->set_template_set("simple");
// ������� ����������� 4 (Poll ID = 4)
echo $php_poll->poll_process(4);

?>