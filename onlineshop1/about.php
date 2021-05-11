<?php session_start(); ?>
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
  <?php include "header.php"?>

  <br>
  <div style="height: 2400px;">
    <div class="carousel slide" data-ride="carousel" id="slides">
      <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="images/1.jpg">
              <div class="carousel-caption">
                  <h1 class="display-2">OnlineShop</h1>
                  <h3>dress with OnlineShop</h3>
                  <button onclick="window.location.href='shop.php'" type="button" class="btn btn-outline-light btn-lg">view catalog</button>
                  <button onclick="window.location.href='shop.php'" type="button" class="btn btn-warning btn-lg">old collection</button>
              </div>
          </div>
      </div>
  </div>
  <!--Блок с характеристиками-->
  <div class="container-fluid">
     <div class="row text-center alert">
         <div class="col-12">
             <h1 class="display-4">Why does everyone choose us?</h1>
         </div>
         <hr>
         <div class="col-12">
             <p class="lead">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it? </p>
         </div>
     </div>
  </div>
  <!--Блок с описанием -->
  <div class="container-fluid padding">
      <div class="row text-center padding">
          <div class="col-xs-12 col-sm-6 col-md-4">
              <i class="far fa-money-bill-alt"></i>
              <h3>Price</h3>
              <p>All our stores have reasonable prices</p>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
              <i class="fas fa-store"></i>
              <h3>Availability</h3>
              <p>We have hundreds of stores around the world</p>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
              <i class="fab fa-redhat"></i>
              <h3>Style</h3>
              <p>Our clothing models are always in line with fashion</p>
          </div>
      </div>
      <hr class="my-4">
   </div>
  <!--Вещи-->
  <div class="container-fluid padding">
      <div class="row alert text-center">
          <div class="col-12">
              <h1 class="display-4">Clothes</h1>
          </div>
          <hr>
      </div>
  </div>
  <div class="container padding">
      <div class="row padding">
          <div class="col-md-4">
              <div class="card">
                  <img src="images/men.jpg" class="card-img-top">
                  <div class="card-body">
                      <h4 class="card-title">MEN</h4>
                      <p class="card-text">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer to</p>
                      <a href="shop.php" class="btn btn-warning">View more</a>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <img src="images/wom.jpg" class="card-img-top">
                  <div class="card-body">
                      <h4 class="card-title">WOMEN</h4>
                      <p class="card-text">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer to</p>
                      <a href="shop.php" class="btn btn-warning">View more</a>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <img src="images/kid.jpg" class="card-img-top">
                  <div class="card-body">
                      <h4 class="card-title">KIDS</h4>
                      <p class="card-text">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer to</p>
                      <a href="shop.php" class="btn btn-warning">View more</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--История Зары-->
  <div class="container-fluid">
      <div class="row jumbotron">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-112 text-center">
              <h1>OnlineShop's story</h1>
              <hr>
              <p class="lead">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it? </p>
              <hr>
              <a href="shop.php" class="btn btn-danger">Read more</a> 
          </div>
      </div>
  </div>
  </div>

 <?php include "footer.php"?>
 </body>
</html>


