#include   <stdio.h>
int   main()
{
char buff[1024]={0} ;
fgets(buff, sizeof (buff), stdin);
printf("Прочитал со стандартного ввода: %s\n",buff);
printf("Завершение работы дочернего процесса\n");
return 0 ; 
}