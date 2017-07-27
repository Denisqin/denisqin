<?php
ob_start();
include '/config.php';
top('Control Panel');
if ($_SESSION['login']) {
	echo '
		<h1>Welcome, '.$_SESSION['login'].' to control panel!</h1>

	';
	$query = mysql_query("SELECT user_admin='1' FROM users WHERE user_login='".mysql_real_escape_string($_SESSION['login'])."'");
	if (mysql_result($query, 0) > 0) {
			echo "
	<h1>Generate inviteCode</h1>
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
}
else {
	header('location: ../index.php');
}
bottom();
ob_flush();
?>