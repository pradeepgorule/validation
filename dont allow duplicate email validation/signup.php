<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";

        
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
echo "connected";

if (isset($_POST['submit'])) {
	# code...
	$name = $_POST['name'];
	$mail = $_POST['email'];
	$add  = $_POST['mobile'];

	 
	  $sql = "INSERT INTO signup(name,email,mobile) VALUES ('$name','$mail','$add')";

	  $mailqry = " SELECT * FROM signup where email='".$_POST['email']."'";
	  
	  if($result=mysqli_query($conn,$mailqry)){

			if(mysqli_num_rows($result)>0){

			echo "<script>alert('email id already exist in database ');</script>";

			exit(0);


			}


}
	 

	if ($conn->query($sql) === true) {
		
	echo "thank u";
	}
	

}

?><!DOCTYPE html>
<html>
<head>
	<title>sign up </title>
</head>
<body>
	<form method="POST" action="">
	<table>
		<td><label>Name</label></td>
		<td><input type="text" name="name"></td>
		<tr></tr>
		<td><label>Email</label></td>
		<td><input type="text" name="email"></td>
		<tr></tr>
		<td><label>mobile</label></td>
		<td><input type="text" name="mobile"></td>
		<tr></tr>
		<td>
		<input type="submit" name="submit" value="submit"></td>
	</table>
	</form>
</body>
</html>