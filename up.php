<?php

$servername = "utacloud";
$username = "ppw1112_admin";
$password = "Admin@2021";
$dbname = "ppw1112_youareondefault";
$sub_name = $_POST['sub_name'];
$update = $_POST['subdivision_update'];
//Collect form values in variables


// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$sql = "SELECT subdivision_name FROM Subdivision";
if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){
	 // output data of each row
	 while($row = mysqli_fetch_array($result)) {
		  $sub_name= $row['subdivision_name'];
			echo $sub_name;
	 }
 }
}
 if (isset($_POST['subdivision_update']))
 {
	$dropdown=$_POST['subdiv'];
echo $dropdown;

	 $sql = "SELECT * FROM Subdivision WHERE subdivision_name='".$dropdown."'";
	 if($result = mysqli_query($conn, $sql)){
	 if(mysqli_num_rows($result) > 0){
			// output data of each row
			while($row = mysqli_fetch_array($result)) {
			  $sub_name= $row['subdivision_name'];
				echo $sub_name;
				$sub_add= $row['adress'];
				echo $sub_add;
				$sub_fname= $row['primaryContact_firstname'];
				echo $sub_fname;
				$sub_lname= $row['primaryContact_lastname'];
				echo $primaryContact_lastname;
				$sub_email= $row['email'];
				echo $sub_email;
				$sub_phone= $row['phone'];
				echo $sub_phone;
			}


}
mysqli_close($conn);
?>
