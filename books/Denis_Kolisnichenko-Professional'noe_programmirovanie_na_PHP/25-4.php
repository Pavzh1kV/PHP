<?
// ������������� �� ������ - ��� ���� 
if (!isSet($id)) $id=1; 		// ������� ��� ���������� $table="id$id";

// ������������ � ���� ������ 
mysql_connect("localhost"); 
mysql_select_db("counter"); 	
// �������, ��� ���� - ���������� 
$Unique = 1;
$R=@mysql_query("SELECT * FROM $table") or die("Invalid SQL query 1");

while($Rw=mysql_fetch_row($R)) 
{ if($Rw[0]===$REMOTE_ADDR) 
    { $Unique = 0; break(1); }

// ���� ���� ����������... 
if($Unique)
{
$R=mysql_query("SELECT * FROM ids WHERE id=$id") or die("Invalid query 2");
$Rw=mysql_fetch_row($R);
$counter=$Rw[1];
$vdate=date("d.m.y");
$counter=$counter+1; 		// ��������� �������

// ��������� ���������� � ����������
@mysql_query("UPDATE ids SET unq=$counter WHERE id=$id"); 
@mysql_query("INSERT INTO $table VALUES('$REMOTE_ADDR','$vdate','$HTTP_USER_AGENT')");
}
else
{
$vdate=date("d.m.y");
mysql_query("UPDATE $table SET vdate='$vdate', browser='$HTTP_USER_AGENT' WHERE ip='$REMOTE_ADDR'");
}

// ������� ��������
$img = ImageCreateFromPng("images/template.png"); 
$color = ImageColorAllocate($img, 0, 0, 255);  
ImageString($img,3,5,9,"Visits : $count",$color);
Header("Content-type: image/png");               
ImagePng($img);                                  
ImageDestroy($img);
?>