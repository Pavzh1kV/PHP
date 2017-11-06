<?
session_name("SessionofIvanov");
session_start();
session_register("a");
$a=@$a+l;
echo "<html><body>Нажмите Reload, чтобы увеличить счетчик";
echo "<br>Счетчик: $a";
?>
<a href=sesq.php?<?=SID?>>Click here</a>"
