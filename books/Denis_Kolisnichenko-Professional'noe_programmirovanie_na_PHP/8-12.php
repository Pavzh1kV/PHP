<?
function array_param($Arr)
{

$min = $max = $Arr[0];   // ������� Min = Max = ������ �������
$mn_ind = $mx_ind =0;    // ��� ������� ������������ � ����.
     			 // ���������
$avg =0;                 // ������� ��������������

foreach($Arr as $k=>$v)
{

if ($max < $v) { $max=$v; $mx_ind=$k; }; // ���������� $max
if ($min > $v) { $min=$v; $mn_ind=$k; }; // ���������� min
$avg = $avg + $v;

}

$avg   =   $avg / count ($Arr);     //����� ��������� �� ���������� ���������

$Res[]=$mx_ind; 
$Res[]=$mn_ind; 
$Res[]=$avg; 

return   $Res;                      //�������� ����������
}

for($i=1; $i<11; $i++) $Arr[]=$i;   //���������� ������� Arr[]

foreach(array_param($Arr) as $v) echo "$v ";

?>