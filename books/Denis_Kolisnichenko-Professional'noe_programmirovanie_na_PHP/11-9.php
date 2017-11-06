<?
$f_info  = stat("/home/den/lines.txt");

echo "Файл:  /home/den/lines.txt\n";
echo "Устройство: \t\t$f_info[0]\n";
echo "Номер inode: \t\t$f_info[1]\n";
echo "Атрибуты \t\t$f_infо[2]\n";
echo "Число жестких ссылок: \t$f_infо[3]\n";
echo "UID $f_info[4] GID $f_infо[5]\n";
echo "Тип устройства:  \t$f_infо[6]\n";
echo "Размер:  \t\t$f_infо[7]\n";
echo "Время последнего доступа: ".date("d M Y Н:i:s",$f_info[8])."\n";
echo "Время последнего изменения файла: ".date("d M Y  
        H:i:s",$f_info[9])."\n";
echo "Время последнего изменения атрибутов файла: ".date("d M Y
H:i:s",$f_info[10])."\n";
echo "Размер блока: $f_info[11]\n";
echo "Число блоков, которые занимает файл: $f_infо[12]\n" ;

?>