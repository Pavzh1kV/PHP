<?
// ���������   �����
$� = popen("/bin/ls","r");
$Files   =   array();

// ������ ����� ���������
for (;!eof($p);) $Files[] = gets($p,255); 

// ���������   �����

pclose ($p);
?>