
<?php
session_start();
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

<?php include "header.php" ?>

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
 </div>




 <div class="container" >
 
  <div class="row" >
    <div class="col" style="padding-top: 30px; padding-bottom: 30px;" >
      <div  class="card" style="background-color: #f8f9fa; width: 250px">
        <div id="container"><img  class="card-img-top" src="images/model-1.jpg" alt="Card image" style="width:100%">
        </div>
          <div class="card-body">
          
         <a   href="shop.php" style="color: black;  margin-top: 30px; font-size: 14pt;"> 
          Lorem ipsum
           <a href="shop.php" class="arrow">&rarr;</a>
          </a>
          </div>
      </div>
    </div>
    <div class="col" style="padding-top: 30px; padding-bottom: 30px;" >
      <div  class="card" style="background-color: #f8f9fa; width: 250px">
        <div id="container"><img  class="card-img-top" src="images/model-2.jpg" alt="Card image" style="width:100%">
        </div>
          <div class="card-body">
          
          <a   href="shop.php" style="color: black;  margin-top: 30px; font-size: 14pt;">
          Lorem ipsum
           <a href="shop.php" class="arrow">&rarr;</a>
          </a>
          </div>
      </div>
    </div>
    <div class="col" style="padding-top: 30px; padding-bottom: 30px;" >

      <div  class="card" style="background-color: #f8f9fa; width: 250px">
        <div id="container"><img  class="card-img-top" src="images/model-3.jpg" alt="Card image" style="width:100%">
        </div>
          <div class="card-body">
          
          <a   href="shop.php" style="color: black;  margin-top: 30px; font-size: 14pt;">
          Lorem ipsum
           <a href="shop.php" class="arrow">&rarr;</a>
          </a>
          </div>
      </div>
    </div>

    <div class="col" style="padding-top: 30px; padding-bottom: 30px;" >
      <div  class="card" style="background-color: #f8f9fa; width: 250px">
        <div id="container"><img  class="card-img-top" src="images/model-4.jpg" alt="Card image" style="width:100%"></div>
          <div class="card-body">
             <a   href="shop.php" style="color: black;  margin-top: 30px; font-size: 14pt;">Lorem ipsum<a href="shop.php" class="arrow">&rarr;</a></a>
          </div>
      </div>
    </div>
  </div>
 </div>
 <div class="container">
   <div class=shop-now>
      <div class="row">
            <div class="col-sm-9"> 
              <img src="images/shop-now-img.jpg" width="100%" height="100%;">
            </div>
            
            <div class="col-sm-3 my-auto">
              <div style="padding-bottom: 60px">
                    <span class="summer">
                        SUMMER COLLECTION
                    </span>
                   <br>
                    <span class="logo-text">
                         OnlineShop<span style="color: #ff3355;">.</span>
                    </span>
                  
               </div>
               <div style="text-align: center; display: block;">
                <button onclick="window.location.href='shop.php'"class="shop-now-btn">
                  SHOP NOW
                </button>
              </div>
              </div>
      </div>
   
  </div>
 </div>











<div class="container">
  <div class="row">
   
    <div class="col" >
      <div id="container">
        <img  class="card-img-top" src="images/shop-1.jpg" alt="Card image" style="width:100%">
       
      <div class="buy-txt">
        <a href="shop.php">Footwear</a>
          <div class="circle-recom">
             <span style="padding: 15%; font-size: 18pt;  color:white;"> <a href="shop.php"> &rarr; </a></span>

            </div>
        </div>
        
      </div>
      </div>


    <div class="col">
      <div id="container">
        <img  class="card-img-top" src="images/shop-2.jpg" alt="Card image" style="width:100%">
        <div class="buy-txt">
          <a href="shop.php">Watches</a>
            <div class="circle-recom">
               <span style=" padding: 15%;  font-size: 19pt; color:white;"> <a href="shop.php"> &rarr; </a></span>

            </div>
          </div>
      </div>

    </div>
    </div>
</div>

<?php include "footer.php"?>

 </body>
</html>


