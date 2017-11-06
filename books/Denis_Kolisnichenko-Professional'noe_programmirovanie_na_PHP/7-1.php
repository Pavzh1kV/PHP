function cmp($el_1,$el_2)
{
// Сначала каталог, а потом - файл
if (is_dir($el_1) && !is_dir($el_2 )) return -1;
if (!is_dir($el_1) && is_dir($el_2 )) return 1;

// Сравниваем по алфавиту 
if($el_1<$el_2) return -1;
  elseif($el_1>$el_2) return 1;
    else return 0; 
}  
