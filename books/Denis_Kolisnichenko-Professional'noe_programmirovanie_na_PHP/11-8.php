<?
$Index = file("http://dkws.org.ua/text/about.html"); 

foreach($Index as $v)
   {
  echo strip_tags($v);   // ������� ����
  flush();              // ������� ������ � �������
 }
?>