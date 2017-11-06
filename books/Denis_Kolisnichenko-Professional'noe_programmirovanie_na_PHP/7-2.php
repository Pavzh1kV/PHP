<? 
// Получаем   содержимое   текущего   каталога.    Для   нашего   сценария   
// текущим   будет   каталог  /var/www/html  
// $DocumentRoot)  
exec("ls -1",$Files); 

function cmp($el_1,$el_2) 
{   if (is_dir($el_1) && !is_dir($el_2)) return -1;   

    if (!is_dir($el_1) && is_dir($el_2)) return 1; 
  
    if($el_1<$el_2) return -1;     
      elseif($el_1>$el_2) return 1;    
    else return 0; 
} 

uasort($Files,"cmp"); 

echo "<html><title>Сценарий files.php</title><body>";  

echo "<h1>Содержимое каталога</h1><p>"; 

foreach($Files as $f)   
  if (is_dir ($f))  echo "<br><img src=folder.png>$f";    
  else echo "<br><img src=doc.png>$f"; 


echo "</body></html>"; 
?>