<?
// ������-������ ����������� �������
$Users = file("users.txt");
// ���������
$Message = join('',file("message.txt"));

// ���������� ��������� ������� ������������
foreach ($Users as $user) mail($user,"Spam",$Message);

?>