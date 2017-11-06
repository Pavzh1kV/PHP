<?
// Список-массив электронных адресов
$Users = file("users.txt");
// Сообщение
$Message = join('',file("message.txt"));

// Отправляем сообщение каждому пользователю
foreach ($Users as $user) mail($user,"Spam",$Message);

?>