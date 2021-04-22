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
  Super user	<div class="top_div_icon"><i class="fa fa-sign-out" aria-hidden="true"></i></div>
</div>
<div class="top_div_name">YouareOnDefault</div>
</section>
	<!-- cards -->
<section id="content-area">
	<div class="heading">
			<h2>Dashboard</h2>
	</div>

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

	<div class="cards">
		<div class="card col-md-4">

						<div class ="card-icon"><i class="fas fa-building"></i></div>
			      <span class="card-name">Total Sub-divisions</span>
						<?php
						$servername = "utacloud";
						$username = "ppw1112_admin";
						$password = "Admin@2021";
						$dbname = "ppw1112_youareondefault";
						// Create connection
						$conn = new mysqli($servername, $username, $password,$dbname);
						// Check connection
						if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);

						}
						$sql = "SELECT * FROM Subdivision";
						$result = $conn->query($sql);
						$rowcount=mysqli_num_rows($result);
			    	echo "<span class=\"card-data\">	$rowcount</span>";?>
			    </div>

			    <div class="card col-md-4">
			    	<div class ="card-icon"><i class="far fa-building"></i></div>
			    	<span class="card-name">Total Buildings</span>
						<?php
						$servername = "utacloud";
						$username = "ppw1112_admin";
						$password = "Admin@2021";
						$dbname = "ppw1112_youareondefault";
						// Create connection
						$conn = new mysqli($servername, $username, $password,$dbname);
						// Check connection
						if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);

						}
						$sql = "SELECT * FROM Building";
						$result = $conn->query($sql);
						$rowcount=mysqli_num_rows($result);
			    	echo "<span class=\"card-data\">	$rowcount</span>";?>

			    </div>

			    <div class="card col-md-4">
						<div class ="card-icon"><i class="fas fa-building"></i></div>
			      <span class="card-name">Total Apartments</span>
						<?php
						$servername = "utacloud";
						$username = "ppw1112_admin";
						$password = "Admin@2021";
						$dbname = "ppw1112_youareondefault";
						// Create connection
						$conn = new mysqli($servername, $username, $password,$dbname);
						// Check connection
						if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);

						}
						$sql = "SELECT * FROM Apartment";
						$result = $conn->query($sql);
						$rowcount=mysqli_num_rows($result);
			    	echo "<span class=\"card-data\">	$rowcount</span>";?>
			    </div>


			    <div class="card col-md-4">
						<div class ="card-icon"><i class="fas fa-water"></i></div>
			      <span class="card-name">Current Utlities</span>
						<?php
							$servername = "utacloud";
							$username = "ppw1112_admin";
							$password = "Admin@2021";
							$dbname = "ppw1112_youareondefault";
							$conn = new mysqli($servername, $username, $password,$dbname);
								$sum=0;
								$sql = "SELECT ServiceCost FROM Apartment_Services";
								$result = $conn->query($sql);
								$rowcount=mysqli_num_rows($result);
								if(mysqli_num_rows($result) > 0){
									while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {

										$cost[] =$row['ServiceCost'] ;
								 }
							 }
								 for ($i=1; $i <= $rowcount; $i++)
								{
										$a = $cost[$i];
										$sum=$sum+$a;
								}
			echo "<span class=\"card-data\">$sum $</span>";?>

			    </div>

			    <div class="card col-md-4">
						<div class ="card-icon"><i class="fas fa-wrench"></i></div>
			      <span class="card-name"> Community Services </span>
						<?php
							$servername = "utacloud";
							$username = "ppw1112_admin";
							$password = "Admin@2021";
							$dbname = "ppw1112_youareondefault";
							$conn = new mysqli($servername, $username, $password,$dbname);
								$sum=0;
								$sql = "SELECT ServiceCost FROM Apartment_Services";
								$result = $conn->query($sql);
								$rowcount=mysqli_num_rows($result);
								if(mysqli_num_rows($result) > 0){
									while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {

										$cost[] =$row['ServiceCost'] ;
								 }
							 }
								 for ($i=1; $i <= $rowcount; $i++)
								{
										$a = $cost[$i];
										$sum=$sum+$a;
								}
			echo "<span class=\"card-data\">$sum $</span>";?>
			    </div>

<?php

?>
		<div class="heading">
				<h2 style="border-top: 2px solid #7D0552;">Apartment Records</h2>
		</div>
 </div>
<table class="style-table">
	<thead>
		<tr class="style-row">
			<th>
				Building ID
			</th>
			<th>
				Apartment Name
			</th>
			<th>
				Owner First Name
			</th>
			<th>
				Owner Last Name
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
		<?php
		$servername = "utacloud";
		$username = "ppw1112_admin";
		$password = "Admin@2021";
		$dbname = "ppw1112_youareondefault";
		// Create connection
		$conn = new mysqli($servername, $username, $password,$dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);

		}
		$sql = "SELECT * FROM Apartment";
		$result = $conn->query($sql);
		$rowcount=mysqli_num_rows($result);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
					echo "<tr>
			    <td>".$row["building_id"]."</td>
			    <td>".$row["apartment_name"]."</td>
					<td>".$row["owner_firstname"]."</td>
					<td>".$row["owner_lastname"]."</td>
					<td>".$row["address"]."</td>
					<td>".$row["email"]."</td>
					<td>".$row["phone"]."</td>
			    </tr>";

				}
			}
		?>
</tbody>
</table>
<div class="heading">
	<h2 style="border-top: 2px solid #7D0552;">Building records</h2></div>
<table class="style-table">
	<thead>
		<tr class="style-row">
			<th>
				Subdivision ID
			</th>
			<th>
				Building Name
			</th>
			<th>
			 Owner First Name
			</th>
			<th>
			 Owner Last Name
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
		<?php
		$servername = "utacloud";
		$username = "ppw1112_admin";
		$password = "Admin@2021";
		$dbname = "ppw1112_youareondefault";
		// Create connection
		$conn = new mysqli($servername, $username, $password,$dbname);
		// Check connection
		if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);

		}
		$sql = "SELECT * FROM Building";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr>
					<td>".$row["subdivision_id"]."</td>
					<td>".$row["building_name"]."</td>
					<td>".$row["primaryContact_Firstname"]."</td>
					<td>".$row["primaryContact_Lastname"]."</td>
					<td>".$row["address"]."</td>
					<td>".$row["email"]."</td>
					<td>".$row["phone"]."</td>
					</tr>";

				}
			}
		?>
	</tbody>
</table>
<div class="heading">
	<h2 style="border-top: 2px solid #7D0552;">Subdivision Records</h2></div>
<table class="style-table">
	<thead>
		<tr class="style-row">
			<th>
				Subdivision ID
			</th>
			<th>
				Subdivision Name
			</th>
			<th>
			Subdivision Owner First Name
			</th>
			<th>
		Subdivision	Owner Last Name
			</th>
			<th>
			Subdivision	Owner Address
			</th>
			<th>
			Subdivision	 Owner Email
			</th>
			<th>
			Subdivision	Owner Contact
			</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$servername = "utacloud";
		$username = "ppw1112_admin";
		$password = "Admin@2021";
		$dbname = "ppw1112_youareondefault";
		// Create connection
		$conn = new mysqli($servername, $username, $password,$dbname);
		// Check connection
		if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);

		}
		$sql = "SELECT * FROM Subdivision";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr>
					<td>".$row["subdivision_id"]."</td>
					<td>".$row["subdivision_name"]."</td>
					<td>".$row["primaryContact_firstname"]."</td>
					<td>".$row["primaryContact_lastname"]."</td>
					<td>".$row["adress"]."</td>
					<td>".$row["email"]."</td>
					<td>".$row["phone"]."</td>
					</tr>";

				}
			}
		?>
	</tbody>
</table>
	</section>

	<br><br>

	<footer>
	  <p>YouareOnDefault<br>
				<a href="ContactUs.php">Contact Us</a>&nbsp;<a href="WhyUs.php">Why Us</a>&nbsp;<a href="http://axt1312.uta.cloud/">Blog</a></p>
	</footer>
</body>
</html>
