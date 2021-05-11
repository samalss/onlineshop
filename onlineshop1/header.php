<?php
include "db.php";
$ip_add = getenv("REMOTE_ADDR");
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

<nav class="navbar navbar-expand-lg navbar-light bg-light" >
    <a class="navbar-brand" href="index.php" style="margin-right: 30px; font-size: 16pt;">OnlineShop<span style="color: #ff3355;">.</span></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="true">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="navbar-collapse collapse show" id="navb">
      <ul class="navbar-nav mr-auto" style="margin-right: 30px; font-size: 13pt;">
        <li class="nav-item" style="margin-right: 25px; " >
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item" style="margin-right: 25px; " >
          <a class="nav-link" href="about.php">About Us</a>
        </li>
        <li class="nav-item" style="margin-right: 25px; " >
         
            <div class="dropdown">
              <a class="dropbtn"> 
                 <a href="shop.php" class="nav-link">Shop</a>
              </a>
              <div class="dropdown-content">
                <table class="table table-borderless">
                  <thead>
                    <tr class="tr-hover">
                      <th><a href="">CLOTHING</a></th>
                      <th><a href="">SHOES</a></th>
                      <th><a href="">ACCESSORIES</a></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="td-hover">
                      <td><a href="">New Arrivals</a></td>
                      <td><a href="">Top Brands</a></td>
                      <td><a href="">Shirts</a></td>
                    </tr>
                    <tr class="td-hover">
                      <td><a href="">Boots</a></td>
                        <td><a href="">Sandals</a></td>
                          <td><a href="">Sport Shoes</a></td>
                    </tr>
                    <tr class="td-hover">
                      <td><a href="">Watches</a></td>
                        <td><a href="">Jewellery</a></td>
                          <td><a href="">Clutches</a></td>
                    </tr>
                  </tbody>

                  <thead>
                    <tr class="tr-hover">
                      <th><a href="">WOMEN</a></th>
                      <th><a href="">MEN</a></th>
                      <th><a href="">KIDS</a></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="td-hover">
                      <td><a href="">Sweatchirts</a></td>
                        <td><a href="">Shorts</a></td>
                          <td><a href="">Accessories</a></td>
                    </tr>
                    <tr class="td-hover">
                      <td><a href="">Sweatchirts</a></td>
                        <td><a href="">Shorts</a></td>
                          <td><a href="">Accessories</a></td>
                    </tr>
                    <tr class="td-hover">
                      <td><a href="">Boy's Clothing</a></td>
                        <td><a href="">Girl's Clothing</a></td>
                          <td><a href="">Shoes</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          
        </li>
        <li class="nav-item" style="margin-right: 25px; " >
          <a class="nav-link" href="contact.php">Contact</a>
        </li>

        <?php 
        include "db.php";
       if(isset($_SESSION["userid"])){
        $sql = "SELECT first_name FROM users WHERE id='$_SESSION[userid]'";
        $query = mysqli_query($con,$sql);
        $row=mysqli_fetch_array($query);
        
        $_SESSION["name"] = $row["first_name"];

        if($_SESSION["name"]=="admin"){
            echo '<li class="nav-item" style="margin-right: 25px; " >
            <a class="nav-link" href="admin.php">Admin page</a>
          </li>';

        }
       }
        ?>

        <li class="nav-item menu-item-search"> <a class="nav-link toggle-search" href="#"> <i class="icon-magnifier"></i> </a></li>
        
      </ul>

        <button type="button" class="btn" data-toggle="modal" data-target="#myModal">
         <img src="images/search.png" width="20">
        </button>                     
                                     
        <?php
        
        if(isset($_SESSION["userid"])){
         

          ?> <div class="dropdown">
          <button type="button" data-toggle="dropdown" class="btn dropdown-toggle"><img src="images/user.png" width="20"><?php echo " ".$row["first_name"] ?></button>   
            <ul class="dropdown-menu">
              <button style="width: 95%;" onclick="window.location.href='profile.php'" class="button-profile">PROFILE</button>
              <button style="width: 95%;" onclick="window.location.href='exit.php'" class="button-exit">EXIT</button>
            </ul>
          </div>
          <?php }
           else{
        echo '
                <button type="button" class="btn" data-toggle="modal" data-target="#myModal1">
                  <img src="images/user.png" width="20">
                 </button>  ';
        }


        ?>
                               <!-- The Modal -->
                               <div id="myModal1" class="modal fade myModal in" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              
              <!-- Modal body -->
              <div class="modal-body">

                <div class="login" >
                  <div class="circle">
                    <img  style=" margin-top: 20px;" src="images/user.png" width="40" height="40"><br>
                  </div>
                  
                  <a>OnlineShop<span style="color: #ff3355; font-size: 30pt;">.</span></a><br>
                  <div  class="log-text">
                    <a>
                      Create an account to expedite future checkouts, track order history & receive emails, discounts, & special offers
                    </a>
                  </div>
                </div>

                <form action="login.php" method="POST" >
                  <div class="form-group">
                
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                  </div>

                  <div class="form-group">
                  
                             <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                          </div>


                            <div class="form-group form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember" required>
                                Remember me
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Check this checkbox to continue.</div>
                              </label>
                              
                              <div style="float: right;">
                                <a href="" style="color: grey;" >
                                  Lost your password?
                              </a>
                              </div>

                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-dark btn-lg btn-block"><a>LOG IN</a></button>
                            </div>
                            <div style="text-align: center;">
                              <a href="registration.php" style="color: grey;" >
                                Do not have an account ? Create now &rarr;
                            </a>
                            </div>
                          </form>
                        </div>
                        
                        <!-- Modal footer -->
                
                        
                      
                        <script>
                          // Disable form submissions if there are invalid fields
                          (function() {
                            'use strict';
                            window.addEventListener('load', function() {
                              // Get the forms we want to add validation styles to
                              var forms = document.getElementsByClassName('needs-validation');
                              // Loop over them and prevent submission
                              var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
                                  if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                  }
                                  form.classList.add('was-validated');
                                }, false);
                              });
                            }, false);
                          })();
                          </script>  

                  </div>
        </div>
  </div>

        <div class="dropdown">
          <a type="button" class="btn dropdown-toggle" data-toggle="dropdown">
            <span style="color: gray; font-size: 13pt;">
            
            <?php
               
              //When user is logged in then we will count number of item in cart by using user session id
              if (isset($_SESSION["userid"])) {
                $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[userid]";
                $query = mysqli_query($con,$sql);
                $row = mysqli_fetch_array($query);
                echo 'Cart('.$row["count_item"].')';
              } else { 
                $ip_add = getenv("REMOTE_ADDR");
                $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
                $query = mysqli_query($con,$sql);
                $row = mysqli_fetch_array($query);
                echo 'Cart('.$row["count_item"].')';
              }
             
           
            ?>
            </span>
          </a>
       
            
          <div class="dropdown-menu dropdown-menu-right">
             <?php   
              $total_price=0;
             if (isset($_SESSION["userid"])) {
              $sql = "SELECT a.item_id,a.title,a.price,a.image,b.id,b.qty,a.description FROM items a,cart b WHERE a.item_id=b.it_id AND b.user_id='$_SESSION[userid]'";
              $query = mysqli_query($con,$sql);
             
              while ($row=mysqli_fetch_array($query)) {
                
    
                $item_id = $row["item_id"];
                $title = $row["title"];
                $price = $row["price"];
                $image = $row["image"];
                $cart_item_id = $row["id"];
                $qty = $row["qty"];
                $total_price=$total_price+$price;


             echo ' <div class="dropdown-item">
             <a><img src="images/'.$image.'" width="100" height="100"> 
              <a href="#" class="item-cart">' .$title.'</a>
              ' .$price.'$ (x'.$qty.')</a>                
            </div>';
              }}else{

                $sql = "SELECT a.item_id,a.title,a.price,a.image,b.id,b.qty,a.description FROM items a,cart b WHERE a.item_id=b.it_id AND b.ip_add='$ip_add'";
                $query = mysqli_query($con,$sql);
               
                while ($row=mysqli_fetch_array($query)) {
                  
      
                  $item_id = $row["item_id"];
                  $title = $row["title"];
                  $price = $row["price"];
                  $image = $row["image"];
                  $cart_item_id = $row["id"];
                  $qty = $row["qty"];
                  $total_price=$total_price+$price;
  
  
               echo ' <div class="dropdown-item">
               <a><img src="images/'.$image.'" width="100" height="100"> 
                <a href="#" class="item-cart">' .$title.'</a>
                ' .$price.'$ (x'.$qty.')</a>                
              </div>';

              }
            }
              
              
              ?>
        
               <div class="dropdown-item">
                
                  <strong>Total: </strong>
                  <span style="float: right;"><?php echo $total_price."$";?></span>
              </div>

              <div class="dropdown-item">
              <button onclick="window.location.href='cart.php'" class="button button-view">VIEW CART</button>
            
                <button onclick="window.location.href='checkout.php'" class="button button-check">CHECKOUT</button>
                      </div>
     
              </div>
          
            </div>
        </div>

        <div id="myModal" class="modal">
        <?php
         $sql = "SELECT * FROM items";
         $query = mysqli_query($con,$sql);

        ?>
        
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span class="pe-7s-close"></span></button>
                  
                  <form method="POST" class="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                      <div class="pbr-search input-group">
                      <input name="search"  class="form-control" size="100" placeholder="Search…" type="text">
                         
                          <button name="search_btn" type="submit" class="btn">
                              <img src="images/search.png" width="19">
                             </button> 
                          
                      </div>
                  </form>
                  
              </div>
              <div class="modal-body">
                    <?php
                      if(isset($_POST["search_btn"])){
                     while ($row=mysqli_fetch_array($query)) {

                      $item_id = $row["item_id"];
                      $title = $row["title"];
                      $price = $row["price"];
                      $image = $row["image"];
                      $description = $row["description"];
                      $keywords = $row["keywords"];
                     
                      if($_POST["search"]== $keywords){
                        ?>
                         <div style="margin-left: 2%;"class="row">
                                <div class="col-sm-3">
                                <img style="width: 100%; " src="images/<?php echo $image;?>">
                                </div>

                                <div class="col-sm-3">
                                <?php echo $title;?>                                
                                </div>
                              

                              <div class="col-sm-2">
                                <?php echo $price;?>                              
                                </div>
                                <div class="col-sm-4">
                                <form method="POST" class="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                                <button type="submit" value="<?php echo $item_id;?>" class="btn btn-warning"  name="addcart">Add to cart</button>
                                </form>
                                </div>
                                </div>
                        <?php
                      }                    
                    }
                  }
                    ?>
              </div>                                
          </div>
         </div>
      </div>
    
    </div>
    
  </nav>