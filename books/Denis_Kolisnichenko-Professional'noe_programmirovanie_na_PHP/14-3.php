<?
// ������������� ���������� � �������� ftp.firma.ru
$conn = ftp_connect("ftp.firma.ru"); 

// �������� ��� ������������ � ������
$result = ftp_login($conn, "pupkin", "123456rt"); 

// ����� �� ������ ��� ���?
if ((!$conn) || (!$result)) { 
        echo "�� �������� ����������� � FTP-��������!";
        die; 
    } else {
        echo "������� ������������ � �������!";
    }

// ��������� ���� 
$upload = ftp_put($conn, "report.doc", "/home/den/report.doc", FTP_BINARY); 

// ���������� �� ����?
if (!$upload) { 
        echo "��������� ������ ��� �������� �����";
    } else {
        echo "���� ������� �������� �� FTP-������";
    }

// ��������� FTP-����������
ftp_close($conn); 
?>