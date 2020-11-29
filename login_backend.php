<?php
//starting the session for login page
if(isset($_POST['username']))
{
	session_start();

	//connect to database
	$handle=mysqli_connect("localhost","root","user123","user_registration_project") or die("not able to connect to the database");

	//initialize variables
	$username=mysqli_real_escape_string($handle,$_POST['username']);
	$password_1=mysqli_real_escape_string($handle,$_POST['password_1']);

	//checking for errors
	$password=md5($password_1);//encrypting the password because table has encrytped version
	$query="Select * from user where username='$username' && password='$password'";
	$results=mysqli_query($handle,$query);


	if(mysqli_num_rows($results))
	{

		$_SESSION['username']=$username;
		$_SESSION['success']=1;
		header("location: Homepage.php");
	}
	else
	{
		echo "username or password incorrect!\n";
	?>
		<p> <a href="login.php"> Try Again </a> </p> <!--<p></p> and <a></a> tags require to be in <html></html> so when we 													include this file in "login.php" we would write the include statement in													between <html></html>.Also note this line is not a part of <?php...?>-->

	<?php } 
}	?>