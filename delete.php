<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error)
{
	die("Connection failed:" . $conn->connect_error);
}

    if (isset($_GET['Id'])!="") 
   {
     $Id = $_GET['Id'];
     $sql = "DELETE FROM pictures WHERE Id = $Id";
     $de = mysqli_query($conn,$sql);

     if($de) 
     {
     	
        header("Location:read.php");
     }
     else
     {
     	 echo'not deleted';
     }
   }
 $conn->close();
 
?>