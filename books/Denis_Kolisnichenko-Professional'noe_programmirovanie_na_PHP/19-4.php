<?
// ���������� ����� ����. ���� ����.php ������ ����������
// � ����� �������� � ����� ��������� 
require('pop3.php');

// ������ ��� ������������ � ������
$user="dhsilabs";
$password="1234567";

// �� ������������ A���
$apop=0;

// ������� ������ ������ ���� 
$pop3_connection=new pop3_class;

// �������� ������ - localhost. ���� �� �� ���������
// ���� ������ �� �����
// ������, ������ ����������� ������ ���������� ���
// �����-������ ������,
// ��������, pop.mail.ru
$pop3_connection->hostname="localhost";


// ��������� ����������
if(($error=$pop3_connection->Open())=="")

{

  echo "<PRE>���������� � POP3-������� $pop3_connection->hostname.</PRE>\n";

// �������������� - �������� ��� � ������
  if(($error=$pop3_connection->Login($user,$password,$apop))=="")

  {

   echo "<PRE>������������ &quot;$user&quot; ���������������</PRE>\n";

   // �������� ����������
   if(($error=$pop3_connection->Statistics(&$messages,&$size))=="")

   {

    echo "<PRE>� �������� ����� $messages ��������� ����� �������� $size ������</PRE>\n";

// �������� ������ ��������� 
    $result=$pop3_connection->ListMessages("",0);

// ���� ���������� ����� ���������
// ����������-������, ������
// � �������� ����� ���� ���������
    if(GetType($result)=="array")

    {

// ������� ������ ��������� � ������
for(Reset($result),$message=0;$message<count($result);Next($result),$message++)
      echo "<PRE>��������� ",Key($result)," - ",$result[Key($result)]," ������.</PRE>\n";

// �������� �������������� ���������
     $result=$pop3_connection->ListMessages("",1);

// ���� ���������� ����� ��������� ����������-������,
// ������ � �������� ����� ���� ���������
     if(GetType($result)=="array")

     {

// ������� ������ ��������� � ������
for(Reset($result),$message=0;$message<count($result);Next($result),$message++)
       echo "<PRE>��������� ",Key($result),", Unique ID - \"",$result[Key($result)],"\"</PRE>\n";

       
// ���������� ��������� ������ 0
      if($messages>0)

      {

// �������� ������ ��������� ��������� � 1
      for($M=1; $M<=$messages; $M++)
      {
// �������� ��������� � ������� $M (������ 9 ����� ����)
       if(($error=$pop3_connection->RetrieveMessage($M,&$headers,&$body,9))=="")

       {

	    echo "<PRE>��������� $M :\n---���������---</PRE>\n";

    	    for($line=0;$line<count($headers);$line++)
                 echo "<PRE>",HtmlSpecialChars($headers[$line]),"</PRE>";
    	    echo "<PRE>---����� ����������---\n---���������� ���� ���������---</PRE>\n";

            echo "<PRE>";
            for($line=0;$line<count($body);$line++)
                echo "$line: ".HtmlSpecialChars($body[$line])."\n";
            echo "<PRE>---����� ����---</PRE>\n";
 

// �������� ��������� �� ��������
	    if(($error=$pop3_connection->DeleteMessage($M))=="")

        {

         echo "<PRE>��������� $M �������� �� ��������.</PRE>\n";

// ���������� ������ ��������� ��� ��������
//         if(($error=$pop3_connection->ResetDeletedMessages())=="")

//         {

//          echo "<PRE>���������� ������ ��������� ���������� �� ��������.</PRE>\n";

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
//      echo "<PRE>����������� �� POP3-������� &quot;$pop3_connection->hostname&quot;.</PRE>\n";

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

  echo "<H2>������: ",HtmlSpecialChars($error),"</H2>";

?>
