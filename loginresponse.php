<?php 
/* Author: Jeanna Maye E. Benitez
 File: loginresponse.php
 Date: March 14, 2020
 
 Description:
 A PHP File that handles the login responses.
 */
    require_once 'utility.php';
    require_once 'myfuncs.php';
    
    $dbName = "milestone1";
    $usersTableName = "registration";
    $userID = getUserID();
    $user = getUser($dbName, $usersTableName, getUserID());
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Krypto Blogs</title>
    <link rel="icon" href="Images/Krypto Blog Logo.png">
	<link rel="stylesheet" type="text/css" href="loginStyle.css">
	<link rel="stylesheet" type="text/css" href="navbarStyle.css">
	<link rel="stylesheet" type="text/css" href="blog.css">
</head>

<body>
	<div class="row">
  		<div class="leftcolumn">
    		<div class="card">
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
        		<div align="center">
                	<h2>Hello, 
                		<?php 
                		      echo $user;
                		?>!
                	</h2>
                	<p>You have successfully logged in! YAY! :D</p>
                	<p>You are now able to <a href="blogpost.html">create a blog post</a>.</p>
                </div>
            </div>
        </div>
		<div class="rightcolumn" align="center">
    		<div class="card">
    			<h3 align="center">Users:</h3>
        		<?php 
            	   $users = getAllUsers($dbName, $tableName);
                   include '_displayUsers.php';
        	    ?>
    	    </div>
    	</div>
    </div>
</body>
</html>