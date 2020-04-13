<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Failed Page</title>
	<link rel="icon" href="Images/Krypto Blog Logo.png">
	<link rel="stylesheet" type="text/css" href="loginStyle.css">
	<link rel="stylesheet" type="text/css" href="navbarStyle.css">
</head>

<body>
	<div class="container">	
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
			<h2><?php echo $message ?></h2>
			<p></p>
		</div>
	</div>
</body>
</html>