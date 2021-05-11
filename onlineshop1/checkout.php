
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

$fullname=$email="";
if(isset($_SESSION["userid"])){
$sql="SELECT * FROM users WHERE id='$_SESSION[userid]'";
$query = mysqli_query($con,$sql);
$row=mysqli_fetch_array($query);
$fullname=$row["first_name"]." ".$row["last_name"];
$email=$row["email"];
} 



?>
<div class="container"><br>
      <div class="row">
      <div class="col-md-6">
        <div class="contact-form">
          <form method="post">
          <h2>Billing Address</h2>
          <hr>
              <div class="form-group">
           
              <div class="col-xs-6"><input type="text" class="form-control" name="full_name" placeholder="Full Name" value="<?php echo $fullname;?>" required="required"></div>
             	
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email;?>" required="required">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="Address" placeholder="Address" required="required">
              </div>
          <div class="form-group">
                  <button type="submit" style="width:100%;" name="checkout_btn" class="btn btn-primary btn-lg">CHECKOUT</button>
              </div>
          </form>
      </div>
      </div>
      
        <div class="col-md-6">
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

                                    
              

                if(isset($_POST['checkout_btn'])){
                    if(isset($_SESSION["userid"])){
                        $user_id=$_SESSION["userid"];
                        
                                              
                        $sql_select = "SELECT * FROM orders  WHERE item_id = '$item_id' AND user_id = '$user_id'";
                        $query_select = mysqli_query($con, $sql_select);
                        
                        $count=mysqli_num_rows($query_select);
                        if($count > 0){
                            $message=' <div style="margin:30px;">
                            <div class="alert alert-info">
                             <button type="button" class="close" data-dismiss="alert">&times;</button>
                             <strong>Already ordered!</strong></div>
                            </div>';
                        }else{

                            $user_id=$_SESSION["userid"];
                            $address=htmlspecialchars($_POST["Address"]);
                            $insert="INSERT INTO `orders` (`order_id`, `user_id`, `item_id`, `ip_add`, `qty`, `address`) VALUES (NULL, $user_id, '$item_id', '$ip_add', '$qty', '$address');";
                            $query_insert = mysqli_query($con,$insert);
                            
                            $message=' <div style="margin:30px;">
                            <div class="alert alert-success">
                            <strong>Success!</strong> Your order is accepted.
                          </div>
                            </div>';

                            $sql_delete = "DELETE FROM cart WHERE it_id = '$item_id' AND user_id = '$user_id'";
                            $query_delete = mysqli_query($con,$sql_delete);
                            echo("<meta http-equiv='refresh' content='0'>");
                        }
                } else{
                  
                  $sql_select = "SELECT * FROM orders  WHERE item_id = '$item_id' AND ip_add = '$ip_add'";
                  $query_select = mysqli_query($con, $sql_select);
                  
                  $count=mysqli_num_rows($query_select);
                  if($count > 0){
                      $message=' <div style="margin:30px;">
                      <div class="alert alert-info">
                       <button type="button" class="close" data-dismiss="alert">&times;</button>
                       <strong>Already ordered!</strong></div>
                      </div>';
                  }else{

                      $address=htmlspecialchars($_POST["Address"]);
                      $insert="INSERT INTO `orders` (`order_id`, `user_id`, `item_id`, `ip_add`, `qty`, `address`) VALUES (NULL, '-1', '$item_id', '$ip_add', '$qty', '$address');";
                      $query_insert = mysqli_query($con,$insert);
                      
                      $message=' <div style="margin:30px;">
                      <div class="alert alert-success">
                      <strong>Success!</strong> Your order is accepted.
                    </div>
                      </div>';

                      $sql_delete = "DELETE FROM cart WHERE it_id = '$cart_item_id' AND ip_add = '$ip_add'";
                      $query_delete = mysqli_query($con,$sql_delete);
                      echo("<meta http-equiv='refresh' content='0'>");
                  }
          

                }
               }

               ?>
                 <tbody>
               <tr>
                <td >
                  <div class="row">
                 
                  <div class="col-sm-6">
									<div style=" font-size: 15pt;">
										<span><?php echo $row['title'];?></span>
										</div>
									</div>

                  </div>
                </td>
                
                <td>
                  <div style=" font-size: 15pt;">
										<span><?php echo $price;?></span>
									</div>
                </td>

                <td>
                  <div style=" font-size: 15pt;">
										<span><?php echo $qty;?></span>
									</div>
                </td>


                <td>
                  <div style=" font-size: 15pt;">
										<span><?php echo $qty*$price;?></span>
									</div>
                </td>
              </tr>
              </tbody>
              <?php
             } 
              ?>
      </table>
      <div style="margin-left: 70%; "class="row">

              <div class="col">
                  <strong>Total: <?php echo $total_price."$";?> </strong>
              </div>
      </div>
      </div>
    </form>
    <br>
        </div>
        </div>
  </div>
<?php include "footer.php" ?>
</body>
</html>

