<?php
ob_start();
include '../config.php';
top('Admin panel');
echo "
<form method='post' action=''>
	<input type='text' name='createCode'>
	<input type='submit' name='goCode'>
</form>
";
if (isset($_POST['goCode']))
{
	mysql_query("INSERT INTO inviteCode SET code='".$_POST['createCode']."', code_creater='admin'");
        echo "Код создан ", $_POST['createCode'];
}
bottom();
ob_flush();
?>