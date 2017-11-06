<?
//  Обработчик открытия сессии
function open ($save_path,  $session_name)
{
echo "open ($save_path, $session_name)\n";
return true;
{
// Обработчик закрытия сессии
function close()
{
echo "close\n";
return true;
}

// Чтение из сессии
 function read ($key) 
{
echo "write ($key, $val)\n";
return "foo|i:1;";
}

// Запись во временное хранилище 
function write($key, $val)
{
echo "write ($key, $val)\n"; 
return true;
}

// Ничего не делает 
function destroy($key) 
{
return true;
}

// Ничего не делает 
function gc($maxlifetime) 
{
return true;
}

session_set_save_handler ("open", "close", "read", "write", "destroy", "gc");

session_start();
$foo++;
?>
