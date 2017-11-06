<?
$f=fopen("counter.dat","a+") or die("Cannot to open file"); 
flock($f,2); 
$count=fread($f,100); 
if(!isSet($Was)) 
{
$Was=1;
SetCookie("Was",$Was,time()+3600*24);
// подключаемся к базе данных
mysql_connect("localhost");
mysql_select_db("test");

// считаем, что хост - уникальный 
$Unique = 1;
$R=@mysql_query("SELECT * FROM stat") or die("Invalid SQL query" );

while($Rw=mysql_fetch_row($R))
{ if($Rw[0]===$REMOTE_ADDR) 
{ $Unique = 0; 
  break(1); }
}
// если хост уникальный.... 
if($Unique)
{
$vdate=date("d.m.y"); 
$count = $count + 1;
@mysql_query("INSERT INTO stat VALUES('$REMOTE_ADDR','$vdate','$HTTP_USER_AGENT')");
}
else
{
$vdate=date("d.m.y");
mysql_query("UPDATE stat SET vdate='$vdate', browser='$HTTP_USER_AGENT' WHERE ip='$REMOTE_ADDR'");
}
ftruncate($f,0);
fwrite($f,$count);
}

flock($f,3); 
fclose($f); 
echo $count;
?>