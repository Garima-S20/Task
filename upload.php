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

$fullname = $_REQUEST['fullname'];
$uploadfile = $_REQUEST['uploadfile'];
$summary = $_REQUEST['summary'];

$sql = "INSERT INTO pictures(fullname, uploadfile, summary)
VALUES ('$fullname', '$uploadfile', '$summary')";

if($conn->query($sql) === TRUE)
{
	echo "New record created successfully";
	header("Location:read.php");
}
   else{
	   echo "Error:" . $sql . "<br>" . $conn->error;
   }

$conn->close();   
?>
