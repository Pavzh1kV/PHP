<?
if (isset($upload)) 
{
// �� �������� ���� 
$Filename="/var/www/html/galery/".$Filename;

// ���� ����������: "�����������" � ��� ����� ��������� ����� 
if (file_exists($Filename)) 
{
mt_srand(time());
$r = mt_rand(0,1000);                // ��������� ����� 
$Filename = "/var/www/html/galery/$r".basename($Filename);
}

// �������� ����
copy($File,$Filename);
echo "<PRE>���� $File ���������� � $Filename</PRE>"; 
} else
{
// ������ upload �� ������, ������� ����� 
echo "<html><head><title>Galery</title></head><body>";
echo    "<form action=upload.php method=POST enctype=multipart/ 
form-data>" ;
echo "<input type=file name=File>";
echo "��� ����� �� ������� <input type=text name=Filename>"; 
echo "<input type=submit name=upload value=���������>"; 
echo "</form></body></html>";
}

?>