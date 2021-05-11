<?php session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>OnlineShop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/contact.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <?php include "header.php";
  include "db.php";
  if(isset($_SESSION["userid"])){
    $user_id=$_SESSION['userid'];
  }
  $first_name=$last_name=$email=$comment=$message="";
   if(!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["email"]) && !empty($_POST["comment"])){
      if(isset($_POST["send"])){

        $first_name=trim(htmlentities($_POST["first_name"]));
        $last_name=trim(htmlentities($_POST["last_name"]));
        $email=trim(htmlentities($_POST["email"]));
        $comment=trim(htmlentities($_POST["comment"]));

        $sql="INSERT INTO `email` (`id`, `user_id`, `first_name`, `last_name`, `comment`) VALUES (NULL, '$user_id', '$first_name', '$last_name', '$comment')";
        $run_query = mysqli_query($con,$sql);

        $message=' <div style="margin:30px;">
        <div class="alert alert-info">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Your message has been sent!</strong></div>
        </div>';
      }
  }
  ?>
<div class="container">
      <div class="row">
      <div class="col-md-6">
        <div class="contact-form">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <h2>Contact Us</h2>
          <hr>
              <div class="form-group">
           
              <div class="col-xs-6"><input type="text" class="form-control" name="first_name" value="<?php echo $first_name;?>" placeholder="First Name" required="required"></div>
             	
              </div>

              <div class="form-group">
           
                <div class="col-xs-6"><input type="text" class="form-control" name="last_name" value="<?php echo $last_name;?>" placeholder="Last Name" required="required"></div>
                 
                </div>

              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email;?>"  required="required">
              </div>
          
              <div class="form-group">
                <textarea class="form-control" rows="5" id="comment" value="<?php echo $comment;?>"  placeholder="Comment" name="comment"></textarea>
              </div>
              <?php echo $message;?>
          <div class="form-group">
                  <button  style="width:100%;"name="send" type="submit" class="btn btn-primary btn-lg">SEND</button>
              </div>
          </form>
      </div>
      </div>
      
        <div class="col-md-6">
          <br>
          <iframe width="100%" height="555"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2906.7764533415284!2d76.90755611530177!3d43.23514637913792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3883692f027581ad%3A0x2426740f56437e63!2z0JzQtdC20LTRg9C90LDRgNC-0LTQvdGL0Lkg0YPQvdC40LLQtdGA0YHQuNGC0LXRgiDQuNC90YTQvtGA0LzQsNGG0LjQvtC90L3Ri9GFINGC0LXRhdC90L7Qu9C-0LPQuNC5!5e0!3m2!1sru!2skz!4v1587934627968!5m2!1sru!2skz"></iframe>
             
        </div>
        </div>
  </div>
<?php include "footer.php"?>

</body>
</html>


