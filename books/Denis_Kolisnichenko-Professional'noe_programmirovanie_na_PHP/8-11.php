<?
function init() 
{
if (func_num_args() == 0) return 0; 
else 
{ 
$value = func_get_arg(0);      	  // это значение нужно
    		        	 // присвоить переданным 
                               // переменным 

for($i=1; $i<func_num_args(); $i++)
{
 $var_to_set = func_get_arg($i);  // имя переменной, которую		                                  
				  // нужно инициализировать 

foreach($GLOBALS as $var=>$val) 
  if ($var == $var_to_set) $GLOBALS[$var]=$value;
  }
  }
}

$i = 7; $j = 6; 

init(1,"i","j"); 

echo "$i $j\n";

?>