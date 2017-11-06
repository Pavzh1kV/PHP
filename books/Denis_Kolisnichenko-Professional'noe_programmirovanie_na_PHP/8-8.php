<?
$i = 10; 
$g = 7;

function    f1()
{

$i = 5;
echo $i;         // выведет 5
global $i;
echo $i;         // выведет 10

}
f1();

?>