<?php
function top($title)
{
	echo "
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset='utf-8'>
			<title>".$title."</title>
			<link rel='stylesheet' type='text/css' href='css/style.css'>
			<link rel='stylesheet' type='text/css' href='css/font-awesome.min.css'>
		</head>
		<body>

	";
};
function bottom()
{
	echo "
		</body>
		</html>
	";
};
mysql_connect("localhost", "root", "");

?>