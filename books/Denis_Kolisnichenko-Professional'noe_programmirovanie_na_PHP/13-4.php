<?
$im = ImageCreateFromPng("./11-1.png"); 
$color = imagecolorallocate($im,255,0,0); // ������� ������ - ���� ������

// ���� ������ - IP-����� ������� + ��� ������� 
$str = "$REMOTE_ADDR $SERVER_NAME";

// ������� ������ $str � �������� $im, ����� - 5, 
// ���������� ������ ������ (70,200) 
// ����  -  $color (�������)

imagestring($im,5,70,200,$str,$color);

Header("Content-type: image/png"); 
ImagePng($im); 
ImageDestroy($im);
?>
