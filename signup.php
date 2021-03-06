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

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> SignUp Form</title>

</head> 
<body>

<style>
@import url('https://fonts.googleapis.com/css?family=Oswald:400,700');
body
{
	background: #323232;
	margin:0;
	padding: 0;
	font-family: 'Oswald', sans-serif;
	letter-spacing: 1px;
}
section
{
	
	width: 100%;
	height: 100vh;
	background-size: cover;
	 -webkit-animation: mymove 5s infinite; 
    animation: mymove 5s infinite;
}


/* Standard syntax */
@keyframes mymove {
    from {background-color: red;}
    to {background-color: aqua;}
}
.wrap{
	position: absolute;
	top: 25%;
	left: 50%;
	transform: translate(-50%, -50%);
	height: 350px;
	margin-top: 5px;
     padding: 10px;
	
}
.wrap .form_c,.wrap .sign
{
	position: absolute;
	height: 350px;
	float: left;
	top: 100px;
	padding: 10px;
	box-sizing: border-box;
	font-family: sans-serif;
	border: 1px dotted #ff0057;
	box-shadow: -20px 0 15px rgba(0,0,0,.2);
	
}
.wrap .form_c
{
	
	color: #fff;
	width: 380px;
	float: left;
	left: -250px;
}
.wrap .form_c h1
{
	
	color: #fff;
	background: #ff0057;
	border-radius: 25px;
	text-decoration: none;
	box-shadow: 0 5px 10px rgb(0,0,0,.2);
}
.wrap .sign
{
	background: #fff;
	width: 380px;
	height: 720px;
	left: 100px;
	top: -15px;
	padding: 20px;
}


h2,h1
{
	text-align: center;
	color: #fff;
	background: #ff0057;
	padding: 10px;
	border-radius: 25px;
}

::selection {
    color: red; 
    background: yellow;
}
input
{
	
	padding: 10px;
	margin: 5px;
	border: #fff;
}
input[type="text"],input[type="email"],input[type="number"],input[type="password"]
{

	width: 90%;
	box-shadow: -20px 0 15px rgba(0,0,0,.2);
	border: 2px solid rgb(46, 161, 182);
	box-sizing: border-box;
	border-radius: 25px;
	color: black;
}
input[type=submit]
{
	width: 95%;
	color: #fff;
	background: #ff0057;
	cursor: pointer;
	font-size: 18px;
	font-weight: bold;
	border-radius: 25px;
	border: 2px solid #73AD21;
}
input[type=submit]:hover
{
	background: rgb(46, 161, 182);
	border: 2px solid rgba(46, 161, 182);
	border-radius: 25px
}

select
{
	padding: 10px;
	width: 32%;
	border-radius: 25px;
}
h2::after {

    content: ""

}
.wrap .form_c h1::after {

    content: url("images/admin.jpeg");

}
body {
  background-image: linear-gradient(to right,dodgerblue,aqua,#80ced6); 
}


input:focus:invalid {
  outline: none;
}
input:valid {
    color: green;
}

</style>

	<section>
	<div class="wrap">
		<div class="form_c">
					<h1>welcome!!!</h1>
						
				</div>
     <div class="sign">
	<form id="myform"  method="POST" >
		<h2>Create Your Account</h2>
		<input type ="text" id="name" name="fullname" placeholder="Your Name" minlength="5" max="12" required="name" /><br />
		<input type ="email" id="email" name="email" placeholder="Your Email" required="email" /><br />
         <br />
		 <input type ="text" id="uname" name="user_name" placeholder="User Name" minlength="5" max="6" required="uname" /><br />
         <input type ="password" id="pw1" name="password" placeholder="Password"  required="" /><br />
		<input type ="password" id="pw2" name="conformpassword" placeholder="Conform Password" required=""  />
		<br />
         <br />
         <input type="submit" id="submit" name="submit" value="submit" />
    </form>	
   
    </div>
</div>

</section>
</body>
</html>
