<?

if (!isset($Questions))
{

// Cookies �� ����������� - ������ ������
for($i=0;$i<10;$i++) $Arr[]=$i;

// ����������� ������ � ������
$Serialized_arr = serialize($Arr);

// ������������� Cookies
setcookie("Questions",$Serialized_arr,time()+3600);

unset($Arr); 	// ������ $Arr ������ �� ����������
}
else
{
// Cookies ����������� - "�������������" ������ 

$Arr = unserialize($Questions); 

foreach($Arr as $v) echo "$v ";

}
?>