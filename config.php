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

?>