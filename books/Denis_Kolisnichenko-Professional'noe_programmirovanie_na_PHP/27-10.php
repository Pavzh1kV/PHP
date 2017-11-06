<?
$NewsFile = "add/news.html";
if (file_exists($NewsFile)) { $news = join('', file($NewsFile)); } 
   else $news="No news today";

include "add/t_header.html";
echo $news;
include "add/t_footer.html";

?>