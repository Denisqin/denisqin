<?php
ob_start();
include 'config.php';
top("forYou");
echo "

	<section>
		<h1>Welcome to page for you</h1>
		<h3>Enter you're invite code</h3>
		<form method='post' action=''>
			<input type='text' name='inviteCode'>
			<br>
			<input type='submit' name='inviteCodeSubmit'>
		</form>
	</section>



";
bottom();
ob_flush();
?>