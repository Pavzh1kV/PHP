#include   <stdio.h>
int   main()
{
char buff[1024]={0} ;
fgets(buff, sizeof (buff), stdin);
printf("�������� �� ������������ �����: %s\n",buff);
printf("���������� ������ ��������� ��������\n");
return 0 ; 
}