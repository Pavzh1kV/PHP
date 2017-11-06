<?

$poll_path = "c:/web5/www/poll";

require $poll_path."/include/config.inc.php";
require $poll_path."/include/class_poll.php";
require $poll_path."/include/class_pollcomment.php"; 
require $poll_path."/include/class_plist.php";

$php_poll = new plist();

/* первое */
echo "<center><TABLE><TR><TD valign=top>"; 
echo $php_poll->poll_process(4); 
echo "</TD><TD valign=top>";

/* второе */
$php_poll->set_max_bar_length(80); 
echo $php_poll->poll_process(1); 
echo "</TD><TD valign=top>";

/* третье */
$php_poll->set_template_set("popup"); 
if ($php_poll->is_valid_poll_id(2))     { 
echo $php_poll->display_poll(2); 
} 
echo "</TD></TR></TABLE>";

// шаблон оформления
$php_poll->set_template("poll_list"); 

// формат даты
$php_poll->set_date_format("m/d/Y"); 
echo $php_poll->view_poll_list(); 
echo $php_poll->get_list_pages();

?>