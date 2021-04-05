<?php
  require_once("ConnectToDb.php");
	// Create connection

    if ($_POST) {

        $email = $_POST['email'];
        $pass = $_POST['password'];

      $conn = new mysqli($servername, $username, $password,$dbname);
      $query = "SELECT * FROM User_Details
            WHERE username = '".$email." '
            AND password = '".$pass."'";
      //echo $query2;
        $result = mysqli_query($conn, $query) or die('error getting data');
        $count = mysqli_num_rows($result);
        //echo $count;
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $usrID = $row['user_id'];
            $uname = $row['username'];
            //echo $usrID;
        }
        if ($count == 1){

         $query2 = "SELECT * FROM User_Role
            WHERE user_id = '".$usrID." '";

      //echo $query2;
        $result = mysqli_query($conn, $query2) or die('error getting data');
        $count = mysqli_num_rows($result);
        //echo $count;
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $roleID = $row['role_id'];
            //echo $usrID;
        }
         $_SESSION['userid'] = $uname;
        if($roleID == 1){
            header('Location:http://axt1312.uta.cloud/WDMProject/SubdivisionDashboard.html');
            exit;
        }
        if($roleID == 2){
            header('Location:http://axt1312.uta.cloud/WDMProject/BuildingDashboard.html');
            exit;
        }
        if($roleID == 3){
            header('Location:http://axt1312.uta.cloud/WDMProject/ApartmentDash.html');
            exit;
        }
        if($roleID == 4){
            header('Location:http://axt1312.uta.cloud/WDMProject/SuperUserDash.html');
            exit;
        }
        //echo "Login Credentials verified";

        //echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";

        }else{
            //echo "Invalid Login Credentials";
        echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
        }



    }

?>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="CSS/YouareonDefault.css">
	<script type="text/javascript" src="signup.js">

	</script>
	<title>YouareOnDefault</title>
</head>
<body id="wrapper">
<div class="bgrndimage"></div>
<div class="logo">  <h1>YouareOnDefault</h1> </div>

<div class="main">


				<h2>Login</h2>

				<p>Required information is marked with an asterisk (*)</p>
				<br>
				<form method="POST" action="">
					<table id="loginform">
						<tr>
							<td style="color:white;"> * E-mail: </td>
							<td>
								<input id="em" type="text" name="email" required>
							</td>
						</tr>
						<tr>
							<td style="color:white;"> * Password: </td>
							<td>
								<input id="pass" type="password" name="password" required>
							</td>
						</tr>

					</table>

					<input class="submitbtn" type="submit" name="submit" value="Login"  >

				</form>
</div>

<footer>
	<p>YouareOnDefault<br>
	<a href="ContactUs.php">Contact Us</a>&nbsp;<a href="WhyUs.html">Why Us</a>&nbsp;<a href="http://axt1312.uta.cloud/">Blog</a></p>
</footer>
</body>
</html>
