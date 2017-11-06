<?php
$statusCookie = '' ;
if(isset($_GET['cookie'])) // Проверяем инициализацию элемента
{
	$statusCookie = $_GET['cookie']; // Успех, присваиваем переменной для кратости

	switch ($statusCookie) {
		case 'ResCookie':
			setcookie('cookie', 'res');
			break;		
		case 'SetCookie':
			setcookie('cookie', 'set');
			break;		
		default:
			break;
	}
}

//header('Location: http://www.yoursite.com/home-page.html', true, 301);
?>
<form method="get" action="cookie.php"">	
	<input type="submit" value="ResCookie" name="cookie">
	<input type="submit" value="SetCookie" name="cookie">
</form>
<a href="http://localhost/html/cookie.php">cookie</a>
<?php
if($statusCookie != '')
{
	echo "<pre>";
	print_r($_GET);
	print_r($_COOKIE);
}


