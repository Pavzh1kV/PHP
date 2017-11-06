<?
echo "<table width=100% border=2 cellspacing=O cellpadding=3
border соlor=$main_color><tr><td>";
echo "<form method=post action=$SCRIPT_NAME>";
echo "<p align=center>Заказчик <input type=text name=client
size=30>";
echo "Адрес <input type=text name=addr size=30>"; 
echo "E-mail <input type=text name=email size=15>"; 
echo "</td></tr></table><p>";

echo "<table width=100% border=2 cellspacing=O cellpadding=3
bordercolor=$main_color><tr><td bgcolor=$main_color><font
color=white>Аппаратное обеспечение</td>";
echo "<td bgcolor=$main_color><font color=white>Программное обеспечение</td></tr>" ;
echo "<tr><td valign=top>";

echo "<р><b>Процессор</b>";
echo "<br><input type=radio name=cpu value=C1 checked>Intel Celeron 1.7 Ghz";
echo "<br><input type=radio name=cpu value=C2>Intel Celeron 2 Ghz";
echo "<br><input type=radio name=cpu value=P4>Intel Pentium 4 2 Ghz";
echo "<br><input type=radio name=cpu value=P42>Intel Pentium 4 2.4 Ghz";

echo "<р><b>Оперативная память (DDR)</b>";
echo "<br><input type=radio name=ram value=256 checked>256 MB";
echo "<br><input type=radio name=ram value=512>512 MB";
echo "<br><input type=radio name=ram value=1024>1024 MB";

?>