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
		<a href="Subdivision.php">Dashboard</a>
		<a href="Maintainance.php">Maintenance</a>
		<a href="Complaints.php">Complaints</a>
		<a href="http://axt1312.uta.cloud/">Blog</a>
		<a href="Login.php">Logout</a>
	</div>

	<!-- Top Div -->
	<section id="top-area">
	<div class="top_div">
  Subdivision Owner
	<div class="top_div_icon"><i class="fa fa-sign-out"></i></div>
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
			<h2>Dashboard</h2>
	</div>

	<div class="cards">
	    <div class="card col-md-4">
				<div class ="card-icon"><i class="far fa-building"></i></div>
	      <span class="card-name">Total Buildings</span>
	      <span class="card-data">20</span>
	    </div>

			    <div class="card col-md-4">
						<div class ="card-icon"><i class="fas fa-water"></i></div>
			      <span class="card-name">Current Utlities</span>
			      <span class="card-data">1200$</span>
			    </div>

			    <div class="card col-md-4">
						<div class ="card-icon"><i class="fas fa-wrench"></i></div>
			      <span class="card-name"> Community Services </span>
			      <span class="card-data">800$</span>
			    </div>
		<div class="heading">
				<h2 style="border-top: 2px solid #7D0552;">Subdivision Master Record</h2>
		</div>
 </div>
<div style="overflow-x:auto;">
<table class="style-table" id="subdivision_master">
	<thead>
		<tr class="style-row">
			<th>
				Subdivision ID
			</th>
			<th>
				Subdivision name
			</th>
			<th>
				Address
			</th>
			<th>
				Primary Contact
			</th>
			<th>
				Phone
			</th>
			<th>
				Email
			</th>

		</tr>
	</thead>
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
	    $sql = "SELECT * FROM ppw1112_youareondefault.Subdivision";
	    $result = $conn->query($sql);
	    if ($result->num_rows > 0) {
	        // output data of each row
	        while($row = $result->fetch_assoc()) {
	        echo "<tr>
	        <td>".$row["subdivision_id"]."</td>
	        <td>".$row["subdivision_name"]."</td>
            <td>".$row["adress"]."</td>
            <td>".$row["primaryContact_firstname"]."</td>
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
	<!--<tbody>-->
	<!--	<tr>-->
	<!--		<td>Arbor Oaks</td>-->
	<!--		<td>001</td>-->
	<!--		<td>John Doe</td>-->
	<!--		<td>Arlington,Texas</td>-->
	<!--		<td>123-234-1234</td>-->
	<!--		<td>johndoe@gmail.com</td>-->
	<!--		<td>101</td>-->
	<!--		<td>Rob Levis</td>-->
	<!--		<td>Arbor Oaks,Arlington,Texas</td>-->
	<!--		<td>123-234-1234</td>-->
	<!--		<td>rob@gmail.com</td>-->
	<!--	</tr>-->
	<!--	<tr>-->
	<!--		<td>Arbor Oaks</td>-->
	<!--		<td>001</td>-->
	<!--		<td>John Doe</td>-->
	<!--		<td>Arlington,Texas</td>-->
	<!--		<td>123-234-1234</td>-->
	<!--		<td>johndoe@gmail.com</td>-->
	<!--		<td>101</td>-->
	<!--		<td>Rob Levis</td>-->
	<!--		<td>Arbor Oaks,Arlington,Texas</td>-->
	<!--		<td>123-234-1234</td>-->
	<!--		<td>rob@gmail.com</td>-->
	<!--	</tr>-->
	<!--	<tr>-->
	<!--		<td>Arbor Oaks</td>-->
	<!--		<td>001</td>-->
	<!--		<td>John Doe</td>-->
	<!--		<td>Arlington,Texas</td>-->
	<!--		<td>123-234-1234</td>-->
	<!--		<td>johndoe@gmail.com</td>-->
	<!--		<td>101</td>-->
	<!--		<td>Rob Levis</td>-->
	<!--		<td>Arbor Oaks,Arlington,Texas</td>-->
	<!--		<td>123-234-1234</td>-->
	<!--		<td>rob@gmail.com</td>-->
	<!--	</tr>-->
	<!--	<tr>-->
	<!--		<td>Arbor Oaks</td>-->
	<!--		<td>001</td>-->
	<!--		<td>John Doe</td>-->
	<!--		<td>Arlington,Texas</td>-->
	<!--		<td>123-234-1234</td>-->
	<!--		<td>johndoe@gmail.com</td>-->
	<!--		<td>101</td>-->
	<!--		<td>Rob Levis</td>-->
	<!--		<td>Arbor Oaks,Arlington,Texas</td>-->
	<!--		<td>123-234-1234</td>-->
	<!--		<td>rob@gmail.com</td>-->
	<!--	</tr>-->
	<!--</tbody>-->
</table>
</div>

<div class="heading">
		<h2 style="border-top: 2px solid #7D0552;">Utility Master Record</h2>
</div>

<div style="overflow-x:auto;">
<table class="style-table" id="subdivision_utility">
	<thead>
		<tr class="style-row">
			<th>
				Building ID
			</th>
			<th>
				Apartment ID
			</th>
			<th>
				Apartment Owner
			</th>
			<th>
				Apartment Owner Phone
			</th>
			<th>
				Total Utility (USD)
			</th>
		</tr>
	</thead>
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
	    $sql ="Select  distinct  b.building_id,a.apartment_id,a.owner_firstname, a.phone,t.ServiceCost from Subdivision s,Building b, Apartment a, Apartment_Services t,Service f
where s.subdivision_id=b.subdivision_id and s.subdivision_name='Subdiv A' and t.service_name='Heater'";
	    $result = $conn->query($sql);
	    if ($result->num_rows > 0) {
	        // output data of each row
	        while($row = $result->fetch_assoc()) {
	        echo "<tr>
	        	        <td>".$row["building_id"]."</td>
	        <td>".$row["apartment_id"]."</td>
	        <td>".$row["owner_firstname"]."</td>
	        <td>".$row["phone"]."</td>
            <td>".$row["ServiceCost"]."</td>

            </tr>";
	        }
	    }
	    else {
	        echo "0 results";

	    }
	    $conn->close();
	    ?>
	<!--<tbody>-->
	<!--	<tr>-->
	<!--		<td>Arbor Oaks</td>-->
	<!--		<td>Building A</td>-->
	<!--		<td>Apartment 1</td>-->
	<!--		<td>Rob Levis</td>-->
	<!--		<td>123-234-1234</td>-->
	<!--		<td>200</td>-->
	<!--	</tr>-->
	<!--	<tr>-->
	<!--		<td>Arbor Oaks</td>-->
	<!--		<td>Building A</td>-->
	<!--		<td>Apartment 2</td>-->
	<!--		<td>John Legend</td>-->
	<!--		<td>123-234-1234</td>-->
	<!--		<td>300</td>-->
	<!--	</tr>-->
	<!--	<tr>-->
	<!--		<td>Arbor Oaks</td>-->
	<!--		<td>Building C</td>-->
	<!--		<td>Apartment 2</td>-->
	<!--		<td>Ron Jenner</td>-->
	<!--		<td>123-234-1234</td>-->
	<!--		<td>100.75</td>-->
	<!--	</tr>-->
	<!--	<tr>-->
	<!--		<td>Arbor Oaks</td>-->
	<!--		<td>Building D</td>-->
	<!--		<td>Apartment 1</td>-->
	<!--		<td>Amy Hanes</td>-->
	<!--		<td>123-234-1234</td>-->
	<!--		<td>175.80</td>-->
	<!--	</tr>-->
	<!--</tbody>-->
</table>
</div>

<div class="heading">
		<h2 style="border-top: 2px solid #7D0552;">Community Service Fee Master Record</h2>
</div>

<div style="overflow-x:auto;">
<table class="style-table" id="subdivision_community">
	<thead>
		<tr class="style-row">
			<th>
				Building ID
			</th>
			<th>
				Apartment ID
			</th>
			<th>
				Apartment Owner
			</th>
			<th>
				Service
			</th>
			<th>
				Community Service Fee (USD)
			</th>
		</tr>
	</thead>
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
	    $sql = "Select  distinct b.building_id, a.apartment_id,a.owner_firstname, t.community_service_fee, t.service_name from Subdivision s,Building b, Apartment a, Service t
where s.subdivision_id=b.subdivision_id and s.subdivision_name='Subdiv A'";
	    $result = $conn->query($sql);
	    if ($result->num_rows > 0) {
	        // output data of each row
	        while($row = $result->fetch_assoc()) {
	        echo "<tr>
	        <td>".$row["building_id"]."</td>
	        <td>".$row["apartment_id"]."</td>
            <td>".$row["owner_firstname"]."</td>
            <td>".$row["service_name"]."</td>
            <td>".$row["community_service_fee"]."</td>
            </tr>";
	        }
	    }
	    else {
	        echo "0 results";

	    }
	    $conn->close();
	    ?>
	</tbody>
</table>
</div>
	</section>
		<br><br>
		<footer>
		  <p>YouareOnDefault<br>
					<a href="ContactUs.php">Contact Us</a>&nbsp;<a href="WhyUs.php">Why Us</a>&nbsp;<a href="http://axt1312.uta.cloud/">Blog</a></p>
		</footer>
</body>
</html>
