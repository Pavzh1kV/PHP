<?
$f_info  = stat("/home/den/lines.txt");

echo "����:  /home/den/lines.txt\n";
echo "����������: \t\t$f_info[0]\n";
echo "����� inode: \t\t$f_info[1]\n";
echo "�������� \t\t$f_inf�[2]\n";
echo "����� ������� ������: \t$f_inf�[3]\n";
echo "UID $f_info[4] GID $f_inf�[5]\n";
echo "��� ����������:  \t$f_inf�[6]\n";
echo "������:  \t\t$f_inf�[7]\n";
echo "����� ���������� �������: ".date("d M Y �:i:s",$f_info[8])."\n";
echo "����� ���������� ��������� �����: ".date("d M Y  
        H:i:s",$f_info[9])."\n";
echo "����� ���������� ��������� ��������� �����: ".date("d M Y
H:i:s",$f_info[10])."\n";
echo "������ �����: $f_info[11]\n";
echo "����� ������, ������� �������� ����: $f_inf�[12]\n" ;

?>