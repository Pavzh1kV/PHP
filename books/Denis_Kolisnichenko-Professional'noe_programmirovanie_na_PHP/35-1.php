<?php
$word = new COM("word.application") or die("Невозможно вызвать
WordApp");
print "Word is running, version {$word->Version}\n</br>";
// Отображаем окно Word'a
$word->Visible=l;
// Создаем новый документ
$word->Documents->Add();
// Вводим текст
$word->Selection->TypeText("This is a test...");
// Сохраняем документ
$word->Documents[1]>SaveAs("test_com_php.doc");
// Закрываем окно
$word->Quit();
?>