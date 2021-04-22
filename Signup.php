<?php
  require_once("ConnectToDb.php");
	// Create connection

    if ($_POST) {

    $ch = $_POST['choice'];
    $pref = $_POST['preference'];
    $ownerType ="";
    $ownerof="";
    $conn = new mysqli($servername, $username, $password,$dbname);
    if($ch == 'Subdivision'){
        $sql = "SELECT subdivision_id, subdivision_name FROM Subdivision WHERE subdivision_name='".$pref."'";
        $result = mysqli_query($conn, $sql) or die('error getting data');
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
          $ownerof = $row['subdivision_id'];
          $ownerType = "Subdivision Owner";
        }
    }
    if ($ch == 'Building') {
        $sql = "SELECT building_id,building_name FROM Building WHERE building_name='".$pref."'";
        $result = mysqli_query($conn, $sql) or die('error getting data');
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
          $ownerof = $row['building_id'];
          $ownerType = "Building Owner";
        }
    }
    if ($ch == 'Apartment') {
        $sql = "SELECT apartment_id,apartment_name FROM Apartment WHERE apartment_name='".$pref."'";
        $result = mysqli_query($conn, $sql) or die('error getting data');
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
          $ownerof = $row['apartment_id'];
          $ownerType = "Apartment Owner";
        }
    }

  $addr .=$_POST['strtadr1'] ."".$_POST['strtadr2'] ."".$_POST['city'] ."".$_POST['state']."".$_POST['zipcode']."".$_POST['Country'];
  //echo $addr;

  $query = "insert into User_Details (owner_of,firstname, lastname, username, password, email,
   phone, address) values ('".$ownerof."',
   '".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['email']."',
   '".$_POST['password']."', '".$_POST['email']."', '".$_POST['num']."',
   '".$addr."')";
   if (mysqli_query($conn, $query)) {
     //echo "New record created successfully";
   } else {
     echo "Error: " . $query . "<br>" . mysqli_error($conn);
   }
   $query2 = "select * from User_Details WHERE username='".$_POST['email']."'";
   $result = mysqli_query($conn, $query2) or die('error getting data');
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    $usrID = $row['user_id'];
    //echo $usrID;
  }
  $queryRole = "select * from Role";
   $result = mysqli_query($conn, $queryRole) or die('error getting data');
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        if($ownerType ==  $row['role_name']){
                $roleId = $row['role_id'];

        }

  }

  $queryUserRole = "INSERT INTO User_Role (user_id,role_id)
    VALUES (?,?)";
    $stmt = $conn->prepare($queryUserRole);
    $stmt->bind_param("ii", $usrID, $roleId);
  if ($stmt->execute()) {
     //echo "New record created successfully";
  } else {
     echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }



    if(isset($_POST['email'])){
        $email = $_POST['email'];
        if($email == ''){
          unset($email);
        }
      }
      if(isset($_POST['password'])){
        $password = $_POST['password'];
        if($password == ''){
          unset($password);
        }
      }

      $to = $_POST['email'];

      $subject = "This is subject";

      $message = 'Thanks for registering with YouareOnDefault. Your email id is: '.$email.'   and password is:'.$password.'';

      $header = "From:ashwinitrale8@gmail.com \r\n";
      $header .= "MIME-Version: 1.0\r\n";
      $header .= "Content-type: text/html\r\n";

      $sendemail = mail ($to,$subject,$message,$header);
      if( $sendemail == true ) {
        //echo "true";
        //header('Location: HomePage.html');
        header("Location:http://axt1312.uta.cloud/WDMProject/HomePage.php");
        //exit();
      }else {
        echo "Message could not be sent...";
      }

    }

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="CSS/YouareonDefault.css">

	<title>YouareOnDefault</title>
  <script type="text/javascript">

    function reloadData(){
        document.getElementById("firstname").value = getSavedValue("firstname");    // set the value to this input
        document.getElementById("lastname").value = getSavedValue("lastname");
        document.getElementById("email").value = getSavedValue("email");
        document.getElementById("pwd").value = getSavedValue("pwd");
        document.getElementById("cnpass").value = getSavedValue("cnpass");   // set the value to this input
        document.getElementById("strtadr1").value = getSavedValue("strtadr1");
        document.getElementById("strtadr2").value = getSavedValue("strtadr2");
        document.getElementById("city").value = getSavedValue("city");
        document.getElementById("count").value = getSavedValue("count");
        document.getElementById("state").value = getSavedValue("state");
        document.getElementById("zipcode").value = getSavedValue("zipcode");
        document.getElementById("code").value = getSavedValue("code");
        document.getElementById("num").value = getSavedValue("num");
        document.getElementById("ch").value = getSavedValue("ch");
        localStorage.clear();
        }

</script>
</head>
<body onload="reloadData()">

<div class="bgrndimage"></div>
<div class="logo">  <h1>YouareOnDefault</h1> </div>

<div class="register" >


				<h2>Registration Form</h2>

				<p>Please Fill out the given details</p>
				<br>
				<form  method="POST" action="" onsubmit="return confirmPass(); ">
					<table id="registerform">
						<tr><td> Full Name: </td></tr>
						<tr>
							<td>
								<input type="text" name="firstname" id="firstname" pattern="[a-zA-Z]+" title ="This field must contain characters only." placeholder="First Name" required onkeyup="saveValue(this)">
								<input type="text" name="lastname" id="lastname" pattern="[a-zA-Z]+" title ="This field must contain characters only." placeholder="Last Name" required  onkeyup="saveValue(this)">
							</td>
						</tr>
						<tr>
							<td> E-mail: </td>
						</tr>
						<tr>
							<td>
								<input type="email" size="30%" name="email" id="email" title = "Please provide a valid email address."  pattern = "^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" placeholder="ex@example.com" required onkeyup="saveValue(this)">
							</td>
						</tr>
						<tr>
							<td> Password: </td>
						</tr>
						<tr>
							<td>
								<input type="password" name="password" id="pwd" title="Password must contain at least 6 characters, including UPPER/lowercase and numbers." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Password" required onkeyup="saveValue(this)">
							</td>
						</tr>
						<tr>
							<td> Confirm Password: </td>
						</tr>
						<tr>
							<td>
								<input type="password" name="confpassword" id="cnpass" title="Please enter the same Password as above." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"placeholder="Re-enter Password" required onkeyup="saveValue(this)">
							</td>
						</tr>
						<tr><td> Address: </td></tr>
						<tr>
							<td>
								<input type="text" size="40%" name="strtadr1" id="strtadr1" placeholder="Street Address Line 1" onkeyup="saveValue(this)" >
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" size="40%" name="strtadr2" id="strtadr2" placeholder="Street Address Line 2" onkeyup="saveValue(this)">
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" size="20%" name="city" id="city" pattern="[a-zA-Z]+" title ="This field must contain characters only." placeholder="city" required onkeyup="saveValue(this)">
								<input type="text" size="20%" name="state" id="state" pattern="[a-zA-Z]+" title ="This field must contain characters only." placeholder="State/Province" required onkeyup="saveValue(this)">
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" size="20%" name="zipcode" id="zipcode" pattern="^(0|[1-9][0-9]*)$" placeholder="Postal/Zip" required onkeyup="saveValue(this)">
								<select name="Country" id="count" placeholder="Country" required onchange="saveValue(this)">
									<option disabled selected value> -- select an option -- </option>
									<option value="usa">USA</option>
									<option value="uk">UK</option>
									<option value="ind">India</option>
									<option value="ch">China</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<input type="text"size="10%" name="code" id="code" pattern="^(0|[1-9][0-9]*)$" placeholder="Country code" required size="2" onkeyup="saveValue(this)">
								-
								<input type="text" name="num" id="num"  pattern ="^\d{10}$" placeholder="Phone Number" required size="10" onkeyup="saveValue(this)">
							</td>
						</tr>
						<tr><td> What do you want to sign up for </td></tr>
						<tr>
							<td>
								<select name="choice" id="ch" onChange="getSelectValue(this)">
									<option disabled selected value> -- select an option -- </option>
									<option value="Subdivision">Subdivision</option>
									<option value="Building">Building</option>
									<option value="Apartment">Apartment</option>
								</select>
							</td>
						</tr>
						<tr><td> Your Preference </td></tr>
						<tr>
							<td>
								<select name="preference" id="pref">
                  <?php
                      @$choice=$_GET['ch'];
                      $conn = new mysqli($servername, $username, $password,$dbname);
                        if($choice == 'Subdivision'){
                            $sql = "SELECT subdivision_name FROM Subdivision";
                            $result = mysqli_query($conn, $sql) or die('error getting data');
                            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                                echo "<option value='".$row['subdivision_name']."'>".$row['subdivision_name']."</option>";
                            }
                        }
                        if ($choice == 'Building') {
                            $sql = "SELECT building_name FROM Building";
                            $result = mysqli_query($conn, $sql) or die('error getting data');
                            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                                echo "<option value='".$row['building_name']."'>".$row['building_name']."</option>";
                            }
                        }
                        if ($choice == 'Apartment') {
                            $sql = "SELECT apartment_name FROM Apartment";
                            $result = mysqli_query($conn, $sql) or die('error getting data');
                            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                                echo "<option value='".$row['apartment_name']."'>".$row['apartment_name']."</option>";
                            }
                        }

                      ?>
                    </select>
							</td>
						</tr>
					</table>
					<input class="submitbtn"  id="signup" type="submit" name="submit" value="Sign Up">
				</form>
</div>
<footer>
	<p>YouareOnDefault<br>
	<a href="ContactUs.php">Contact Us</a>&nbsp;<a href="WhyUs.php">Why Us</a>&nbsp;<a href="http://axt1312.uta.cloud/">Blog</a></p>
</footer>
<script type="text/javascript" src="signup.js">

</script>
</body>
</html>
