<?
// ������� ������� 200x200
$im = ImageCreate(200,200);
// ������ ����������� ���� - ��� ���� ����
// RGB (0,0,0) - ��� ������ ����
$black = imagecolorallocate($im,0,0,0);
// ������� ������ $�[] � ��������� ��� �������
$�[] = imagecolorallocate($im,255,0,0);  		  // �������
$�[] = imagecolorallocate($im,0,255,0);     	  // �������
$�[] = imagecolorallocate($im,0,0,255);    	  // �����
$�[] = imagecolorallocate($im,255,0,255);
$�[] = imagecolorallocate($im,100,0,100);
$c1 = 1; // ������ ������� $�[]

// ������ ��������������� ��������
for ($i = 1; $i < 7; $i++)
{
$c1 = $i;
if ($c1>5) $c1 = 1;  

ImageRectangle($im,10*$i,10*$i,200-10*$i,200-10*$i,$c[$c1-l]);
}

// �������� �������� ������ ��������
Header("Content-type: image/png");
// ������� ����������� � ������� PNG
ImagePng($im);
// ����������� ������
ImageDestroy($im);

?>