<?
//   ���������   ����   ������
if ($db = sqlite_open('mysqlitedb', 0666, $sqliteerror)) {
//    �������   �������   tbl
sqlite_query($db,'CREATE TABLE tbl (bar varchar(20))'); 
//   ���������   �   �������   �����   ������
sqlite_query($db,"INSERT INTO tbl VALUES ('val')"); 
//   ��������   ���������
$result = sqlite_query($db,'select bar from tbl'); 
//    �������   ���������
var_dump(sqlite_fetch_array($result)); 
} else {
die ($sqliteerror);
}
?>