<?
function GetRand()    {

$LocalArr = array(); 
mt_srand(time());

for ($i=0; $i<10;$i++)
$LocalArr [] = mt_rand(0,100);

return $LocalArr;
}

$A = GetRand();
foreach($A as $K=>$v) echo "$v ";

?>