<? 
// fn - ��� ����� 
// type - ������ ��������������� (1 ���������, 2 ���������) 
// q - �������� ������ JPEG 
// src - �������� ����������� 
// dest - �������������� ����������� 
// w - ������ ����������� 
// ratio - ����������� ������������������ 

if ($type == 1) $w = 120;   // ��������� 
if ($type == 2) $w = 218;  // ��������� 

if (!isset($q)) $q = 90;  // �������� jpeg �� ���������

// ������ �������� ����������� �� ������ 
// ��������� ����� � ����������� ��� ������� 
$src = imagecreatefromjpeg($fn); 
$w_src = imagesx($src); 
$h_src = imagesy($src);

header("Content-type: image/jpeg"); 

// ���� ������ ��������� ����������� 
// ���������� �� ���������� ������� 
if ($w_src != $w) 
{

       // ��������� ���������
       $ratio = $w_src/$w; 
       $w_dest = round($w_src/$ratio); 
       $h_dest = round($h_src/$ratio); 

       // ������� �������������� ��������
       $dest = imagecreatetruecolor($w_dest,$h_dest); 

       // ������, ������� ����� �������� ������ ��������
       $label = "www.dkws.org.ua"; 
       imagecopyresized($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src); 

       // ���������� ����������, �� ������� ������ ���� ������� ����� 
        $size = 2; // ������ ������ ���������� ������ 

        $x_text = $w_dest-imagefontwidth($size)*strlen($str)-3; 
        $y_text = $h_dest-imagefontheight($size)-3; 

        // ����� ������ ���������� �����? ����� ������� �������� ��������������
        // ���������� - ���� ���� ������ ���������� ���� ���������, ���� ��
        // ������ ��� ����, �� ���� ��� ������ ��������� ����� ��������,
        // ��� �������� ���� ���� ������ �������� � ����� �������� 
        $white = imagecolorallocate($dest, 255, 255, 255); 
        $black = imagecolorallocate($dest, 0, 0, 0); 
        $gray = imagecolorallocate($dest, 127, 127, 127); 
        if (imagecolorat($dest,$x_text,$y_text)>$gray) $color = $black; 
        if (imagecolorat($dest,$x_text,$y_text)<$gray) $color = $white; 

        // ������� ����� 
        imagestring($dest, $size, $x_text-1, $y_text-1, $label,$white-$color); 
        imagestring($dest, $size, $x_text+1, $y_text+1, $label,$white-$color); 
        imagestring($dest, $size, $x_text+1, $y_text-1, $label,$white-$color); 
        imagestring($dest, $size, $x_text-1, $y_text+1, $label,$white-$color); 

        imagestring($dest, $size, $x_text-1, $y_text,   $label,$white-$color); 
        imagestring($dest, $size, $x_text+1, $y_text,   $label,$white-$color); 
        imagestring($dest, $size, $x_text,   $y_text-1, $label,$white-$color); 
        imagestring($dest, $size, $x_text,   $y_text+1, $label,$white-$color); 

        imagestring($dest, $size, $x_text,   $y_text,   $label,$color); 
     

       imagejpeg($dest,'',$q);     // ������� �������� � ������� 
	imagedestroy($dest);        // ������� ������ 
	imagedestroy($src); 
}
?>