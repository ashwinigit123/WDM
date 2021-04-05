<?php

$servername = "utacloud";
$username = "ppw1112_admin";
$password = "Admin@2021";
$dbname = "ppw1112_youareondefault";
$conn = new mysqli($servername, $username, $password,$dbname);
//Collect form values in variables
$dropdown=$_GET['build_name'];
// get building id
$sql = "SELECT building_id FROM Building WHERE building_name='".$dropdown."'";
if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){
	 // output data of each row
	 while($row = mysqli_fetch_array($result)) {
		 $build_id= $row['building_id'];
	 }
 }
}
//get apartment for that buildings
$sql = "SELECT subdivision_name FROM Subdivision WHERE building_id='".$build_id."'";
$result = mysqli_query($conn, $sql) or die('error getting data');
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		//$sub_name= $row['subdivision_name'];
	echo "<option value='".$row['subdivision_name']."'>".$row['subdivision_name']."</option>";
}
?>


$sql = "SELECT subdivision_name FROM Subdivision";
if($result = mysqli_query($conn, $sql)){
if(mysqli_num_rows($result) > 0){
	 // output data of each row
	 while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			 //$sub_name= $row['subdivision_name'];
		 echo "<option value='".$row['subdivision_name']."'>".$row['subdivision_name']."</option>";
	 }
 }
}
