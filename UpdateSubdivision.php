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
<body id="wrapper" onload="refresh_val()">
	<!--side menu -->
	<div class="sidenav">

	<div class="sidenav_heading">
			<h2>Menu</h2>
	</div>

	<a href="HomePage.html">Home</a>
	<a href="SuperUserDash.php">Dashboard</a>
	<a href="AddSubdivision.php">Add Subdivision</a>
	<a href="AddBuilding.php">Add Building</a>
	<a href="AddApartment.php">Add Apartment</a>
	<a href="WhyUs.html">Why Us</a>
	<a href="ContactUs.php">Contact Us</a>
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
			<h2>Updaate Subdivision</h2>
			<p style="padding-top:5px;font-size:15px; color:#7D0552;border-top: 2px solid #7D0552;">Add, Update or Delete a subdivision!</p>
	</div>
	<div class="container">
		<form action="" method="post">
			<div class="row">
				<div class="col-25">
					<label class="label">Select Subdivision to Update</label>
				</div>
				<div class="col-75">
	<select name="subdiv" id="subdiv" class="dropdown" onChange='reload()'>
		<option>none</option>
	<?php

	$servername = "utacloud";
	$username = "ppw1112_admin";
	$password = "Admin@2021";
	$dbname = "ppw1112_youareondefault";
	//Collect form values in variables

	// Create connection
	$conn = new mysqli($servername, $username, $password,$dbname);
	$sql = "SELECT subdivision_name FROM Subdivision";
	$result = mysqli_query($conn, $sql) or die('error getting data');
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		  //$sub_name= $row['subdivision_name'];
		echo "<option value='".$row['subdivision_name']."'>".$row['subdivision_name']."</option>";
	}
	?></select>

				</div>
			</div>
<script>
function reload()
{

	var v1 = document.getElementById('subdiv').value;
	localStorage.setItem('subdiv', v1);
	self.location='UpdateSubdivision.php?subdiv_name=' +v1;
}
function refresh_val()
{
	 document.getElementById("subdiv").value = getSavedValue("subdiv");
}
function getSavedValue  (v){
			 if (!localStorage.getItem(v)) {
					 return "";// You can change this to your defualt value.
			 }
			 return localStorage.getItem(v);
	 }
</script>

<?php
$servername = "utacloud";
$username = "ppw1112_admin";
$password = "Admin@2021";
$dbname = "ppw1112_youareondefault";
//Collect form values in variables

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$dropdown=$_GET['subdiv_name'];
$sql = "SELECT * FROM Subdivision WHERE subdivision_name='".$dropdown."'";
if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){
	 // output data of each row
	 while($row = mysqli_fetch_array($result)) {
		 $sub_name= $row['subdivision_name'];
		 $sub_add= $row['adress'];
		 $sub_fname= $row['primaryContact_firstname'];
		 $sub_lname= $row['primaryContact_lastname'];
		 $sub_email= $row['email'];
		 $sub_phone= $row['phone'];
	 }
 }
}

if (isset($_POST['subdivision_update'])) {

$subname = $_POST['sub_name'];
$subadd = $_POST['sub_add'];
$firstname = $_POST['First_name'];
$lastname = $_POST['Last_name'];
$subemail = $_POST['sub_email'];
$subcontact = $_POST['sub_phone'];

	 $sql = "UPDATE Subdivision SET subdivision_name=?, adress=?, primaryContact_firstname=?,primaryContact_lastname=?,
	 email=?, phone=? WHERE subdivision_name='".$dropdown."'";
	 $stmnt=$conn->prepare($sql);
	 $stmnt->bind_param("ssssss", $subname, $subadd, $firstname, $lastname,$subemail,$subcontact);
	 $stmnt->execute();
	 if ($stmnt->execute()) {
		 echo '<script type="text/JavaScript">
	      alert("Record Updated!");
	      </script>';
}

}

?>
			<div class="row">
				<div class="col-25">
					<label class="label">Subdivision Name</label>
				</div>
				<div class="col-75">
				<input type="text" required name="sub_name" value="<?php echo $sub_name ?>"/>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label class="label">Subdivision Address</label>
				</div>
				<div class="col-75">
				<textarea class="dropdown" id="subject" name="sub_add" placeholder="address" style="height:100px;width:300px;">
				<?php echo $sub_add ?></textarea>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label class="label">Subdivision Owner First Name</label>
				</div>
				<div class="col-75">
				<input type="text" required name="First_name" value="<?php echo $sub_fname ?>"/>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label class="label">Subdivision Owner Last Name</label>
				</div>
				<div class="col-75">
				<input type="text" required name="Last_name" value="<?php echo $sub_lname ?>" />
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label class="label">Subdivision Owner Contact</label>
				</div>
				<div class="col-75">
				<input required type="text" name="sub_phone" value="<?php echo $sub_phone ?>" />
				</div>
			</div>

			<div class="row">
				<div class="col-25">
					<label class="label">Subdivision Owner Email</label>
				</div>
				<div class="col-75">
				<input type="text" name="sub_email" value="<?php echo $sub_email ?>" />
				</div>
			</div>
			<div class="btn-group">
				<button name="subdivision_update" value="update">Update</button>

			</div>
</form>

	</div>
	</section>
	<footer>
	  <p>YouareOnDefault<br>
	  <a href="#Contact">Contact Us</a>&nbsp;<a href="#Contact">Why Us</a>&nbsp;<a href="#Contact">Blog</a></p>
	</footer>
</body>

</html>
