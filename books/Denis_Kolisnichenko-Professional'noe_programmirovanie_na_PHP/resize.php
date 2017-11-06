<? 
// fn - имя файла 
// type - способ масштабирования (1 уменьшить, 2 увеличить) 
// q - качество сжатия JPEG 
// src - исходное изображение 
// dest - результирующее изображение 
// w - ширниа изображения 
// ratio - коэффициент пропорциональности 

if ($type == 1) $w = 120;   // уменьшить 
if ($type == 2) $w = 218;  // увеличить 

if (!isset($q)) $q = 90;  // качество jpeg по умолчанию

// создаём исходное изображение на основе 
// исходного файла и опеределяем его размеры 
$src = imagecreatefromjpeg($fn); 
$w_src = imagesx($src); 
$h_src = imagesy($src);

header("Content-type: image/jpeg"); 

// если размер исходного изображения 
// отличается от требуемого размера 
if ($w_src != $w) 
{

       // вычисляем пропорции
       $ratio = $w_src/$w; 
       $w_dest = round($w_src/$ratio); 
       $h_dest = round($h_src/$ratio); 

       // создаем результирующую картинку
       $dest = imagecreatetruecolor($w_dest,$h_dest); 

       // строка, которая будет выведена поверх картинки
       $label = "www.dkws.org.ua"; 
       imagecopyresized($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src); 

       // определяем координаты, по которым должен быть выведен текст 
        $size = 2; // размер шрифта выводимого текста 

        $x_text = $w_dest-imagefontwidth($size)*strlen($str)-3; 
        $y_text = $h_dest-imagefontheight($size)-3; 

        // каким цветом нарисовать текст? здесь добавим элементы искусственного
        // интеллекта - ведь цвет должна определить сама программа, если мы
        // укажем его явно, то рано или поздно возникнет такая ситуация,
        // что заданный нами цвет просто сольется с фоном картинки 
        $white = imagecolorallocate($dest, 255, 255, 255); 
        $black = imagecolorallocate($dest, 0, 0, 0); 
        $gray = imagecolorallocate($dest, 127, 127, 127); 
        if (imagecolorat($dest,$x_text,$y_text)>$gray) $color = $black; 
        if (imagecolorat($dest,$x_text,$y_text)<$gray) $color = $white; 

        // выводим текст 
        imagestring($dest, $size, $x_text-1, $y_text-1, $label,$white-$color); 
        imagestring($dest, $size, $x_text+1, $y_text+1, $label,$white-$color); 
        imagestring($dest, $size, $x_text+1, $y_text-1, $label,$white-$color); 
        imagestring($dest, $size, $x_text-1, $y_text+1, $label,$white-$color); 

        imagestring($dest, $size, $x_text-1, $y_text,   $label,$white-$color); 
        imagestring($dest, $size, $x_text+1, $y_text,   $label,$white-$color); 
        imagestring($dest, $size, $x_text,   $y_text-1, $label,$white-$color); 
        imagestring($dest, $size, $x_text,   $y_text+1, $label,$white-$color); 

        imagestring($dest, $size, $x_text,   $y_text,   $label,$color); 
     

       imagejpeg($dest,'',$q);     // выводим картинку в браузер 
	imagedestroy($dest);        // очищаем память 
	imagedestroy($src); 
}
?>