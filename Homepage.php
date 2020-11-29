<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
</head>
<body>
	<?php
	//check if he has logged out or not.
		session_start();
		
		if(isset($_GET['logout']))
		{
			//before session destroy we need to destroy session id cookie on user's browser because session_destroy doesn't destroy it
			if (ini_get("session.use_cookies")) 
			{ 
    			$params = session_get_cookie_params(); 
    			setcookie(session_name(), '', time() - 42000, 
        		$params["path"], $params["domain"], 
        		$params["secure"], $params["httponly"] 
    			); 
    		}
    		session_destroy();
    		header("location: login.php");
		}
	//see that someone who has not logged in is not coming here directly using URL
		if(!isset($_SESSION['success']))
		{
			echo "You need to login to access this page\n";

	?>
			<p><a href="login.php"> Login Here </a></p>

	<?php
		}
		else
		{
			//unset($_SESSION['success']);
	?>
		<p> You have logged in successfully!</p>
		<h3> Welcome to our website <strong><?php echo $_SESSION['username']; ?></strong> </h3>
		<button><a href="Homepage.php?logout='1'">Log Out</a></button> <!-- logout='1' is saying we use 'get' method -->
	<?php
		}
	?>


</body>
</html>