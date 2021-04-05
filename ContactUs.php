<?php
  require_once("ConnectToDb.php");
	// Create connection
    if ($_POST) {

    if(isset($_POST['email'])){
        $email = $_POST['email'];
        if($email == ''){
          unset($email);
        }
      }
      if(isset($_POST['message'])){
        $msg = $_POST['message'];
        if($msg == ''){
          unset($msg);
        }
      }
      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];
    //  $defemail ="axt1312@mavs.uta.edu"
      $to = "axt1312@mavs.uta.edu";
      $subject = "User Query";
      $message ="".$msg." from :".$fname." ".$lname."\n Email:".$email;
      $header = "From:ashwinitrale8@gmail.com \r\n";
      $header .= "MIME-Version: 1.0\r\n";
      $header .= "Content-type: text/html\r\n";

      $retval = mail ($to,$subject,$message,$header);
      if( $retval == true ) {
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

</head>
<body>
<div class="bgrndimage"></div>
<div class="logo">  <h1>YouareOnDefault</h1> </div>

<div class="register" >


<h2>Contact Us</h2>


<br>
<form   action="" method="POST" >
<table id="registerform">
<tr><td  style="color:white;"> Full Name: </td></tr>
<tr>
<td>
<input type="text" name="firstname" placeholder="First Name">
<input type="text" name="lastname" placeholder="Last Name">
</td>
</tr>
<tr>
<td>
<input type="text" name="email" placeholder="your Email">
</td>
</tr>
<tr>
<td style="color:white;">Message For Us
</td></tr>
<tr>

<td>
<textarea id="msg" name="message" placeholder="Write something.." style="height:100px; width:350px;"></textarea>
</td>
</tr>
</table>
<input class="submitbtn" type="submit" name="submit" value="Send" >
</form>
</div>
<footer>
  <p>YouareOnDefault<br>
      <a href="ContactUs.php">Contact Us</a>&nbsp;<a href="WhyUs.php">Why Us</a>&nbsp;<a href="http://axt1312.uta.cloud/">Blog</a></p>
</footer>
</body>
</html>
