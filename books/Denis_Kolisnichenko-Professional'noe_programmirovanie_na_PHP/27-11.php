<?

if (isset($d)) {
// Переменная $d установлена
$fname="./news/".$d.".html";
if (file_exists($fname)) { $text = join('', file($fname) );
} else $text="Новость от $d не найдена";

$text = join(file($fname),''); 

include "add/news_header.html"; 

echo $text; 

include "add/news_footer.html";

}
?>