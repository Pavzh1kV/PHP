<?php $pth='friends/simple-chat';include "$pth/incl/users.inc";
?>

<html><head>
<title>-ќсновна€ страница</title>
</head><body>

<!Ч- список в строку -->
<div style="background-color:#cccccc">
<?php whos_online(' '); ?>
</div><br>

<!Ч- список - в колонку -->
<div style="background-соlor:#aaaaaa">
<?php whos_online('<br>'); ?>
</div><br>


</body></html>
