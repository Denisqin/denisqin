<?php
ob_start();
include 'config.php';
top("Registration");
echo "
	<section>
		<h1>InviteCode correct</h1>
		<br>
		<p>Sign up</p>
		<form method='post' action='' class='signin'>
			<input type='text' name='login' autocomplete='off'>
			<br>
			<input type='password' name='password' autocomplete='off'>
			<br>
			<input type='email' name='email' autocomplete='off'>
			<button><i class='fa fa-arrow-right' aria-hidden='true'></i></button>
		</form>
	</section>
";
if(isset($_POST['password']))

{

    $err = array();


    # проверям логин

    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))

    {

        $err[] = "Логин может состоять только из букв английского алфавита и цифр";

    }

    

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)

    {

        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";

    }

    

    # проверяем, не сущестует ли пользователя с таким именем

    $query = mysql_query("SELECT COUNT(user_id) FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."'");

    if(mysql_result($query, 0) > 0)

    {

        $err[] = "Пользователь с таким логином уже существует в базе данных";

    }

    # Валидация email 
    $email = $_POST['email'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $err[] = "Введите корректный e-mail";
}
 $query = mysql_query("SELECT COUNT(user_id) FROM users WHERE user_email='".mysql_real_escape_string($_POST['email'])."'");
 if(mysql_result($query, 0) > 0)

    {

        $err[] = "Пользователь с таким email уже существует в базе данных";

    }

    #Валидация пароля
    if(strlen($_POST['password']) < 3 or strlen($_POST['password']) > 30)

    {

        $err[] = "Пароль должен быть не меньше 3-х символов и не больше 30";

    }

    # Если нет ошибок, то добавляем в БД нового пользователя

    if(count($err) == 0)

    {
        $login = $_POST['login'];
        $admin = 0;


        # Убераем лишние пробелы и делаем двойное шифрование

        $password = md5(md5(trim($_POST['password'])));

        $email = $_POST['email'];

        

        mysql_query("INSERT INTO users SET user_login='".$login."', user_password='".$password."', user_email='".$email."'");
        echo "Успешная регистрация";
        header( 'Location: ../index.php' );
       

    }

    else

    {

        print "<b>При регистрации произошли следующие ошибки:</b><br>";

        foreach($err AS $error)

        {

            print $error."<br>";

        }

    }

}

bottom();
ob_flush();
?>