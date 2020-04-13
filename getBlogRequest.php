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
$tableName = "registration";
$userID = getUserID();
$postID = $_GET['postID'];
$title = $_GET['title'];
$content = $_GET['content'];
$userID_PostBy = $_GET['userID_PostBy'];   	
?>    
	
<!DOCTYPE html>
<!-- 
	Author: Jeanna Maye E. Benitez
	File: getBlogRequest.php
	Date: March 31, 2020
	
	Description: 
	A PHP file to get blog requests
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
    	<form action="updatehandler.php" method="POST">
    		<p>
    			<label>Title</label> <br> 
    			<input type="text" name="title" maxlength="50" size="50" readonly value="<?php echo $title; ?>" >
    		</p>
    		<p>
    			<label>Author</label> <br> 
    			<input type="text" name="author" maxlength="50" size="50" readonly value="<?php 
    			echo getUser($dbName, $tableName, $userID_PostBy); ?>" >
    		</p>
    		<p>
    			<label>Content</label> <br>
    			<textarea name="content" rows="10" cols="50" > <?php echo $content; ?> </textarea>
    		</p>
    		<input type="text" name="postID" maxlength="11" size="11" hidden value="<?php echo $postID; ?>">
    		
    		<input type="submit" name="submit" value="Update">
    		<button>
                <a href="deletehandler.php?postID=<?php echo $postID; ?>" style=’text-decoration: none;’>Delete</a>
            </button>	
    	</form>
	</div>
</body>
</html>