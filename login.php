<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: database.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="loginstyle.css">
</head>
<body>



	
	<section>
			<div class="container">
				<div class="login_form">
					<h1>Welcome!!!</h1>
					<form  method="POST">
 
						<label>USER NAME</label>
						
						<input type="text" name="user_name" required="" placeholder="UserName"/>
						
						<br>
						<label>PASSWORD</label>
						<input type="password" name="password" required="" placeholder="PassWord" />
						<input type="submit" name="" value="LOGIN">
						<br/>
						<label>-----------------------or----------------------</label>
						<br/><br/>
						<input type="button" value="create a new account" onclick="location.href='signup.php';"></button>
						<!--<button type="submit" onclick="location.href='register.html';">create a new account</button>-->
					</form>
				</div>
			</div>

	</section>

</body>
</html>