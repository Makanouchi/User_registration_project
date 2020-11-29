<?php
//starting session on this page
if(isset($_POST['username']))
{
	session_start();


	//connecting to the database
	$handle= mysqli_connect("localhost","root","user123","user_registration_project") or die("cannot connect to the database");

	//initialize variables (without escape characters) which will be used in this backend file
	$username=mysqli_real_escape_string($handle,$_POST['username']);
	$email= mysqli_real_escape_string($handle,$_POST['email']);
	$password_1= mysqli_real_escape_string($handle,$_POST['password_1']);
	$password_2=mysqli_real_escape_string($handle,$_POST['password_2']);
	$errors=array();

	//checking for errors and storing them in errors array 
	if($password_2!=$password_1) array_push($errors,"The confirm password didn't match");
	$query="Select * from user where username='$username' or email='$email' Limit 1;";// we need only one match 
	$results= mysqli_query($handle,$query);
	$row= mysqli_fetch_assoc($results); //it makes the results into an array(associative array to be specefic means map)
	//echo "count of errors is 1- ".count($errors)."\n";
	if($row)
	{
		// echo "count of errors is 2- ".count($errors)."\n";
		if($username==$row['username'] && $email==$row['email']) array_push($errors,"Both email and username already taken");
		else if($username==$row['username']) array_push($errors,"Username already taken");
		else array_push($errors,"Email already registered"); 
		//echo "count of errors is 3- ".count($errors)."\n";
	}
	if(count($errors)==0)//here it means that query yielded nothing we just have to check if there are no errors
	{
		$password=md5($password_1);
		$query="Insert into user(username,email,password) Values('$username','$email','$password');";
		$results=mysqli_query($handle,$query);
		$_SESSION['username']=$username;
		$_SESSION['success']=1;

		header("location: Homepage`.php");
	}
	else//deals with errors for register type errors
	{
		//echo "count of errors is 4- ".count($errors)."\n";
		foreach($errors as $error)
		{
			echo "$error\n";
		}
	?>
		<p><a href="registration.php"> Try Again <a></p>   <!--note its not a part of php code-->

	<?php }
} ?>