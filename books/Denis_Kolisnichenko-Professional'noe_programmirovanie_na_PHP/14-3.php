<?
// устанавливаем соединение с сервером ftp.firma.ru
$conn = ftp_connect("ftp.firma.ru"); 

// передаем имя пользователя и пароль
$result = ftp_login($conn, "pupkin", "123456rt"); 

// зашли на сервер или нет?
if ((!$conn) || (!$result)) { 
        echo "Не возможно соединиться с FTP-сервером!";
        die; 
    } else {
        echo "Успешно подключились к серверу!";
    }

// загружаем файл 
$upload = ftp_put($conn, "report.doc", "/home/den/report.doc", FTP_BINARY); 

// загрузился ли файл?
if (!$upload) { 
        echo "Произошла ошибка при загрузке файла";
    } else {
        echo "Файл успешно загружен на FTP-сервер";
    }

// закрываем FTP-соединение
ftp_close($conn); 
?>