#include   <stdio.h>
#include   <sys/wait.h>
#include   <unistd.h>

int   main() 
{
char buff[1024]={0};
FILE * cp; 				// cp - child process - �������� �������
int status;

// ��������� ����� ��� ������. �������� ������� - /usr/bin/child 
�� = ����n("/usr/bin/child", "w"); 

if (!cp) 
{
printf("He ���� ������� �����.\n"); 
exit(1)
}

printf("������� ���������� ��� �������� ��������� �������� " );

// ������ ���� ������������
fgets(buff, sizeof (buff), stdin);

// �������� ������ ��������� �������� 
fprintf(cp, "%s\n", buff);
// "�����������" ���������� ������ � ����� 
fflush(cp);

// ��������� ����� � ��������� ��������� ������ pclose() 
status=pclose(cp); 

if (!WIFEXITED(status)) 
   printf("������ ��� �������� ������\n");

printf("���������� ������ ������������� ��������\n"); 
return 0 ;
}