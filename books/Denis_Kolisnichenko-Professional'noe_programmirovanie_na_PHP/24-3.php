<?
// Это файл, содержащий результаты
$file = "vote.txt";
$data = file($file);
$i = 1;

// Количество строк в файле
$qty = count($data);
$n = 0;

while ($i <= $qty):
$data[$i] = trim(str_replace("\n","", $data[$i]));
$n = $n+$data[$i];
$i++;
endwhile;

if ($answer != "") { 
echo "<br>Спасибо!";
$data[$answer]++; $n++;

$res = "Результаты\n".$data[1]."\n".$data[2]."\n".$data[3]."\n".$data[4]; 
$fp = @fopen($file,"w");

if ($fp) { $counter=fputs($fp,$res); fclose($fp); } 
else { echo "Ошибка записи в файл"; }

} else { echo "<br>Результаты голосования"; }

echo "<br>Новый - <b>".$data[1]."</b>";
echo "<br>Старый - <b>".$data[2]."</b>";
echo "<br>Никакой - <b>".$data[3]."</b>";
echo "<br>Мне все равно - <b>".$data[4]."</b>";
echo "<br><br>Bcero голосов: ".$n;

?>