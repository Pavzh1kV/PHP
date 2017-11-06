<?
 $а = "my_password";
 $b = "my_password";
 $c = "password";

if  (md5($a)===md5($b)) echo "1: пароль правильный"; 
if  (md5($a)===md5($c)) echo "2: пароль правильный";
?>