<?

$Array = array();

function Multi($a="-999999") {

global $Array;    		// �������� � ������� ���������� ������ Array() 

$i = 0;

if ($a=="-999999") 
{
// ��� ����������, ��� ������� �������� �� ��������� $�=-999999;
$m�� = $�rr��[0]; 

for($i=0; $i<10; $i++)
 if ($max < $Array[$i]) $max = $Array[$i]; 
  
return $max; 
}
  else {
 // ����� ��������
for($i=0;$i<10;$i++)
if ($Array[$i] == $a) return $i;
       }
   }
        for($i=0;$i<10;$i++) $Array[]=$i+7; 
        echo Multi()."\n"; 
        echo Multi(10)."\n";

?>