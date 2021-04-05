<!--Waikar Prajakta Prakash  UTAID- 1001751112
Trale Ashwini Bhimappa UTAID- 1001871312
Sathyanarayana Deepika UTAID 1001870967--->
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
	<a href="ApartmentDashboard.php">Dashboard</a>
	<a href="Maintainance.php">Maintenance</a>
	<a href="Complaints.php">Complaints</a>
	<a href="http://axt1312.uta.cloud/">Blog</a>
	<a href="Login.php">Logout</a>
	</div>

	<!-- Top Div -->
	<section id="top-area">
	<div class="top_div">
  Apartment Owner
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
			<h2>Complaint</h2>
			<p style="padding-top:5px;font-size:15px; color:#7D0552;border-top: 2px solid #7D0552;">File a complaint to send it to your building owner!</p>
	</div>
	<div class="container">
		<form>
			<div class="row">
				<div class="col-25">
					<label for="fname">Raise a complaint</label>
				</div>
				<div class="col-75">
					<select name="cars" id="cars" class="dropdown">
					    <option>Choose an issue</option>

					 <?php
					 $servername = "utacloud";
					 $username = "ppw1112_admin";
					 $password = "Admin@2021";
					 $dbname = "ppw1112_youareondefault";
					 //Collect form values in variables
					 // Create connection
					 $conn = new mysqli($servername, $username, $password,$dbname);
					 $sql = "SELECT description FROM ppw1112_youareondefault.Complaint";
					 $result = mysqli_query($conn, $sql) or die('error getting data');
					 while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
					     echo "<option value='".$row['description']."'>".$row['description']."</option>";
	}
	?>
						</select>
				</div>
			</div>
	<!--<div class="container">-->
	<!--	<form>-->
	<!--		<div class="row">-->
	<!--			<div class="col-25">-->
	<!--				<label for="fname">If not in the options please type your complaints here.</label>-->
	<!--			</div>-->
	<!--			<div class="col-75">-->
	<!--			<textarea id="subject" name="subject" placeholder="Description.." style="height:150px;width: 300px;"></textarea>-->
	<!--			</div>-->
			<!--</div>-->

			<div class="row">
				<div class="col-25">
					<label for="fname"></label>
				</div>
				<div class="col-75">
				<button style="background-color: #7D0552; border: 1px solid #7D0552; color:white; cursor:pointer; padding: 10px 24px;">
					SEND</button>
				</div>
			</div>

</form>
	</div>
</section>
<footer>
	<p>YouareOnDefault<br>
			<a href="ContactUs.php">Contact Us</a>&nbsp;<a href="WhyUs.php">Why Us</a>&nbsp;<a href="http://axt1312.uta.cloud/">Blog</a></p>
</footer>
</body>
</html>
