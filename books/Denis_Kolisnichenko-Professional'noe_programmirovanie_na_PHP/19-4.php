<?
// Подключаем класс рорЗ. Файл рорЗ.php должен находиться
// в одном каталоге с нашим сценарием 
require('pop3.php');

// Задаем имя пользователя и пароль
$user="dhsilabs";
$password="1234567";

// Не использовать AРОР
$apop=0;

// Создаем объект класса РОРЗ 
$pop3_connection=new pop3_class;

// Почтовый сервер - localhost. Если вы не настроили
// РОРЗ сервер на своей
// машине, можете попробовать сервер провайдера или
// какой-нибудь другой,
// например, pop.mail.ru
$pop3_connection->hostname="localhost";


// Открываем соединение
if(($error=$pop3_connection->Open())=="")

{

  echo "<PRE>Подключены к POP3-серверу $pop3_connection->hostname.</PRE>\n";

// Регистрируемся - передаем имя и пароль
  if(($error=$pop3_connection->Login($user,$password,$apop))=="")

  {

   echo "<PRE>Пользователь &quot;$user&quot; зарегистрирован</PRE>\n";

   // Получаем статистику
   if(($error=$pop3_connection->Statistics(&$messages,&$size))=="")

   {

    echo "<PRE>В почтовом ящике $messages сообщений общим размером $size байтов</PRE>\n";

// Получаем список сообщений 
    $result=$pop3_connection->ListMessages("",0);

// Если предыдущий вызов возвратил
// переменную-массив, значит
// в почтовом ящике есть сообщения
    if(GetType($result)=="array")

    {

// Выводим номера сообщений и размер
for(Reset($result),$message=0;$message<count($result);Next($result),$message++)
      echo "<PRE>Сообщение ",Key($result)," - ",$result[Key($result)]," байтов.</PRE>\n";

// Получаем идентификаторы сообщений
     $result=$pop3_connection->ListMessages("",1);

// Если предыдущий вызов возвратил переменную-массив,
// значит в почтовом ящике есть сообщения
     if(GetType($result)=="array")

     {

// Выводим номера сообщений и размер
for(Reset($result),$message=0;$message<count($result);Next($result),$message++)
       echo "<PRE>Сообщение ",Key($result),", Unique ID - \"",$result[Key($result)],"\"</PRE>\n";

       
// Количество сообщения больше 0
      if($messages>0)

      {

// Получаем каждое сообщение нумерация с 1
      for($M=1; $M<=$messages; $M++)
      {
// получаем сообщение с номером $M (только 9 строк тела)
       if(($error=$pop3_connection->RetrieveMessage($M,&$headers,&$body,9))=="")

       {

	    echo "<PRE>Сообщение $M :\n---Заголовки---</PRE>\n";

    	    for($line=0;$line<count($headers);$line++)
                 echo "<PRE>",HtmlSpecialChars($headers[$line]),"</PRE>";
    	    echo "<PRE>---Конец заголовков---\n---Начинается тело сообщения---</PRE>\n";

            echo "<PRE>";
            for($line=0;$line<count($body);$line++)
                echo "$line: ".HtmlSpecialChars($body[$line])."\n";
            echo "<PRE>---Конец тела---</PRE>\n";
 

// помечаем сообщение на удаление
	    if(($error=$pop3_connection->DeleteMessage($M))=="")

        {

         echo "<PRE>Сообщение $M помечено на удаление.</PRE>\n";

// сбрасываем список сообщений для удаления
//         if(($error=$pop3_connection->ResetDeletedMessages())=="")

//         {

//          echo "<PRE>Сбрасываем список сообщений помеченных на удаление.</PRE>\n";

//         }

        }

       }
 // if 
       } // for
      }
 // if ($messages>0)
      
      if($error==""
 && ($error=$pop3_connection->Close())=="")
 {
//      echo "<PRE>Отключаемся от POP3-сервера &quot;$pop3_connection->hostname&quot;.</PRE>\n";

      }
  
     }

     else

      $error=$result;

    }

    else

     $error=$result;

   }

  }

}

if($error!="")

  echo "<H2>Ошибка: ",HtmlSpecialChars($error),"</H2>";

?>
