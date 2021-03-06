<?php
	  require_once("ConnectToDb.php");
		session_start();
?>
<html>
<head lang="en">
	<script src="https://kit.fontawesome.com/2b6ffe8aac.js" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<link rel="stylesheet" href="CSS/YouareonDefault.css">
	<title>YouareOnDefault</title>
</head>
<body id="wrapper">
	<div class="sidenav">

	<div class="sidenav_heading">
			<h2>Menu</h2>
	</div>
		<a href="BuildingDashboard.html">User Home</a>
		<a href="Login.html">Logout</a>
	</div>

	<!-- Top Div -->
	<section id="top-area">
	<div class="top_div">
  Building Owner
	<div class="top_div_icon"><i class="fa fa-sign-out" aria-hidden="true"></i></div>
	</div>
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
	<div class="heading">
			<h2>Dashboard</h2>
	</div>
	<p> <?php
	$uid = $_SESSION['userid'];
	echo $uid;
	$conn = new mysqli($servername, $username, $password,$dbname);
	$query2 = "select * from User_Details WHERE username='".$uid."'";
	$result = mysqli_query($conn, $query2) or die('error getting data');
	 while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
	 $ownerOf = $row['owner_of'];
	 }
	 echo $ownerOf;
	 ?></p>


	<div class="cards">
	    <div class="card col-md-4">
				<div class ="card-icon"><i class="far fa-building"></i></div>
	      <span class="card-name">Total apartments</span>
	      <span class="card-data">320</span>
	    </div>

			    <div class="card col-md-4">
						<div class ="card-icon"><i class="fas fa-water"></i></div>
			      <span class="card-name">Current Utlities</span>
			      <span class="card-data">1200$</span>
			    </div>

			    <div class="card col-md-4">
						<div class ="card-icon"><i class="fas fa-wrench"></i></div>
			      <span class="card-name"> Community Services </span>
			      <span class="card-data">700$</span>
			    </div>
		<div class="heading">
				<h2 style="border-top: 2px solid #7D0552;">Apartment Master Record</h2>
		</div>
 </div>
<table class="style-table">
	<thead>
		<tr class="style-row">
			<th>
				Building ID
			</th>
			<th>
				Apartment Number
			</th>
			<th>
				Apartment Owner
			</th>
			<th>
				Apartment Owner Address
			</th>
			<th>
				Apartment Owner Phone
			</th>
			<th>
				Apartment Owner Email
			</th>
		</tr>
	</thead>
	<tbody>
		<tr><td>Building A</td>
			<td>Apartment 1</td>
			<td>Rob Levis</td>
			<td>Arbor Oaks,Arlington,Texas</td>
			<td>123-234-1234</td>
			<td>rob@gmail.com</td>
		</tr>
		<tr>
			<td>Building B</td>
			<td>Apartment 1</td>
			<td>Rob Levis</td>
			<td>Arbor Oaks,Arlington,Texas</td>
			<td>123-234-1234</td>
			<td>rob@gmail.com</td>
		</tr>
		<tr>
			<td>Building A</td>
			<td>Apartment 5</td>
			<td>Rob Levis</td>
			<td>Arbor Oaks,Arlington,Texas</td>
			<td>123-234-1234</td>
			<td>rob@gmail.com</td>
		</tr>
		<tr>
			<td>Building C</td>
			<td>Apartment 1</td>
			<td>Rob Levis</td>
			<td>Arbor Oaks,Arlington,Texas</td>
			<td>123-234-1234</td>
			<td>rob@gmail.com</td>
		</tr>
	</tbody>
</table>
	</section>
		<br><br>
	<footer>
		<p>YouareOnDefault<br>
		<a href="ContactUs.html">Contact Us</a>&nbsp;<a href="WhyUs.html">Why Us</a>&nbsp;<a href="http://axt1312.uta.cloud/">Blog</a></p>
	</footer>

</body>
</html>
