<?php
$word = new COM("word.application") or die("���������� �������
WordApp");
print "Word is running, version {$word->Version}\n</br>";
// ���������� ���� Word'a
$word->Visible=l;
// ������� ����� ��������
$word->Documents->Add();
// ������ �����
$word->Selection->TypeText("This is a test...");
// ��������� ��������
$word->Documents[1]>SaveAs("test_com_php.doc");
// ��������� ����
$word->Quit();
?>