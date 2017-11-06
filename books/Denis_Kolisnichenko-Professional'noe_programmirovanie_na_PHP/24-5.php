<? 

/* Подключаем систему Poll ПЕРЕД вашим HTML-кодом */
include "./poll_cookie.php"; 

?>
<b>Мой HTML код</b>
<?
/* путь к каталогу, в котором установлена система */ 

$poll_path = "c:/web5/www/poll";

// подключаем файл конфигурации и файл класса 
require $poll_path."/include/config.inc.php";
require $poll_path."/include/class_poll.php";

$php_poll = new poll();

/* простое голосование */
echo "<center>";

$php_poll->set_template_set("simple");
// Выводим голосование 4 (Poll ID = 4)
echo $php_poll->poll_process(4);

?>