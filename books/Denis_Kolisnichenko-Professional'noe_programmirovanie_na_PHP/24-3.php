<?
// ��� ����, ���������� ����������
$file = "vote.txt";
$data = file($file);
$i = 1;

// ���������� ����� � �����
$qty = count($data);
$n = 0;

while ($i <= $qty):
$data[$i] = trim(str_replace("\n","", $data[$i]));
$n = $n+$data[$i];
$i++;
endwhile;

if ($answer != "") { 
echo "<br>�������!";
$data[$answer]++; $n++;

$res = "����������\n".$data[1]."\n".$data[2]."\n".$data[3]."\n".$data[4]; 
$fp = @fopen($file,"w");

if ($fp) { $counter=fputs($fp,$res); fclose($fp); } 
else { echo "������ ������ � ����"; }

} else { echo "<br>���������� �����������"; }

echo "<br>����� - <b>".$data[1]."</b>";
echo "<br>������ - <b>".$data[2]."</b>";
echo "<br>������� - <b>".$data[3]."</b>";
echo "<br>��� ��� ����� - <b>".$data[4]."</b>";
echo "<br><br>Bcero �������: ".$n;

?>