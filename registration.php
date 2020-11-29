<?php include 'registration_backend.php'?>  <!-- backend file included-->
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
</head>
<body>

	<div>
		<h2> Register Here </h2>
	</div>

	<div>
		<form action="registration.php" method="post">
			Username: <input type="text" name="username" value="" required> <br>
			Email   : <input type="email" name="email" value="" required> <br>
			Password: <input type="password" name="password_1" value="" required> <br>
			Confirm Password: <input type="password" name="password_2" value="" required><br>
			<input type="submit" name="register_submit" value="Submit"> <br>
			<p>Already a user <a href="login.php"> Log In </a></p>
		</form>
	</div>

</body>
</html>