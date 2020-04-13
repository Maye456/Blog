<?php 
/* Author: Jeanna Maye E. Benitez
 File: whoami.php
 Date: April 01, 2020
 
 Description:
 A PHP File that handles the who am I page
 */
    require_once 'session.php';
    require_once 'myfuncs.php';
    require_once 'utility.php';
    
    $dbName = "milestone1";
    $tableName = "registration";
    $userID = getUserID();
    $user = getUser($dbName, $tableName, $userID);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Krypto Blogs</title>
	<link rel="icon" href="Images/Krypto Blog Logo.png">
	<link rel="stylesheet" type="text/css" href="loginStyle.css">
	<link rel="stylesheet" type="text/css" href="navbarStyle.css">
</head>

<body>
	<div align="center" class="container">
		<table border="0" align="center">
			<tr>
				<td>
					<img src="Images/logo2.png" alt="logo" width="225px" height="225px">
				</td>
				<td>
					<header id="header">
						<h1 style="color:black;"><font size="10">Krypto Blogs</font></h1>
					</header>
				</td>
			</tr>
		</table>
	<hr>
		<div class="topnav">
	    	<a href="index.html">Home</a>
	    	<a class="active" href="whoami.php">Who Am I?</a>
	    	<a href="blogpost.html">Create A Blog Post</a>
	    	<a href="makeBlogRequest.php">List Blogs</a>
	    	<a href="registration.html">Register</a>
	    	<a href="login.html">Login</a>
    		<a href="searchBlogs.html">Search Blogs</a>
		</div>
	<hr>
		<div align="center">
			<h1>Who Am I...</h1>
		</div>
		
		<div align="center">
        	<h2>Hello My Name Is: 
        		<?php 
        		  echo $user;
        		?> 
        	</h2>
        </div>
    </div>
</body>
</html>