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
			<h2>Update Apartment</h2>
			<p style="padding-top:5px;font-size:15px; color:#7D0552;border-top: 2px solid #7D0552;">Add, Update  an Apartment!</p>
	</div>
	<div class="container">
		<form action="" method="post">
			<div class="row">
					<div class="col-25">
						<label class="label">Select Apartment</label>
					</div>
<div class="col-75">
<select id="subdiv" class="dropdown" name="subdiv" onchange="reload()">
	<option value="none" >none</option>
		<?php
		$servername = "utacloud";
		$username = "ppw1112_admin";
		$password = "Admin@2021";
		$dbname = "ppw1112_youareondefault";
		$conn = new mysqli($servername, $username, $password,$dbname);
		$sql = "SELECT apartment_name FROM Apartment";
		if($result = mysqli_query($conn, $sql)){
		if(mysqli_num_rows($result) > 0){
			 // output data of each row
			 while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
					 //$sub_name= $row['subdivision_name'];
				 echo "<option value='".$row['apartment_name']."'>".$row['apartment_name']."</option>";
			 }
		 }
		}
		?>
</select>
<?php
$servername = "utacloud";
$username = "ppw1112_admin";
$password = "Admin@2021";
$dbname = "ppw1112_youareondefault";
//Collect form values in variables

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$dropdown=$_GET['subdiv_name'];
$sql = "SELECT * FROM Apartment WHERE apartment_name='".$dropdown."'";
if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){
	 // output data of each row
	 while($row = mysqli_fetch_array($result)) {
		 $apt_name= $row['apartment_name'];
		 $apt_add= $row['address'];
		 $firstname= $row['owner_firstname'];
		 $lastname= $row['owner_lastname'];
		 $apt_email= $row['email'];
		 $apt_phone= $row['phone'];
	 }
 }
}

if (isset($_POST['apt_update'])) {

$apt_name = $_POST['apt_name'];
$apt_add = $_POST['apt_add'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$apt_email = $_POST['apt_email'];
$apt_phone = $_POST['apt_phone'];

	 $sql = "UPDATE Apartment SET apartment_name=?, address=?, owner_firstname=?,owner_lastname=?,
	 email=?, phone=? WHERE apartment_name='".$dropdown."'";
	 $stmnt=$conn->prepare($sql);
	 $stmnt->bind_param("ssssss", $apt_name, $apt_add, $firstname, $lastname,$apt_email,$apt_phone);
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
				<label class="label">Apartment Name</label>
				</div>
				<div class="col-75">
					<input type="text" name="apt_name" required value="<?php echo $apt_name ?>" />
				</div>
			</div>

			<div class="row">
				<div class="col-25">
				<label class="label">Apartment address</label>
				</div>
				<div class="col-75">
				<textarea class="dropdown" name="apt_add" id="subject" placeholder="address" style="height:100px;width:300px;">
			<?php echo $apt_add ?>	</textarea>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
				<label class="label">Apartment Owner First Name</label>
				</div>
				<div class="col-75">
					<input type="text" name="firstname" required value="<?php echo $firstname ?>" />
				</div>
			</div>

			<div class="row">
				<div class="col-25">
				<label class="label">Apartment Owner Last Name</label>
				</div>
				<div class="col-75">
					<input type="text" name="lastname" required value="<?php echo $lastname ?>"/>
				</div>
			</div>

			<div class="row">
				<div class="col-25">
				<label class="label">Apartment Owner Contact</label>
				</div>
				<div class="col-75">
					<input type="text" name="apt_phone" required value="<?php echo $apt_phone ?>" />
				</div>
			</div>

			<div class="row">
				<div class="col-25">
				<label class="label">Apartment Owner Email</label>
				</div>
				<div class="col-75">
					<input type="text" name="apt_email" required value="<?php echo $apt_email ?>"/>
				</div>
			</div>
			<div class="btn-group">

				<button name="apt_update">Update</button>

			</div>
</form>

	</div>


	</section>
	<footer>
	  <p>YouareOnDefault<br>
				<a href="ContactUs.php">Contact Us</a>&nbsp;<a href="WhyUs.php">Why Us</a>&nbsp;<a href="http://axt1312.uta.cloud/">Blog</a></p>
	</footer>
	<script>
	function reload()
	{

		var v1 = document.getElementById('subdiv').value;
		localStorage.setItem('subdiv', v1);
		self.location='UpdateApartment.php?subdiv_name=' +v1;


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
</body>
</html>
