<?

session_start();
// регистрируем в ессии переменную $ank - это и есть массив
session_register("ank");

if (!isset($ank['count'])) {
// Ёлемент массива count не установлен, следовательно,
// пользователь пришел впервые
$ank['count']=1; 
}
else $ank['count']++;

echo "¬ы загружали эту страницу $ank[count] раз(а)<р>";

// ѕользователь ввел им€, нужно записать это им€ в
// массив $ank, ключ name
if (strlen($name)>1) $ank['name']=$name;

// ¬ыводим форму с просьбой ввести им€ 
if (!isset($ank['name']))
echo "<form action=$SCRIPT_NAME><input type=text name=name;
<input type=submit></form>"; 
else
echo "¬ы зарегистрированы под именем: $ank[name]";
?>