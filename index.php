<?php
ob_start();
include 'config.php';
top("forYou");
echo "

	<section>
		<h1>Welcome to page for you</h1>
		<br>
		<h3>Sign In</h3>
		<form method='post' action='' class='signin'>
			<input type='text' name='inviteCode' autocomplete='off'>
			<button><i class='fa fa-arrow-right' aria-hidden='true'></i></button>
		</form>
		<br>
		<h3>Enter you're invite code</h3>
		<form method='post' action='' class='inviteCode'>
			<input type='text' name='inviteCode' autocomplete='off'>
			<button><i class='fa fa-arrow-right' aria-hidden='true'></i></button>
		</form>
	</section>



";

bottom();
ob_flush();
?>