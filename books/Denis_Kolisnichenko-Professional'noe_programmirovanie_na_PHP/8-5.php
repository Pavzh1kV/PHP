<?

$Array = array();

function Multi($a="-999999") {

global $Array;    		// передаем в функцию глобальный массив Array() 

$i = 0;

if ($a=="-999999") 
{
// нет параметров, был передан параметр по умолчанию $а=-999999;
$mах = $Аrrау[0]; 

for($i=0; $i<10; $i++)
 if ($max < $Array[$i]) $max = $Array[$i]; 
  
return $max; 
}
  else {
 // поиск элемента
for($i=0;$i<10;$i++)
if ($Array[$i] == $a) return $i;
       }
   }
        for($i=0;$i<10;$i++) $Array[]=$i+7; 
        echo Multi()."\n"; 
        echo Multi(10)."\n";

?>