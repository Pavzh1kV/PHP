<?

session_start();
// ������������ � ����� ���������� $ank - ��� � ���� ������
session_register("ank");

if (!isset($ank['count'])) {
// ������� ������� count �� ����������, �������������,
// ������������ ������ �������
$ank['count']=1; 
}
else $ank['count']++;

echo "�� ��������� ��� �������� $ank[count] ���(�)<�>";

// ������������ ���� ���, ����� �������� ��� ��� �
// ������ $ank, ���� name
if (strlen($name)>1) $ank['name']=$name;

// ������� ����� � �������� ������ ��� 
if (!isset($ank['name']))
echo "<form action=$SCRIPT_NAME><input type=text name=name;
<input type=submit></form>"; 
else
echo "�� ���������������� ��� ������: $ank[name]";
?>