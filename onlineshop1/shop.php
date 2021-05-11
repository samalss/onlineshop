<?php session_start();
$ip_add = getenv("REMOTE_ADDR");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>OnlineShop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
.product .add-to-cart {

  left: 1px;
  right: 1px;
  bottom: 1px;
  padding: 15px;
 
  text-align: center;
  -webkit-transform: translateY(0%);
  -ms-transform: translateY(0%);
  transform: translateY(0%);
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}


.product .add-to-cart .add-to-cart-btn {
  position: relative;
  border: 2px solid transparent;
  height: 40px;
  padding: 0 30px;
  background-color: #ef233c;
  color: #FFF;
  text-transform: uppercase;
  font-weight: 700;
  border-radius: 40px;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}


.product .add-to-cart .add-to-cart-btn:hover {
  background-color: #FFF;
  color: #009bc4;
  border-color: #009bc4;
  padding: 0px 30px 0px 50px;
}


</style>

</head>
<body>

  <?php include "header.php";
  
  
  $message="";
  if(isset($_POST["addcart"])){
    $product_id=$_POST['addcart'];
    if(isset($_SESSION["userid"])){
      $user_id = $_SESSION["userid"];
      

      $sql = "SELECT * FROM cart  WHERE it_id = '$product_id' AND user_id = '$user_id'";
      $query = mysqli_query($con,$sql);
      $count=mysqli_num_rows($query);
      
      if($count > 0){
        $message=' <div style="margin:30px;">
        <div class="alert alert-info">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Already added!</strong></div>
        </div>';
      }
      else{
       $ins="INSERT INTO `cart` (`id`, `it_id`, `ip_add`, `user_id`, `qty`) VALUES (NULL, '$product_id', '$ip_add', '$user_id', '1');";
       $query = mysqli_query($con,$ins);
        echo("<meta http-equiv='refresh' content='0'>");
      }

   } else{
    $sql = "SELECT * FROM cart  WHERE it_id = '$product_id' AND ip_add = '$ip_add'";
    $query = mysqli_query($con,$sql);
    $count=mysqli_num_rows($query);
    
    if($count > 0){
      $message=' <div style="margin:30px;">
      <div class="alert alert-info">
       <button type="button" class="close" data-dismiss="alert">&times;</button>
       <strong>Already added!</strong></div>
      </div>';
    }
    else{
     $ins="INSERT INTO `cart` (`id`, `it_id`, `ip_add`, `user_id`, `qty`) VALUES (NULL, '$product_id', '$ip_add', '-1', '1');";
     $query = mysqli_query($con,$ins);
     echo("<meta http-equiv='refresh' content='0'>");
    }


   } 
  
   
 }

 
  ?>

 <div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item">
      <img src="images/slide-1.jpg" alt="Los Angeles" width="100%" height="200">
      <div class="carousel-caption">
        <h3>Exclusive Products</h3>
        <p>Get awesome items only in OnlineShop!</p>
      </div>   
    </div>
   
    <div class="carousel-item active">
      <img src="images/slider-3.png" alt="New York" width="1100" height="400">
      <div class="carousel-caption">
        <h3>Exclusive Products</h3>
        <p>Get awesome items only in OnlineShop!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="images/slide-7.jpg" alt="New York" width="1100" height="400">
      <div class="carousel-caption">
        <h3>Exclusive Products</h3>
        <p>Get awesome items only in OnlineShop!</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
  <br>
 </div>



  

  
<div class="container">
<div style="margin: 0px auto; text-align: center;  font-size: 20pt; font-family: Roboto Condensed, sans-serif;">
  <h2>Our Products</h2>

</div>
  <br>
  <!-- Nav tabs -->
  <ul id="lineblock" class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a style=" font-size: 16pt; font-family: Roboto Condensed, sans-serif;" class="nav-link active" data-toggle="tab" href="#arrivals">New arrivals</a>
    </li>
    <li class="nav-item">
      <a style=" font-size: 16pt; font-family: Roboto Condensed, sans-serif;"  class="nav-link" data-toggle="tab" href="#Sellers">Best Sellers</a>
    </li>
    <li class="nav-item">
      <a style=" font-size: 16pt; font-family: Roboto Condensed, sans-serif;"  class="nav-link" data-toggle="tab" href="#Trendings">Trendings</a>
    </li>
  </ul>


  <div class="tab-content">

  <?php
     


  

    $sql = "SELECT * FROM items";
    $query = mysqli_query($con,$sql);
    $count=mysqli_num_rows($query);

    $endl=12;
    $ind=0;    
    echo $message;
   
     
    ?>
    <div id="arrivals" class="container tab-pane active"><br>
    <div class="row">
   <?php
   
   while ($row=mysqli_fetch_array($query)) {

    $item_id = $row["item_id"];
    $title = $row["title"];
    $price = $row["price"];
    $image = $row["image"];
    $description = $row["description"];
    $keywords = $row["keywords"];
    $ind++;
    
    ?>
     <div class="col-sm-3">
            <a  style="display: block; text-align: center;" href=""><img src="images/<?php echo $image;?>" width="100%" height="100%"></a>
            <div class="recom-text">
              <a href=""><?php echo $title;?></a>
              <a><?php echo $price;?>$</a>
            </div>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="product">
            <div class='add-to-cart'>
            <button type="submit" value="<?php echo $item_id;?>" class="add-to-cart-btn"  name="addcart">add to cart</button>

									</div>
           </div>
            </form>
      </div>
    <?php
    if($ind%4==0 && $ind!=0){
     echo '</div>';
      echo ' <div class="row">';

    }
    if($ind==$endl){
      echo '</div>';
      echo '</div>';
      echo '<div id="Sellers" class="container tab-pane fade"><br>';
      echo '  <div class="row">';
    }
    if($ind==$endl+4){
      echo '</div>';
      echo '</div>';
      echo '<div id="Trendings" class="container tab-pane fade"><br>';
      echo '  <div class="row">';
    }

  }
   ?>
    </div>
    </div>
     
<br>
 <!----- 
  <div style="margin: 0px auto; text-align: center;  font-size: 20pt; font-family: Roboto Condensed, sans-serif;">
    <button name="load_more" class="shop-now-btn">
      LOAD MORE
    </button>
  </div>
  <br>
 ------>

</div>
</div>

<?php include "footer.php"?>

 </body>
</html>


