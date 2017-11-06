<?
$NewsFile = "add/news.html";
if (file_exists($NewsFile)) { $news = join('', file($NewsFile)); } 
    else $news="No news today";

echo "<table width=100% border=2 cellspacing=O cellpadding=3
bordercolor=#336699><tr><td bgcolor=#336699><font color=white>Новости
</font></td></tr><tr><td>".$news."</td></tr></table>";
?>