<?
$f = fopen($f, "a+") of die("������!\n");

flock($f, LOCK_EX);     //   ����, ���� �� ������� ���������� ��
//    �������������� ����������
//   � ����� ������������� ��
//    �������� ��������, ��� ���������
//   �� ������� ���������� �� �������
//    flock(), ���� �� ����� �����������
//    ����������
fwrite ($f, $str."\n");
flock($f, LOCK_UN);     //    ������� ����������
fclose($f);
?>