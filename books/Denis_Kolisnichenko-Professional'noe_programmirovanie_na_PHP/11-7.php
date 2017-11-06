<?
$Index = join('', file("http://dkws.org.ua/text/about.html")); 
$Index = strip_tags($Index); 
echo $Index;
?>