<?

// ������� ������ ����� Line
$myLine = new Java("Line");
echo "<br>Line created at (0,0,0,0) ... ";
// ������������� ����������
echo $myLine->setCoordinates(5,5,7,77);
// ������� Hello World
echo $myLine->sayHello();
?>