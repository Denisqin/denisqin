<?php
ob_start();
include 'config.php';
top("forYou");
echo "

	<section>
		<h1>Welcome to page for you</h1>
		<br>
		<p>Sign In</p>
		<form method='post' action='' class='signin'>
			<input type='text' name='inviteCode' autocomplete='off'>
			<br>
			<input type='text' name='inviteCode' autocomplete='off'>
			<button><i class='fa fa-arrow-right' aria-hidden='true'></i></button>
		</form>
		<br>
		<p>Or if you don't registreted</p>
		<br>
		<p>Enter you're invite code</p>
		<form method='post' action='' class='inviteCode'>
			<input type='text' name='inviteCode' autocomplete='off'>
			<button><i class='fa fa-arrow-right' aria-hidden='true'></i></button>
		</form>
	</section>
";
if(isset($_POST['inviteCode']))
{
	 $query = mysql_query("SELECT COUNT(code_id) FROM inviteCode WHERE code='".mysql_real_escape_string($_POST['inviteCode'])."'");

    if(mysql_result($query, 0) > 0)

    {

        echo "good";
        mysql_query("DELETE FROM inviteCode WHERE code='".mysql_real_escape_string($_POST['inviteCode'])."'");

    }
}
if(isset($_POST['submit']))

{

    # Вытаскиваем из БД запись, у которой логин равняеться введенному

    $query = mysql_query("SELECT user_id, user_password FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."' LIMIT 1");

    $data = mysql_fetch_assoc($query);

    

    # Соавниваем пароли

    if($data['user_password'] === md5(md5($_POST['password'])))

    {
    	session_start();
    	$_SESSION['login'] = $_POST['login'];
    	$ulogin = $_SESSION['login'];
        echo'Добро пожаловать'.$ulogin.'Вы уже тут';
        header('Location: ../user/panel.php');

    }

    else

    {

        print "Вы ввели неправильный логин/пароль";

    }
}


bottom();
ob_flush();
?>