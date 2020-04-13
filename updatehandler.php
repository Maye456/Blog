<!DOCTYPE html>
<!-- 
	Author: Jeanna Maye E. Benitez
	File: updateHandler.php
	Date: March 31, 2020
	
	Description: 
	A PHP file to handle updating a post
 -->
<html>
	<head>
	<meta charset="UTF-8">
	<title>Krypto Blogs</title>
	<link rel="icon" href="Images/Krypto Blog Logo.png">
	<link rel="stylesheet" type="text/css" href="postStyle.css">
	<link rel="stylesheet" type="text/css" href="navbarStyle.css">
	<link rel="stylesheet" type="text/css" href="blog.css">
</head>

<body>
<?php
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Requires
include('session.php');
include('myfuncs.php');
include('utility.php');

// Global Variables & Constants
$dbName = "milestone1";
$usersTableName = "registration";
$postTableName = "posts";
$userID = getUserID();
$user = getUser($dbName, $usersTableName, getUserID());
$postID = $_POST['postID'];
$content = $_POST['content'];
?>

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
	    	<a href="whoami.php">Who Am I?</a>
	    	<a href="blogpost.html">Create A Blog Post</a>
	    	<a href="makeBlogRequest.php">List Blogs</a>
	    	<a href="registration.html">Register</a>
	    	<a href="login.html">Login</a>
	    	<a href="searchBlogs.html">Search Blogs</a>
		</div>
	<hr>
		<div>
			<h3>Thank you for your update, <?php echo $user ?>! </h3>
			<?php 
			updateBlog($dbName, $postTableName, $postID, $userID, $content);
			?>
		</div>
	</div>
</body>
</html>