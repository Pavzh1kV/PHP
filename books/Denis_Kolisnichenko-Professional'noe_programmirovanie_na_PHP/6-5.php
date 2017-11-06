<?

// до конца сессии
SetCookie("Test","value");

// время жизни - один час после установки (1 час = 3600 секунд)
SetCookie("My_cookie","One hour",time()+3600);

?>