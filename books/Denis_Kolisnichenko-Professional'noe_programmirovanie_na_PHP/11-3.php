<?
$f = fopen("/home/den/lines.txt", "r+") or die("������!\n");

// ���������� ��������� ����� � ����� ����� 
fseek($f, 0, SEEK_END); 
fwrite($f,"\nLine4"); 
fflush($f);
?>