function cmp($el_1,$el_2)
{
// ������� �������, � ����� - ����
if (is_dir($el_1) && !is_dir($el_2 )) return -1;
if (!is_dir($el_1) && is_dir($el_2 )) return 1;

// ���������� �� �������� 
if($el_1<$el_2) return -1;
  elseif($el_1>$el_2) return 1;
    else return 0; 
}  
