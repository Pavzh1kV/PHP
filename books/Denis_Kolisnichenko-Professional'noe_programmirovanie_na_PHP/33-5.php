<?
// ����������   ���������������   ����� 
include "header.php"; 
include "options.php";

// �������   �������   �����   ���������   ���������
// ���������   ��   ��������� - CD
function ShowTovar($ct="CD")
{
global $SERVER, $USER, $PASSWD, $DB;

if (!mysql_connect($SERVER,$USER,$PASSWD))
{
echo $head;
echo "<h1>������ ������� MySQL. MySQL server error</h1>";
echo "</body></html>";
exit;
}
mysql_select_db($DB);

if($ct==="BK") echo "<h1>�����</h1>"; 
else echo "<h1>�������-�����</h1>";

echo "<table WIDTH=100% border=2 cellspacing=O cellpadding=3
bordercolor=#336699>";

echo "<tr><td bgcolor=#336699><font color=white>������������</td>
<td bgcolor=#336699><font color=white>����</td>
<td bgcolor=#336699><font color=white>�����</td>
</tr>";

$r=mysql_query("select * from tovar where cat=\"$ct\"");

echo "<form method=post action=index.php>";

echo mysql_error();

for ($i=0; $i<mysql_num_rows($r); $i++)
{
echo "<tr>";
$f=mysql_fetch_array($r);
echo "<td>$f[opis]</td><td>$f[price]</td>
<td><input type=checkbox name=Arr[] value=".$f['id']."
</tr>";
}
echo "</table>";
echo "<p><input type=submit name=buy value=��������><input
type=Reset value=C6poc></form>
<p>&copy ����� ������������ (dhsilabs at mail.ru), 2003</
body></html>";
}


// ���������, ��������������� �� ������������ 
if (!isset($myshop_email))  {

echo $head;
echo "<p>�� �� ����������������. ����������, ��������
���������� � ����. <PRE>";

echo "<form action=index.php method=post>
<table border=0 width=50%>
<tr>
<td>���� ��� <td><input type=text name=myshop_name> 
<td>������� <td><input type=text name=myshop_family>
<tr>
<td>�������� <td><input type=text name=myshop_otch>
<td>E-mail <td><input type=text name=myshop_email>
<tr>
<td>������ <td><input type=text name=myshop_country> 
<td>����� <td><input type=text name=myshop_city>
<tr>
<td>�����  <td><input type=text name=myshop_address> 
<td>������ <td><input type=text name=myshop_zip>
</table>
<p><input type=submit name=register value=OK>
";

}
else 
{

// ������������ ������������ 
if (isset($register))
{
SetCookie("myshop_name",$myshop_name); 
SetCookie("myshop_family",$myshop_family); 
SetCookie("myshop_otch",$myshop_otch); 
SetCookie("myshop_email",$myshop_email); 
SetCookie("myshop_country",$myshop_country); 
SetCookie("myshop_city",$myshop_city);
SetCookie("myshop_address",$myshop_address); 
SetCookie("myshop_zip",$myshop_zip);
}
echo $head;


// ������������ ��� ������ ����� � ����� ������ �����
if(isset($buy))
{
$message = "������������, $myshop_name!\n".date("d.m.Y") ." ��
�������� ��� Internet-�������\n";

$message = $message."��� �����:\n";

$q = "select * from tovar where"; 
foreach($Arr as $k=>$v) $q=$q." (id=$v) or "; 
$q = substr($q,0,strlen($q)-4);

// echo "$q";

if(!mysql_connect($SERVER,$USER,$PASSWD))
{
echo $head;
echo "<h1>0����� ������� MySQL. MySQL server error</h1>";
echo "</body></html>";
exit;
}

mysql_select_db($DB);

$r=mysql_query($q);

// echo mysql_error();

echo "<h1>Ba� �����:</h1>";
echo "<table WIDTH=100% border=2 cellspacing=O cellpadding=3
bordercolor=#336699>";

echo "<tr><td bgcolor=#336699><font color=white>������������</td>
<td bgcolor=#336699><font color=white>����</td></tr>";

$sum = 0;
for ($i=0; $i<mysql_num_rows($r); $i++)
{
echo "<tr>";
$f=mysql_fetch_array($r);
echo "<td>$f[opis]</td><td>$f[price]</td>" ;
$message=$message."$f[opis] \t\t $f[price]\n" ;
$sum+=$f['price'];
echo "</tr>";
}
echo "</table>";
echo "<p>����� ����� ������: $sum";

$message=$message."\n����� �����: $sum\n
��� ������������� ������ ������ ������� Reply\n\n
������� �� ��������� ������ ��������!
---------------------------------------
��������������� ��������:\n 
������� $myshop_family\n 
��� $myshop_name\n 
�������� $myshop_otch\n 
Email $myshop_email\n 
������ $myshop_country\n 
����� $myshop_city\n 
����� $myshop_address\n 
������ $myshop_zip\n
";

mail($myshop_email,"MySHOP: ��� �����",$message,"From: $REPLY"); 
echo "<p><b>��� ���������� ����������� � ������\n";

exit;

}

// ������� ��������� ��� ����� ������������ ���������
If(!isset($myshop_cat))
{
echo "<h2>�� ������ ������:</h2>
<ul>
<li><a href=index.php?myshop_cat=CD>�������-����</li></a> 
<li><a href=index.php?myshop_cat=BK>K���y</li></a>
</ul>";
}
else
{
ShowTovar($myshop_cat);
}

}
?>