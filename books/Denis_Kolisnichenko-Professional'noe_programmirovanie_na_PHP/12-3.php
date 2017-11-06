<?
if ($dbhandle = sqlite_open('mysqlitedb', 0666, $sqliteerror))
{

$sql = "SELECT id FROM tbl WHERE id = 77 
$res = sqlite_query($dbhandle , $sql);

if (sqlite_num_rows($res) > 0) {
  echo sqlite_fetch_single($res);         // 77
}

sqlite_close($dbhandle); 
}
?>