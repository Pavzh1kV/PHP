<?
$t = file('http://www.linuxcenter.ru/trans/export_types.phtml?sid=stjcvd25');
foreach($t as $s)
{

// ����������� ���������� ������ � ������� ���������� 
// $num - ����� ���������
// $link - ������
// $name - �������� ���������
list($num, $link, $name) = explode("\t",$s); 

echo "<br><a href=$link>$name</a>";

}

?>