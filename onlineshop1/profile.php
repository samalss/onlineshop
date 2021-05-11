<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
if(!isset($_SESSION["userid"])){
  header('Location: index.php'); // default page
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>OnlineShop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/profile.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php include "header.php";

  $userid=$_SESSION["userid"];
$sql="SELECT * FROM users WHERE id='$userid'";
$query = mysqli_query($con,$sql);
$row=mysqli_fetch_array($query);


if(isset($_POST["edit_btn"])){   
  $first_name=trim(htmlentities($_POST["first_name"]));
  $last_name=trim(htmlentities($_POST["last_name"]));
  $email=trim(htmlentities($_POST["email"]));
  $password=trim(htmlentities($_POST["password"]));
  
  $sql_upd = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$password' WHERE id = '$userid'";
  $query_upd = mysqli_query($con,$sql_upd);
  echo("<meta http-equiv='refresh' content='0'>");
}
if(isset($_POST["delete_account"])){   

  $sql_del = "DELETE FROM `users` WHERE `users`.`id` = '$userid' ";
  $query_del = mysqli_query($con,$sql_del);
  unset($_SESSION["userid"]);
  echo("<meta http-equiv='refresh' content='0'>");
}

?>
<div class="container" style=" display: flex; justify-content: center; margin-top:4%; margin-bottom:7% ">

  <div style=" display: inline-block; width: 60%;" class="profile_info">
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">  
  <div style="width:100%; padding:2%;" class="row">
      <div class="col">
        Name: 
      </div>

      <div style="color:black;"class="col">
      <input type="text" class="form-control" name="first_name" value=" <?php echo $row["first_name"];?>" >
      
      </div>

    </div>


    <div style="width:100%; padding:2%;" class="row">
      <div class="col">
        Surname: 
      </div>

      <div style="color:black;"class="col">
      <input type="text" class="form-control" name="last_name" value=" <?php echo $row["last_name"];?>" >
      
      </div>

    </div>

    <div style="width:100%; padding:2%;" class="row">
      <div class="col">
        Email: 
      </div>

      <div style="color:black;"class="col">
      <input type="text" class="form-control" name="email" value=" <?php echo $row["email"];?>" >
      
      </div>

    </div>
    <div style="width:100%; padding:2%;" class="row">
      <div class="col">
        Password: 
      </div>

      <div style="color:black;"class="col">
      <input type="text" class="form-control" name="password" value=" <?php echo $row["password"];?>" >
      
      </div>
        
    </div>
    <div class="row">
   
    <div class="col-sm-9">
      <button type="submit" class="btn btn-primary" name="delete_account">DELETE MY ACCOUNT</button>
      </div>
      
      <div class="col-sm-3">
      <button type="submit" class="btn btn-primary" name="edit_btn">EDIT</button>
      </div>
  
     

    </div>
    </form>
  </div>


</div>
<?php include "footer.php" ?>

</body>
</html>

