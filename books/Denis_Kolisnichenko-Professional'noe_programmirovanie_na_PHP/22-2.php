<?
echo "<html><head><title>�������� �����</title></head><body>"; 
echo "<h1>�������� �����/h1>";

$file_gb="./gbook/gb.txt";        //��� ���� �������� �����
$file_tmp="./gbook/gb_tmp.txt";   //��� ��������� ����,
                                  //������������   ���������
$���=50;                          // ������������ �-�� ��������� ���������

// ������� ��� ������ ����� gb.txt
function view()
{	
$Messages=file('./gbook/gb.txt');
echo "<p><table width=100%>"; 

$i=0;

foreach($Messages as $v)
{
$i++;
if ($i % 2 == 0) echo "<tr><td>$v</td></tr>" ;
else echo "<tr><td bgcolor=gray>$v</td></tr>" ;

// ���� ����� ��������� = 50 (�.�. ��� �������� 50 ���������), ��������� ���� 
if ($i==$Max) break;
}
}

if (!isset($Post)) {

// ������� ����� ��� ����� ������ ���������
echo "<table width=100% border=l>";
echo "<tr><td><h2>Ho�oe coo��e��e</h2><form method=post action=$SCRIPT_NAME>";
echo "Email: <input type=text name=email>" ;
echo "��������� <input type=text name=mes> <input type=submit
name = Post></td></tr>";
echo "</table></form>";

// ������� ��������� 
view();

}
else
{
if(file_exists($file_tmp)) die("fatal error!");

// ��������� ����� ��������� � ������ ����� 
if(copy($file_gb, $file_tmp)) 
{ 
if($w=fopen($file_gb,"w"))
{
flock($w,2);            // ��������� ������ � ��������� �����

// $mes - ��� ��������� ������������
// ����� ��������� ��������� � ���� ������ �� ���� HTML-���� 
// strip_tags($mes);

fwrite($w,"[".date("d.m.Y H:i:s").$email."]".
strip_tags($mes)."\n");

if(!$r = fopen($file_tmp,"r")) die("can't open file"); 
flock($r,1);             // ��������� ������ � ���������� �����

while($mes=fgets($r,10240)) 
{ 
fputs($w,$mes);
}

// ������� ���������� � ��������� ����� 
flock($r,3); 
fclose($r); 
flock($w,3); 
fclose($w);

// ������� ��������� ���� 
unlink($file_tmp);
}
}
echo "��������� ������� �������� � ����"; 
//   �������   ��������   ����� 
view();
}
?>