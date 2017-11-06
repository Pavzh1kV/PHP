<?
$image = ImageCreateFromPng("image.png"); 
Header("Content-type: image/png"); 
ImagePng($image); 
ImageDestroy($image);
?>