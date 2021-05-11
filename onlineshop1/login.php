<?php 
session_start();
include "db.php";

if(isset($_POST["email"]) && isset($_POST["password"])){
	$email = htmlspecialchars($_POST["email"]);
	$password = htmlspecialchars($_POST["password"]);
	$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if($count > 0){
	    $row = mysqli_fetch_array($run_query);
			$_SESSION["userid"] = $row["id"];
			$_SESSION["name"] = $row["first_name"];
			$ip_add = getenv("REMOTE_ADDR");
}       
	header('Location: index.php'); // default page
}

?>