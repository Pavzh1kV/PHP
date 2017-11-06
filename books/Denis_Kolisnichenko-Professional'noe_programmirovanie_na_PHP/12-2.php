<?
//   открываем   базу   данных
if ($db = sqlite_open('mysqlitedb', 0666, $sqliteerror)) {
//    создаем   таблицу   tbl
sqlite_query($db,'CREATE TABLE tbl (bar varchar(20))'); 
//   Добавляем   в   таблицу   новые   записи
sqlite_query($db,"INSERT INTO tbl VALUES ('val')"); 
//   Получаем   результат
$result = sqlite_query($db,'select bar from tbl'); 
//    Выводим   результат
var_dump(sqlite_fetch_array($result)); 
} else {
die ($sqliteerror);
}
?>