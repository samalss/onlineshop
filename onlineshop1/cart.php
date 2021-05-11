
<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php include "header.php";

if(isset($_POST["update_btn"])){
  $update_id = htmlentities($_POST["update_btn"]);
  $qty = htmlentities($_POST["new_qty"]);

  
  if (isset($_SESSION["userid"])) {
    $userid=htmlentities($_SESSION["userid"]);
		$sql = "UPDATE cart SET qty = '$qty' WHERE it_id = '$update_id' AND user_id = '$userid'";
    $query = mysqli_query($con,$sql);
  }else{
		$sql = "UPDATE cart SET qty='$qty' WHERE it_id = '$update_id' AND ip_add = '$ip_add'";
    $query = mysqli_query($con,$sql);

	}
}

if(isset($_POST["delete_btn"])){
  $delete_id = htmlentities($_POST["delete_btn"]);
  
  
  if (isset($_SESSION["userid"])) {
    $userid=htmlentities($_SESSION["userid"]);

    $sql = "DELETE FROM cart WHERE it_id = '$delete_id' AND user_id = '$_SESSION[userid]'";
    $query = mysqli_query($con,$sql);
  }else{
    $sql = "DELETE FROM cart WHERE it_id = '$delete_id' AND ip_add = '$ip_add'";
    $query = mysqli_query($con,$sql);

	}
}
?>
<div class="container">

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div><br>
      <table  class="table table-hover table-condensed" id="">
      <thead>
						<tr>
							<th style="width:50%">Item</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:7%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>

        

          <?php   
         
              $total_price=0;
             if (isset($_SESSION["userid"])) {
              $sql = "SELECT a.item_id,a.title,a.price,a.image,b.id,b.qty,a.description FROM items a,cart b WHERE a.item_id=b.it_id AND b.user_id='$_SESSION[userid]'";
              $query = mysqli_query($con,$sql);
             } else{
              $sql = "SELECT a.item_id,a.title,a.price,a.image,b.id,b.qty,a.description FROM items a,cart b WHERE a.item_id=b.it_id AND b.ip_add='$ip_add'";
              $query = mysqli_query($con,$sql);
             }
              while ($row=mysqli_fetch_array($query)) {
                
    
                $item_id = $row["item_id"];
                $title = $row["title"];
                $price = $row["price"];
                $image = $row["image"];
                $cart_item_id = $row["id"];
                $qty = $row["qty"];
                $total_price=$total_price+$qty*$price;

               ?>
                 <tbody>
               <tr>
                <td >
                  <div class="row">
                  <div class="col-sm-4 ">
                  <img style="width: 90%; height: 90%;" src="images/<?php echo $image;?>">
                  
                  </div>

                  <div class="col-sm-6">
									<div style=" font-size: 18pt;">
										<span><?php echo $row['description'];?></span>
										</div>
									</div>

                  </div>
                </td>
                
                <td>
                  <div style=" font-size: 18pt;">
										<span><?php echo $price;?></span>
									</div>
                </td>

                <td>
                  <div style="font-size: 18pt;">
                  <input type="text" class="form-control" name="new_qty" value="<?php echo $qty;?>" >
									
									</div>
                </td>


                <td>
                  <div style=" font-size: 18pt;">
										<span><?php echo $qty*$price;?></span>
									</div>
                </td>
                <td>
							<div class="btn-group">
              <button type="submit" value="<?php echo $item_id;?>" class="btn btn-info"  name="update_btn">Update</button>
              <button type="submit" value="<?php echo $item_id;?>" class="btn btn-danger" name="delete_btn">Delete</button>
							</div>							
							</td>
              </tr>
              </tbody>
              <?php
             } 
              ?>
      </table>
    
      </div>
    </form><br>
    <div style="margin-left: 70%; "class="row">

<div class="col">
    <strong>Total: <?php echo $total_price."$";?> </strong>
</div>

<div class="col">
    <button  onclick="window.location.href='checkout.php'" class="btn btn-primary">CHECKOUT</button>
</div>
</div>
<br>

</div>
<?php include "footer.php" ?>

</body>
</html>

