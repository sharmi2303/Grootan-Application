<?php 
session_start();

	include("connection.php");
	include("functions.php");

	//$user_data = check_login($con);

?>
<!--
<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<h1>This is the index page</h1>

	<br>
	Hello, <?php echo $user_data['user_name']; ?>
</body>
</html>
-->

<!DOCTYPE html>
<html>
  <head>
    <title>Grootan Application</title>
    <!--<link rel="stylesheet" href="indexstyle.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="indexstyle.css">
  </head>
  
  <body>

    <div class="container-custom">
      <!--Header Container-->
      <header style="position:relative;">
        <!--Top Header Default-->
       
          <div class="top-header default">
            <!--Header Left-->
            <div class="top-header_left">
              <img class="i1" id="img" src="images/logo4.png" alt="app-logo">
              <button onclick="location.href='about.html';" class="about">About</button>
            </div>

            <!--Header Right-->
            <div class="top-header_right">
              <button onclick="location.href='logout.php';" class="login">Logout</button>
            </div>
          </div>
        

          <div class="row">
            <div class="row" style="padding: 10px;"></div>
          </div>
      </header>
      
      <main class="mainpage-content">
        <div style="position: relative;"><!--heart-->
        <h1 class="theme" >Welcome User<span style="font-size:100%;color:red;">&#10084;&#65039;</span></h1>
        </div>
    <button  onclick="location.href='signup.php';" class="create-account">Create Account</button>

		<div style="position: relative;"><!--heart-->
        <h1 class="theme" >Already Have an Account<span style="color:red;font-size: 100%;">&#10084;&#65039;</span></h1>
        </div>
        <button onclick="location.href='login.php';" class="create-account">LogIn</button>

      </main>
      
    </div>
    <footer>
        <p>&copy; My Website 2021</p>
    </footer>
  </body>
</html>