<?php
ob_start();
include '../config.php';
top('Admin panel');
$query = mysql_query("SELECT user_admin='1' FROM users WHERE user_login='".mysql_real_escape_string($_SESSION['login'])."'");
if (mysql_result($query, 0) > 0) {
	echo "
<form method='post' action=''>
	<input type='text' name='createCode'>
	<input type='submit' name='goCode'>
</form>
";
echo $_SESSION['login'];
if (isset($_POST['goCode']))
{
	mysql_query("INSERT INTO inviteCode SET code='".$_POST['createCode']."', code_creater='".mysql_real_escape_string($_SESSION['login'])."'");
        echo "Код создан ", $_POST['createCode'];
}
}
else {
	header('Location: ../error.php');
}
bottom();
ob_flush();
?>