<?

// ������� ������ �������
/* ------------------------------------------------------------- */
function view_gal()
{
// ������ ������ ��������
$Galery = array();
// ������� �������
$GalDir = "/var/www/html/galery";

// ������ �� �������� upload.php
echo "<html><head><title>Galery</title></head><body>"; 
echo "<center><a href=upload.�h�>�������� ��������</�><hr width=100%>";

// ��������� ������� ������� 
$dir = opendir($GalDir);

// ������ ��� �������� ������� - ����� �������� $GalDir 
while(($item = readdir($dir))!==false)
{
// ���� ���������� ����� �� GIF, JPG, PNG, ��������� � ���������� �����
if(!ereg("A(.*)\\.(gif|jpg|png)$",$item,$p)) continue;

$path_to_file="$item";

// �������� ������ �������� (�� �����!) �
// ����� ����������� �����
$size = @GetImageSize($path_to_file);
$time = @filemtime($path_to_file);

// ��������� ������ $Galery 
$Galery[$item] = array( 
'name' => $item,           // ��� ����� 
't' => $time,              // ����� 
'url' => $path_to_file,    // URL 
'w'   => $size[0],         // ������ 
'h'  => $size[l],          // ������ 
'wh' => $size[2] ,         // ������ � ������
);
}

// ��������� ������� �� ������ ������ 
ksort($Galery);

echo "<br><table><tr>";
$count = 0;

// ������� ������� � ���� �������
foreach($Galery as $k=>$v)
{
// ������� �� ��� ��������
if ($count % 3 == 0) echo "<tr>";
echo "<td>";
echo "<a href=http://localhost/galery/.@$v[url].><img src=http://localhost/galery/".@$v[url]." width=250 height=250>
<br>$v[url] $v[w] x $v[h]</a>";
$time = @$v[t];
echo date("d.m.Y H:i:s", $time);
echo "</td>";

$count++;
}
echo "</table></body></html>";
}

/* ----------------------------------------------------------- */

// �������� ������� ��������� ������� 
view_gal();
?>