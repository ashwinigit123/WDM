<!--Waikar Prajakta Prakash  UTAID- 1001751112
Trale Ashwini Bhimappa UTAID- 1001871312
Sathyanaraya Deepika UTAID 1001870967--->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head lang="en">
	<script src="https://kit.fontawesome.com/2b6ffe8aac.js" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="CSS/YouareonDefault.css">
	<title>YouareOnDefault</title>
</head>
<body id="wrapper">
	<!--side menu -->
	<div class="sidenav">

	<div class="sidenav_heading">
			<h2>Menu</h2>
	</div>

	<a href="HomePage.php">Home</a>
	<a href="SuperUserDash.php">Dashboard</a>
	<a href="AddSubdivision.php">Add Subdivision</a>
	<a href="AddBuilding.php">Add Building</a>
	<a href="AddApartment.php">Add Apartment</a>
	<a href="http://axt1312.uta.cloud/">Blog</a>
	<a href="Login.php">Logout</a>
	</div>

	<!-- Top Div -->
	<section id="top-area">
	<div class="top_div">
  Super User
	<div class="top_div_icon"><i class="fa fa-sign-out" aria-hidden="true"></i></div>
</div>
<div class="top_div_name">YouareOnDefault</div>
</section>

<!--Chat window-->
<button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
  <form  class="form-container">
    <h1>Chat</h1>

    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>

    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
	<!-- cards -->
<section id="content-area">
	<div class="heading" >
			<h2>Add Subdivision</h2>
			<p style="padding-top:5px;font-size:15px; color:#7D0552;border-top: 2px solid #7D0552;">Add a subdivision!</p>
	</div>
	<div class="container">
		<form action="" method="post">
			<div class="row">
				<div class="col-25">
					<label class="label">Subdivision Name</label>
				</div>
				<div class="col-75">
				<input type="text" name="sub_name" required/>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label class="label">Subdivision Address</label>
				</div>
				<div class="col-75">
				<textarea class="dropdown" id="subject" name="sub_add" placeholder="address" style="height:100px;width:300px;"></textarea>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label class="label">Subdivision Owner First Name</label>
				</div>
				<div class="col-75">
				<input type="text" name="First_name" required/>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label class="label">Subdivision Owner Last Name</label>
				</div>
				<div class="col-75">
				<input type="text" name="Last_name" required />
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label class="label">Subdivision Owner Contact</label>
				</div>
				<div class="col-75">
				<input type="text" name="sub_contact" required />
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label class="label">Subdivision Owner Email</label>
				</div>
				<div class="col-75">
				<input type="text" name="sub_email" required />
				</div>
			</div>
			<div class="btn-group">
				<button name="subdivision_add" value="add">Add</button>
				<button value="update" formnovalidate formaction="UpdateSubdivision.php">Update</button>

			</div>
</form>

	</div>
	<?php

	$servername = "utacloud";
	$username = "ppw1112_admin";
	$password = "Admin@2021";
	$dbname = "ppw1112_youareondefault";
	$sub_name = $_POST['sub_name'];
	$update = $_POST['subdivision_update'];
	//Collect form values in variables
	$data = [
	    'sub_name' => $_POST['sub_name'],
	    'sub_add' =>  $_POST['sub_add'],
	    'First_name' => $_POST['First_name'],
	    'Last_name' => $_POST['Last_name'],
	    'sub_email' => $_POST['sub_email'],
	    'sub_contact' => $_POST['sub_contact'],
	];

	// Create connection
	 if(isset($_POST['subdivision_add']))
	 {
	  try {
	      $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	      $sql = "INSERT INTO Subdivision (subdivision_name, adress, primaryContact_firstname,primaryContact_lastname,
	      email,phone) VALUES (:sub_name, :sub_add, :First_name,:Last_name,:sub_email,:sub_contact)";
	      $pdo->prepare($sql)->execute($data);

	      }
	      catch (PDOException $pe) {
	      die("Could not connect to the database $dbname :" . $pe->getMessage());
	  }
	}?>

	</section>
	<footer>
	  <p>YouareOnDefault<br>
				<a href="ContactUs.php">Contact Us</a>&nbsp;<a href="WhyUs.php">Why Us</a>&nbsp;<a href="http://axt1312.uta.cloud/">Blog</a></p>
	</footer>
</body>

</html>
