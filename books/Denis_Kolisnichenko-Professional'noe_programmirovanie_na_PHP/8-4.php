<?
$First = $Second = 5;

echo "<PRE>";

function f1($f, &$s)
{
echo "�������� ���������\n";

$f = 7; $s = 10;

echo "First = $f, Second = $s\n";
}

echo "�������� ���������� �� ������ �������\n";

echo "First = $First Second = $Second\n";

f1($First, $Second);

echo "First = $First Second = $Second\n";

?>