<html>
<head lang="en">
	<script src="https://kit.fontawesome.com/2b6ffe8aac.js" crossorigin="anonymous"></script>
	<meta charset="utf-8">
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
  Apartment Owner	<div class="top_div_icon"><i class="fa fa-sign-out" aria-hidden="true"></i></div>
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

	<div class="cards">
	    <div class="card col-md-4">
				<div class ="card-icon"><i class="far fa-building"></i></div>
	      <span class="card-name">Utlities for March</span>
	      <span class="card-data">100 $</span>
	    </div>

			    <div class="card col-md-4">
						<div class ="card-icon"><i class="fas fa-water"></i></div>
			      <span class="card-name">Self-Services for March</span>
			      <span class="card-data">100 $</span>
			    </div>

			    <div class="card col-md-4">
						<div class ="card-icon"><i class="fas fa-wrench"></i></div>
			      <span class="card-name"> Community Services Due</span>
			      <span class="card-data">20 $</span>
			    </div>
		<div class="heading">
				<h2 style="border-top: 2px solid #7D0552;">Apartment Master Record</h2>
		</div>
 </div>
 <table class="style-table">
             <tr class="style-row">
                 <th>Apartment_id</th>
                 <th>Building_id</th>
                 <th>apartment_name</th>
                 <th>Address</th>
                 <th>Owner_firstname</th>
                 <th>Owner_lastname</th>
                 <th>E-mail</th>
                 <th>Phone</th>
                 </tr>

<?php
$servername = "utacloud";
$username = "ppw1112_admin";
$password = "Admin@2021";
$dbname = "ppw1112_youareondefault";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);}
  $sql = "SELECT * FROM ppw1112_youareondefault.Apartment
  where Apartment.email='jimin@gmail.com'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  echo "<tr>
  <td>".$row["apartment_id"]."</td>
                <td>".$row["building_id"]."</td>
                <td>".$row["apartment_name"]."</td>
                <td>".$row["address"]."</td>
                <td>".$row["owner_firstname"]."</td>
                <td>".$row["owner_lastname"]."</td>
                <td>".$row["email"]."</td>
                 <td>".$row["phone"]."</td>


            </tr>";
  }
}
else {
  echo "0 results";
}
$conn->close();
?>


	</section>

	<footer>
	  <p>YouareOnDefault<br>
				<a href="ContactUs.php">Contact Us</a>&nbsp;<a href="WhyUs.php">Why Us</a>&nbsp;<a href="http://axt1312.uta.cloud/">Blog</a></p>
	</footer>
</table>
</body>
</html>
