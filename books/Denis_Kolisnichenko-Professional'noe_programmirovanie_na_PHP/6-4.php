<?
/* ���������, ����� �� ������������ ������ go */

if (!isset($go))
{
  echo "�� ������� ���������\n";
  exit(1);
}
else
{
  /* �������� ��������� ���������� */

  echo "<html><body>";
  echo "<b>��������� ����:</b><br>";
  echo "txt: $txt  pswd: $pswd  hid: $hid<br>";
  
  echo "<b>Checkbox</b><br>";
  if (isset($var1)) echo "var1: $var1 ";
  if (isset($var2)) echo "var2: $var2 ";
  if (isset($var3)) echo "var3: $var3 ";
  
  echo "<br><b>Radio</b><br>";
  echo "sex: $sex";

  echo "<br><b>������� ����� ������</b><br>";
  echo $t_area;

  echo "<br><b>������ month:</b> $month";
  echo "<br><b>������ months[]:</b><br>";

  foreach ($months as $key=>$value)
    echo "<br> $key = $value";
}
?>