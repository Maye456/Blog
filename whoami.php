<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Who Am I</title>
</head>

<body>
	<h2>Hello My Name Is: 
		<?php 
		  require_once 'myfuncs.php';
		  include 'session.php';
		  echo " " . getUserID();
		?> 
	</h2>
	<br>
</body>
</html>