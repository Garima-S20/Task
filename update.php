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

if(isset($_GET['Id']))
{
  $Id=$_GET['Id'];
  if(isset($_POST['upload']))
  {
    $fullname = $_POST['fullname'];
    $uploadfile = $_POST['uploadfile'];
    $summary = $_POST['summary'];
  
    $updated=("UPDATE pictures" . "SET fullname = $fullname, uploadfile = $uploadfile, summary = $summary" . "WHERE Id = $Id");
    $up=mysqli_query($conn,$updated);
 
 if($up)
  {
       header("location:read.php");
  }
  else
  {
        echo'no update';
  }
}
}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
<?php 

  if(isset($_GET['Id']))
  {
  $Id = $_GET['Id'];
  $sql = "SELECT * FROM pictures WHERE Id=$Id";
  $gs = mysqli_query($conn,$sql);
  while($profile = mysqli_fetch_array($gs))
  {
	$Id = $profile['Id'];
   $fullname = $profile['fullname'];
    $uploadfile = $profile['uploadfile'];
    $summary = $profile['summary'];
  }
  }
   $conn->close();
?>
                <div class="col-md-12" align="center">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form align="center" method="post" action="<?php $_PHP_SELF ?>">
                        <label for="name"><b>Movie name: </b></label>
				        <input type="text" placeholder="Enter Name" name="fullname"required><br>
				   
				        <label for="img"><b>Image: </b></label>
				        <input type="text" placeholder="Enter image link" name="uploadfile" required><br>
				   
				        <label for="summary"><b>Movie summary: </b></label>
				        <input type="textarea" placeholder="Enter summary" name="summary" required><br>
				   
				        <button type="submit" name="upload" class="btn btn-primary">UPLOAD</button>
					    <a href="read.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
			
    </div>
</body>
</html>