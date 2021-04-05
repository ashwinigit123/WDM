<?php

$servername = "utacloud";
$username = "ppw1112_admin";
$password = "Admin@2021";
$dbname = "ppw1112_youareondefault";
$sub_name = $_POST['sub_name'];
$update = $_POST['subdivision_update'];
//Collect form values in variables
$data = [
    'sub_name' => $_POST['sub_name'],
    'sub_add' =>  $_POST['sub_add'],
    'First_name' => $_POST['First_name'],
    'Last_name' => $_POST['Last_name'],
    'sub_email' => $_POST['sub_email'],
    'sub_contact' => $_POST['sub_contact'],
];

// Create connection
 if(isset($_POST['subdivision_add']))
 {
  try {
      $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      $sql = "INSERT INTO Subdivision (subdivision_name, adress, primaryContact_firstname,primaryContact_lastname,
      email,phone) VALUES (:sub_name, :sub_add, :First_name,:Last_name,:sub_email,:sub_contact)";
      $pdo->prepare($sql)->execute($data);

      }
      catch (PDOException $pe) {
      die("Could not connect to the database $dbname :" . $pe->getMessage());
  }
}
/*elseif (isset($_POST['subdivision_update'])) {
$dropdown=$_POST['subdiv'];
 try {
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$sql = "UPDATE Subdivision SET subdivision_name=?, adress=?, primaryContact_firstname=?,primaryContact_lastname=?,
email=?, phone=? WHERE id='$subdiv'";
$pdo->prepare($sql)->execute([$data]);
 }
     catch (PDOException $pe) {
     die("Could not connect to the database $dbname :" . $pe->getMessage());
 }
}*/

// Check connection
/*if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$sub_name =  $_REQUEST['sub_name'];
$sub_add = $_REQUEST['sub_add'];
$first_name =  $_REQUEST['First_name'];
$last_name = $_REQUEST['Last_name'];
$phone = $_REQUEST['sub_contact'];
$email = $_REQUEST['sub_email'];

//validations
$query = "SELECT * FROM Subdivision WHERE subdivision_name='$sub_name'";
$result = mysqli_query($query);
$n=mysqli_num_rows($result);
echo $n;
if(mysqli_num_rows($result) > 0) {
    echo "exists".$result;
}


else {
	echo'Record do not exist!';
  echo $sub_name;
	}


/*if(mysqli_query($conn, $sqlquery))
{
  echo "data stored in a database successfully";
}
else{
   echo "ERROR: Hush! Sorry $sqlquery. ".mysqli_error($conn);
 }*/
mysqli_close($conn);
?>
