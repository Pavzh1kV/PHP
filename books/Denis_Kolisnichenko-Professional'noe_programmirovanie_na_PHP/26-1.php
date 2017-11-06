<?
session_name("SessionOfIvan");
session_start();
session_register("a");
$a=@$a+1;
echo "<html><body>Нажмите Reload, чтобы увеличить счетчик";
echo "<br>Счетчик:  $a";
echo "</body></html>";
?>