<!--Waikar Prajakta Prakash  UTAID- 1001751112
Trale Ashwini Bhimappa UTAID- 1001871312
Sathyanaraya Deepika UTAID 1001870967--->
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
	<a href="SuperUserDash.html">Dashboard</a>
	<a href="AddSubdivision.html">Add Subdivision</a>
	<a href="AddBuilding.html">Add Building</a>
	<a href="AddApartment.html">Add Apartment</a>
	<a href="WhyUs.html">Why Us</a>
	<a href="ContactUs.html">Contact Us</a>
	<a href="http://axt1312.uta.cloud/">Blog</a>
	<a href="Login.html">Logout</a>
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
			<h2>Add Building</h2>
			<p style="padding-top:5px;font-size:15px; color:#7D0552;border-top: 2px solid #7D0552;">Update a Building!</p>
	</div>
<div class="container">
  <form action="" method="post">

<div class="row">
  <div class="col-25">
    <label for="fname">Select Building</label>
  </div>
<div class="col-75">
<select name="subdiv" id="subdiv" class="dropdown" onchange="reload()">
	<option value="SD 101">none</option>
<?php
$servername = "utacloud";
$username = "ppw1112_admin";
$password = "Admin@2021";
$dbname = "ppw1112_youareondefault";
$conn = new mysqli($servername, $username, $password,$dbname);
$sql = "SELECT building_name FROM Building";
if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){
	 // output data of each row
	 while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			 //$sub_name= $row['subdivision_name'];
		 echo "<option value='".$row['building_name']."'>".$row['building_name']."</option>";
	 }
 }
}
?>
</select>
<script>
function reload()
{

	var v1 = document.getElementById('subdiv').value;
	localStorage.setItem('subdiv', v1);
	self.location='UpdateBuilding.php?build_name=' +v1;
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
$dropdown=$_GET['build_name'];
$sql = "SELECT * FROM Building WHERE building_name='".$dropdown."'";
if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){
	 // output data of each row
	 while($row = mysqli_fetch_array($result)) {
		 $build_name= $row['building_name'];
		 $build_add= $row['address'];
		 $First_name= $row['primaryContact_Firstname'];
		 $Last_name= $row['primaryContact_Lastname'];
		 $build_email= $row['email'];
		 $build_phone= $row['phone'];
	 }
 }
}

if (isset($_POST['building_update'])) {

	$build_name = $_POST['build_name'];
	$build_add = $_POST['build_add'];
	$First_name = $_POST['First_name'];
	$Last_name = $_POST['Last_name'];
	$build_email = $_POST['build_email'];
	$build_phone = $_POST['build_phone'];

	 $sql = "UPDATE Building SET building_name=?, address=?, primaryContact_Firstname=?,primaryContact_Lastname=?,
	 email=?, phone=? WHERE building_name='".$dropdown."'";
	 $stmnt=$conn->prepare($sql);
	 $stmnt->bind_param("ssssss", $build_name, $build_add, $First_name, $Last_name,$build_email,$build_phone);
	 $stmnt->execute();
	 if ($stmnt->execute()) {
		 echo '<script type="text/JavaScript">
	      alert("Record Updated!");
	      </script>';
}

}

?>
</div>
</div>

	<div class="row">
    <div class="col-25">
      <label for="fname">Building Name</label>
    </div>
    <div class="col-75">
				<input type="text" name="build_name" value="<?php echo $build_name ?>" />
    </div>
  </div>

<div class="row">
	<div class="col-25">
		<label for="fname">Building address</label>
	</div>
	<div class="col-75">
			<textarea class="dropdown" id="subject" name="build_add" placeholder="address" style="height:100px;width:300px;">
			<?php echo $build_add ?></textarea>
	</div>
</div>

<div class="row">
	<div class="col-25">
		<label for="fname">Building Owner First Name</label>
	</div>
	<div class="col-75">
			<input type="text" name="First_name" value="<?php echo $First_name ?>" />
	</div>
</div>

<div class="row">
	<div class="col-25">
		<label for="fname">Building Owner Last Name</label>
		</div>
		<div class="col-75">
		<input type="text" name="Last_name" value="<?php echo $Last_name ?>" />

	</div>
</div>

<div class="row">
	<div class="col-25">
		<label for="fname">Building Owner Contact</label>
	</div>
	<div class="col-75">
		<input type="text" name="build_phone" value="<?php echo $build_phone ?>"/>

	</div>
</div>

<div class="row">
	<div class="col-25">
		<label for="fname">Building Owner Email</label>
	</div>
	<div class="col-75">
		<input type="text" name="build_email" value="<?php echo $build_email ?>"/>

	</div>
</div>
<div class="btn-group">
	<button name="building_update">Update</button>
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
