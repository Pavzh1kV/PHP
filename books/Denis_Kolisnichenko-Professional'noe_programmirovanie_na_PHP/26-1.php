<?
session_name("SessionOfIvan");
session_start();
session_register("a");
$a=@$a+1;
echo "<html><body>������� Reload, ����� ��������� �������";
echo "<br>�������:  $a";
echo "</body></html>";
?>