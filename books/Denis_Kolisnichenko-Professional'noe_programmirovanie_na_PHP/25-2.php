<?
$f = fopen("counter.dat","a+ ") or die("Cannot to open file"); 
flock($f,2); 
$count=fread($f,100); 
if(!isSet($Was)) 
{
   $Was=1;
   SetCookie("Was",$Was,time()+3600*24); 

// He ����������� ��������� �� ������ ����            $REMOTE_HOST=gethostbyaddr($REMOTE_ADDR); 

    if(!($HTTP_HOST===$REMOTE_HOST)) @$count=$count+1; 

    ftruncate($f,0);
    fwrite($f,$count); 
}

flock($f,3);
fclose($f);

$img = ImageCreateFromPng("images/template.png"); // ������ 16 
$color = ImageColorAllocate($img, 0, 0, 255);     // ������ 17 
ImageString($img,3,5,9,"Visits : $count",$color); // ������ 18
Header("Content-type: image/png");                // ������ 19
ImagePng($img);                                   // ������ 20
ImageDestroy($img); 
?>