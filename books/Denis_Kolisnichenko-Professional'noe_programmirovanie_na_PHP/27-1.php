<?
if(!defined("LIBRARY_IS_LOAD")) {

// Библиотека загружена 
define("LIBRARY_IS_LOAD",1);

// Расширение библиотечных файлов по умолчанию 
define("DefaultExt","lib");

// Пути поиска по умолчанию
$INC_DIRS = array(".","./lib","./include");

// Преобразует относительный путь в абсолютный
function absolute_path($path, $cur_path)
{
// заменим обратные слэши прямыми
$path = strtr(trim($path),"\\","/");
// теперь разобьем путь по прямым слэшам
$APaths = explode("/",$path);

//    Если указан текущий каталог, то путь поиска
//    (Search) равен этому каталогу
//    В противном случае используем текущий
//    каталог (getcwd()).
if ($cur_path==="") $Search=getcwd(); else $Search=$cur_path;

foreach($APaths as $k=>$v)
if ($v!=".")
{
if(!$k && (strlen($v)>1&&$v[1]===":"||$v==="")) $Search=$v;
elseif($v==="..")
{
if (strlen($Search)>1 && $Search[1]===":") continue; 
$p=dirname($Search);
if($p==="/"||$p==="\\"||$p===".") $Search=""; else $Search=$p; 
}
elseif($v!=="") $Search=$Search."/$v"; 
} 
return ($Search!==""?$Search:"/");
}

// Преобразует URL в абсолютный путь 
function UrlToPath($path)
{
$URL=dirname("$SCRIPT_NAME"); 
$cURL=absolute_path(trim($path),$URL); 
return getenv("DOCUMENT_ROOT").$cURL;
}

// Преобразуем все пути в массиве $INC_DIRS в абсолютные
function Absolutelnclude()
{
static $DIR="";
global $INC_DIRS;

if ($DIR!==$INC_DIRS) { 
for($i=0; $i<count($INC_DIRS); $i++) 
{
$value=&$INC_DIRS[$i];
if ($value[0]==="." && (strlen($value)==1 ||
$value[l]==='\\'  ||  $value[l]==='/')) continue; 

$value=absolute_path($value); 
} 
$DIR=$INC_DIRS;
}
}

function Load($library)
{
global $INC_DIRS;
static $DIR, $Last=0;

AbsoluteInclude(); 
$l=$Last; 
do {
$dir=$INC_DIRS[$Last];
if(@is_file($f="$dir/$library.".DefaultExt)) { 
$cwd=getcwd(); 
chdir(dirname($f));
foreach($GLOBALS as $k=>$v) global $$k; 
$res=include_once($f); 
AbsoluteInclude(); 
chdir($cwd); 
return $res;
}
$Last=($Last+1)%count($INC_DIRS);
} while ($Last!=$1);
die("Library $library not found at ".join("; ",$INC_DIRS));
}

error_reporting(E_ALL);

// После последнего тега >? не должно быть пробелов 
// или иных символов!

}
?>