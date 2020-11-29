<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>

	<div>
		<h2> Login Here </h2>
	</div>
		
	<div>
		<form action="login.php" method="post">
			Username: <input type="text" name="username" value="" required> <br>
			Password: <input type="password" name="password_1" value="" required> <br>
			<input type="submit" name="login_submit" value="Log In"> <br>
			<p>Not a user <a href="registration.php"> Register Here </a></p>
		</form>
	</div>
	<?php include 'login_backend.php'?>
</body>
</html>