<?php

   $servername = "utacloud";
   $username = "ppw1112_admin";
   $password = "Admin@2021";
   $dbname = "ppw1112_youareondefault";
   try {
      $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
?>
