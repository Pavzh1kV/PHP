<?
function array_param($Arr)
{

$min = $max = $Arr[0];   // сначала Min = Max = первый элемент
$mn_ind = $mx_ind =0;    // Это индексы минимального и макс.
     			 // элементов
$avg =0;                 // Среднее арифметическое

foreach($Arr as $k=>$v)
{

if ($max < $v) { $max=$v; $mx_ind=$k; }; // Вычисление $max
if ($min > $v) { $min=$v; $mn_ind=$k; }; // Вычисление min
$avg = $avg + $v;

}

$avg   =   $avg / count ($Arr);     //Сумма разделить на количество элементов

$Res[]=$mx_ind; 
$Res[]=$mn_ind; 
$Res[]=$avg; 

return   $Res;                      //Передача результата
}

for($i=1; $i<11; $i++) $Arr[]=$i;   //Заполнение массива Arr[]

foreach(array_param($Arr) as $v) echo "$v ";

?>