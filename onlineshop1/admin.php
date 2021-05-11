<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
if($_SESSION["name"]!="admin"){
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
$message_order=$message_item="";
$first_name=$last_name=$email=$password=$user_id=$ip_address="";
$item_id=$title=$price=$description=$image=$keywords="";
$order_user_id=$order_item_id=$order_qty=$order_address="";

if(!empty($_POST["title"]) && !empty($_POST["price"]) && !empty($_POST["description"]) && !empty($_POST["image"]) && !empty($_POST["keywords"])){
    if(isset($_POST["add_item"])){

      $title=trim(htmlentities($_POST["title"]));
      $price=trim(htmlentities($_POST["price"]));
      $description=trim(htmlentities($_POST["description"]));
      $image=trim(htmlentities($_POST["image"]));
      $keywords=trim(htmlentities($_POST["keywords"]));
      
      $sql = "SELECT * FROM items  WHERE image='$image' AND price='$price'";
      $query = mysqli_query($con,$sql);
      $count=mysqli_num_rows($query);
      if($count > 0){
        $message_item=' <div style="margin:30px;">
        <div class="alert alert-info">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Already added!</strong></div>
        </div>';
      }
      else{
      $sql_upd = "INSERT INTO `items` (`item_id`, `title`, `price`, `description`, `image`, `keywords`) VALUES (NULL, '$title', '$price', '$description', '$image', '$keywords');";
      $query_upd = mysqli_query($con,$sql_upd);
     
      }
    }
}

if(!empty($_POST["image"])){
  if(isset($_POST["delete_item"])){
   
    $image=trim(htmlentities($_POST["image"]));
      
    $sql = "SELECT * FROM items  WHERE image='$image'";
    $query = mysqli_query($con,$sql);
    $count=mysqli_num_rows($query);
    if($count > 0){
      $message_item=' <div style="margin:30px;">
      <div class="alert alert-info">
       <button type="button" class="close" data-dismiss="alert">&times;</button>
       <strong>Deleted!</strong></div>
      </div>';
    }
    else{
      $sql_del = "DELETE FROM `items` WHERE `image` = '$image' ";
      $query_del = mysqli_query($con,$sql_del);
      
      $row=mysqli_fetch_array($query);
      $item_id=$row["item_id"];

      $sql_del = "DELETE FROM `cart` WHERE `it_id` = '$item_id' ";
      $query_del = mysqli_query($con,$sql_del);
  
      $sql_del = "DELETE FROM `orders` WHERE `item_id` = '$item_id' ";
      $query_del = mysqli_query($con,$sql_del);
   
    }
  }
}

if(!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["user_id"])){

if(isset($_POST["edit_user"])){
  $user_id=trim(htmlentities($_POST["user_id"]));
  $first_name=trim(htmlentities($_POST["first_name"]));
  $last_name=trim(htmlentities($_POST["last_name"]));
  $email=trim(htmlentities($_POST["email"]));
  $password=trim(htmlentities($_POST["password"]));

  $sql_upd = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$password' WHERE id = '$user_id'";
  $query_upd = mysqli_query($con,$sql_upd);
  echo("<meta http-equiv='refresh' content='0'>");

}

if(!empty($_POST["user_id"])){

  if(isset($_POST["delete_user"])){
    $user_id=trim(htmlentities($_POST["user_id"]));
  
    $sql_del = "DELETE FROM `users` WHERE `users`.`id` = '$user_id' ";
    $query_del = mysqli_query($con,$sql_del);
    
    $sql_del = "DELETE FROM `cart` WHERE `user_id` = '$user_id' ";
    $query_del = mysqli_query($con,$sql_del);

    $sql_del = "DELETE FROM `orders` WHERE `user_id` = '$user_id' ";
    $query_del = mysqli_query($con,$sql_del);

    echo("<meta http-equiv='refresh' content='0'>");
  
  }

}

if(!empty($_POST["order_user_id"]) && !empty($_POST["order_item_id"])  && !empty($_POST["order_qty"])  && !empty($_POST["order_address"])){
  if(isset($_POST["add_order"])){
    $order_user_id=trim(htmlentities($_POST["order_user_id"]));
    $order_item_id=trim(htmlentities($_POST["order_item_id"]));
    $ip_address=trim(htmlentities($_POST["ip_address"]));
    $order_qty=trim(htmlentities($_POST["order_qty"]));
    $order_address=trim(htmlentities($_POST["order_address"]));

    $sql = "SELECT * FROM orders  WHERE user_id='$order_user_id' AND item_id='$order_item_id'";
    $query = mysqli_query($con,$sql);
    $count=mysqli_num_rows($query);

    if($count > 0){
      $message_order=' <div style="margin:30px;">
      <div class="alert alert-info">
       <button type="button" class="close" data-dismiss="alert">&times;</button>
       <strong>Already added!</strong></div>
      </div>';
    }
    else{
    $sql_upd = "INSERT INTO `orders` (`order_id`, `user_id`, `item_id`, `ip_add`, `qty`, `address`) VALUES (NULL, '$order_user_id', '$order_item_id', '$ip_address', '$order_qty', '$order_address');";
    $query_upd = mysqli_query($con,$sql_upd);
  }
}

}


if(!empty($_POST["order_user_id"]) && !empty($_POST["order_item_id"])){
  if(isset($_POST["delete_order"])){
    $order_user_id=trim(htmlentities($_POST["order_user_id"]));
    $order_item_id=trim(htmlentities($_POST["order_item_id"]));
    $sql_del = "DELETE FROM `orders` WHERE `orders`.`user_id` = '$order_user_id' AND `orders`.`item_id` = '$order_item_id'";
    $query_del = mysqli_query($con,$sql_del);
}

}
}

?>
<div class="container" style=" display: flex; justify-content: center; margin-top:4%; margin-bottom:7% ">

  <div style=" display: inline-block; width: 60%;" class="profile_info">
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">  
    
  <ul id="lineblock" class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a style=" font-size: 16pt;" class="nav-link active" data-toggle="tab" href="#Users">Edit Users</a>
    </li>
    <li class="nav-item">
    <a style=" font-size: 16pt;" class="nav-link " data-toggle="tab" href="#Items">Edit Items</a>
    </li>
    <li class="nav-item">
    <a style=" font-size: 16pt;" class="nav-link" data-toggle="tab" href="#Orders">Edit Orders</a>
    </li>
  </ul>


  <div class="tab-content">
  <div id="Users" class="container tab-pane active">
  <div style="width:100%; padding:2%;" class="row">

  <div class="col">
        ID: 
      </div>

      <div style="color:black;"class="col">
      <input type="text" class="form-control" name="user_id" value=" <?php echo $user_id?>" >
      
      </div>

    </div>

        <div style="width:100%; padding:2%;" class="row">
      <div class="col">
        Name: 
      </div>

      <div style="color:black;"class="col">
      <input type="text" class="form-control" name="first_name" value=" <?php echo $first_name?>" >
      
      </div>
        </div>


    <div style="width:100%; padding:2%;" class="row">
      <div class="col">
        Surname: 
      </div>

      <div style="color:black;"class="col">
      <input type="text" class="form-control" name="last_name" value=" <?php echo $last_name?>" >
      
      </div>

    </div>

    <div style="width:100%; padding:2%;" class="row">
      <div class="col">
        Email: 
      </div>

      <div style="color:black;"class="col">
      <input type="text" class="form-control" name="email" value=" <?php echo $email?>" >
      
      </div>

    </div>
    <div style="width:100%; padding:2%;" class="row">
      <div class="col">
        Password: 
      </div>

      <div style="color:black;"class="col">
      <input type="text" class="form-control" name="password" value=" <?php echo $password?>" >
      
      </div>
    </div>
    <div style="text-align: center;"class="row">
      <div class="col-sm-6">
      <button style="width: 40%" type="submit" name="edit_user" class="btn btn-primary">Edit</button>
      </div>
      <div class="col-sm-6">
      <button style="width: 40%"  type="submit" name="delete_user" class="btn btn-primary">Delete</button>
      </div>
    </div>
    </div>
 
    <div id="Items" class="container tab-pane">
   

      <div style="width:100%; padding:2%;" class="row">
    <div class="col">
    Title: 
    </div>

    <div style="color:black;"class="col">
    <input type="text" class="form-control" name="title" value=" <?php echo $title?>" >
    
    </div>
      </div>


  <div style="width:100%; padding:2%;" class="row">
    <div class="col">
      Price: 
    </div>

    <div style="color:black;"class="col">
    <input type="text" class="form-control" name="price" value=" <?php echo $price?>" >
    
    </div>

  </div>

  <div style="width:100%; padding:2%;" class="row">
    <div class="col">
      Description: 
    </div>

    <div style="color:black;"class="col">
    <input type="text" class="form-control" name="description" value=" <?php echo $description?>" >
    
    </div>

  </div>
  <div style="width:100%; padding:2%;" class="row">
    <div class="col">
      Image: 
    </div>

    <div style="color:black;"class="col">
    <input type="text" class="form-control" name="image" value=" <?php echo $image?>" >
    
    </div>
  </div>
  <div style="width:100%; padding:2%;" class="row">
    <div class="col">
      Keywords: 
    </div>

    <div style="color:black;"class="col">
    <input type="text" class="form-control" name="keywords" value=" <?php echo $keywords?>" >
    
    </div>


  </div>
  <?php echo $message_item;?>
  <div style="text-align: center;"class="row">
    <div class="col-sm-6">
    <button style="width: 40%" type="submit" name="add_item" class="btn btn-primary">Add Item</button>
    </div>
    <div class="col-sm-6">
    <button style="width: 40%"  type="submit" name="delete_item" class="btn btn-primary">Delete Item</button>
    </div>
  </div>
    </div>
<div id="Orders" class="container tab-pane">
<div style="width:100%; padding:2%;" class="row">
    <div class="col">
    User ID: 
    </div>

    <div style="color:black;"class="col">
    <input type="text" class="form-control" name="order_user_id" value=" <?php echo $order_user_id?>" >
    
    </div>
      </div>


  <div style="width:100%; padding:2%;" class="row">
    <div class="col">
      Item ID: 
    </div>

    <div style="color:black;"class="col">
    <input type="text" class="form-control" name="order_item_id" value=" <?php echo $order_item_id?>" >
    
    </div>

  </div>

  <div style="width:100%; padding:2%;" class="row">
    <div class="col">
      IP Address: 
    </div>

    <div style="color:black;"class="col">
    <input type="text" class="form-control" name="ip_address" value=" <?php echo $ip_address?>" >
    
    </div>

  </div>

  <div style="width:100%; padding:2%;" class="row">
    <div class="col">
      Quantity: 
    </div>

    <div style="color:black;"class="col">
    <input type="text" class="form-control" name="order_qty" value=" <?php echo $order_qty?>" >
    
    </div>

  </div>
  <div style="width:100%; padding:2%;" class="row">
    <div class="col">
      Address: 
    </div>

    <div style="color:black;"class="col">
    <input type="text" class="form-control" name="order_address" value=" <?php echo $order_address?>" >
    
    </div>
    

  </div>
  <?php echo $message_order;?>
  <div style="text-align: center;"class="row">
    <div class="col-sm-6">
    <button style="width: 40%" type="submit" name="add_order" class="btn btn-primary">Add Order</button>
    </div>
    <div class="col-sm-6">
    <button style="width: 45%"  type="submit" name="delete_order" class="btn btn-primary">Delete Order</button>
    </div>
  </div>
</div>
  </div>
    </form>
  </div>


</div>
<?php include "footer.php" ?>

</body>
</html>

