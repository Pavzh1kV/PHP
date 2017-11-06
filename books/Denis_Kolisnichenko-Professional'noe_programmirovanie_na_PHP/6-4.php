<?
/* Проверяем, нажал ли пользователь кнопку go */

if (!isset($go))
{
  echo "Не указаны параметры\n";
  exit(1);
}
else
{
  /* Начинаем обработку параметров */

  echo "<html><body>";
  echo "<b>Текстовые поля:</b><br>";
  echo "txt: $txt  pswd: $pswd  hid: $hid<br>";
  
  echo "<b>Checkbox</b><br>";
  if (isset($var1)) echo "var1: $var1 ";
  if (isset($var2)) echo "var2: $var2 ";
  if (isset($var3)) echo "var3: $var3 ";
  
  echo "<br><b>Radio</b><br>";
  echo "sex: $sex";

  echo "<br><b>Область ввода текста</b><br>";
  echo $t_area;

  echo "<br><b>Список month:</b> $month";
  echo "<br><b>Список months[]:</b><br>";

  foreach ($months as $key=>$value)
    echo "<br> $key = $value";
}
?>