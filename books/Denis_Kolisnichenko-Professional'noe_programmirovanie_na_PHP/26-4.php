<?
//  ���������� �������� ������
function open ($save_path,  $session_name)
{
echo "open ($save_path, $session_name)\n";
return true;
{
// ���������� �������� ������
function close()
{
echo "close\n";
return true;
}

// ������ �� ������
 function read ($key) 
{
echo "write ($key, $val)\n";
return "foo|i:1;";
}

// ������ �� ��������� ��������� 
function write($key, $val)
{
echo "write ($key, $val)\n"; 
return true;
}

// ������ �� ������ 
function destroy($key) 
{
return true;
}

// ������ �� ������ 
function gc($maxlifetime) 
{
return true;
}

session_set_save_handler ("open", "close", "read", "write", "destroy", "gc");

session_start();
$foo++;
?>
