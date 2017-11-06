<?
$image = ImageCreateFromPng("image.png"); 
Header("Content-type: image/jpeg"); 
ImageJpeg($image); 
ImageDestroy($image); 
?>