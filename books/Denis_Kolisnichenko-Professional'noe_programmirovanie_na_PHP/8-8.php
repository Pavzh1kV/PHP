<?
$i = 10; 
$g = 7;

function    f1()
{

$i = 5;
echo $i;         // ������� 5
global $i;
echo $i;         // ������� 10

}
f1();

?>