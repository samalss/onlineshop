<?php
session_start();
include "db.php";
$error="";
$first_name="";
$last_name="";
$email = "";
$password="";
$confirm_password="";



if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    
    if (strlen(htmlentities($_POST["first_name"]))<"4" || empty($_POST["first_name"])) {
       $error="Please fill out all required fields and try again.";
      } else if(preg_match("/^[a-zA-Z-' ]*$/",htmlentities($_POST["first_name"])) ){
        $first_name = htmlentities($_POST["first_name"]);
            
      }


      if (strlen(htmlentities($_POST["last_name"]))<"4" ||empty($_POST["last_name"])) {
        $error="Please fill out all required fields and try again.";
    } else if( preg_match("/^[a-zA-Z-' ]*$/",htmlentities($_POST["last_name"])) ){
        $last_name = htmlentities($_POST["last_name"]);
            
      }


    if (empty($_POST["password"]) && empty($_POST["confirm_password"])) {
        $error="Please fill out all required fields and try again.";
    } else if(htmlspecialchars($_POST["password"])==htmlspecialchars($_POST["confirm_password"])){
        $password = htmlspecialchars($_POST["password"]);
        $confirm_password=htmlspecialchars($_POST["confirm_password"]);
        if(strlen($password) < "6"){
            $error="Password is too short.";
        }
    }


  if (empty($_POST["email"])) {
    $error="Please fill out all required fields and try again.";
}  else {
        $email = trim($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error="Invalid Email!";
        }

        if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)){
            $error="Invalid Email!";
        } 
    
        $check="";
        $ind=0;
        for ($i=0; $i< strlen($email)-1; $i++){
            if($email[$i]=="."){  //the index of char after dot "."
            $ind=$i+1;
        }
        
        if ($ind>0){  
            $check.=$email[$i+1];  
        }

        if($email[$i]=="@" && $i<"4"){   //at least 8 chars
            $error="Invalid Email!";
        }  
    }

    if($check !="kz" && $check !="net" && $check !="com" ){
        $error="Invalid Email!";
    } 
   
    if((strlen($email)-$ind)>"3") $error="Invalid Email!";; //at least 2
  
}
if(!empty($first_name) && !empty($first_name) && !empty($last_name) && !empty($email) && !empty($password) && !empty($confirm_password)){
  $sql = "SELECT id FROM users WHERE email = '$email' LIMIT 1" ;
  $check_query = mysqli_query($con,$sql);
  $count_email = mysqli_num_rows($check_query);
  if($count_email > 0){
   $error="Email Address is already available. Try Another email address.";
  } else {
    $sql="INSERT INTO `users`(`id`, `first_name`, `last_name`, `email`, `password`) VALUES (NULL, '$first_name', '$last_name', '$email', '$password')";
    $run_query = mysqli_query($con,$sql);

          $_SESSION["userid"] = mysqli_insert_id($con);
          $_SESSION["first_name"] = $first_name;
          $ip_add = getenv("REMOTE_ADDR");
          header("Location: index.php"); 
          $sql = "UPDATE cart SET id = '$_SESSION[userid]' WHERE ip_add='$ip_add' AND user_id = -1";
          if(mysqli_query($con,$sql)){
            header("Location: index.php"); 
            exit;
            }
        }
        }
        }
?>