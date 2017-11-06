#include   <stdio.h>
#include   <sys/wait.h>
#include   <unistd.h>

int   main() 
{
char buff[1024]={0};
FILE * cp; 				// cp - child process - дочерний процесс
int status;

// Открываем канал для записи. Дочерний процесс - /usr/bin/child 
ср = рореn("/usr/bin/child", "w"); 

if (!cp) 
{
printf("He могу открыть канал.\n"); 
exit(1)
}

printf("Введите информацию для передачи дочернему процессу " );

// читаем ввод пользователя
fgets(buff, sizeof (buff), stdin);

// передаем данные дочернему процессу 
fprintf(cp, "%s\n", buff);
// "выталкиваем" содержимое буфера в канал 
fflush(cp);

// закрываем канал и проверяем состояние вызова pclose() 
status=pclose(cp); 

if (!WIFEXITED(status)) 
   printf("ошибка при закрытии канала\n");

printf("Завершение работы родительского процесса\n"); 
return 0 ;
}