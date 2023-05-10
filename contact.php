<?php

$error = ""; $success = "";


 if (array_key_exists("submit",$_POST)) {

  $data = mysqli_connect("localhost","digismart_users","dataBasesPassword","digismart_users");

  if (mysqli_connect_error()) {

    die("There was an problem connecting to the database. Please try again later");

  }
  

  if (!$_POST['name']) {
    
    $error .= "Name is required.<br>";

  }
  if (!$_POST['email']) {
    
    $error .= "The email field is required.<br>";

  }
  if (!$_POST['number']) {
    
    $error .= "The number field is required.<br>";

  }
  if (!$_POST['message']) {
    
    $error .= "The message is required.<br>";

  }
    if ($error != "") {
   
        $error = '<div class="alert alert-danger" role="alert">
        <p>There were error(s) in the form:</p>
      '.$error;'</div>';    

    } else {  
      
      $query = "SELECT id FROM `request` WHERE email = '".mysqli_real_escape_string($data,$_POST['email'])."' LIMIT 1 ";

      $result = mysqli_query($data,$query);

      if (mysqli_num_rows($result) > 0 ) {

        $error =  "The email you entered already being used. please use another email address";
        
      } else {

        $query = "INSERT INTO `request` (`name`,`email`,`number`,`message`) VALUES ('".mysqli_real_escape_string($data,$_POST['name'])."','".mysqli_real_escape_string($data,$_POST['email'])."',
        '".mysqli_real_escape_string($data,$_POST['number'])."',
        '".mysqli_real_escape_string($data,$_POST['message'])."')";

         if (!mysqli_query($data,$query)) {

          $error = "There was a problem in signing up - please try again later";

         } else {

          $success = '<div class="alert alert-success" role="alert">
          The message was sent successfuly.
          </div>';

         }

      }

    }  

 }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Digismart</title>
</head>
<body>
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <img src="images/logo.png" style="width: 230px;" alt="Digismart Logo">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item  mx-1 ">
            <li class="nav-item  mx-1 ">
              <a class="nav-link" href="index.html">HOME</a>
            </li>
            <li class="nav-item mx-1">
              <a class="nav-link" href="about.html">ABOUT</a>
            </li>
            <li class="nav-item mx-1">
              <a class="nav-link " href="services.html">SERVICES</a>
            </li>
            <li class="nav-item active mx-1">
                <a class="nav-link" href="contact.php" >CONTACT<span class="sr-only">(current)</span></a>
            </li>
        </ul>
      </div>
    </div>
    </nav>
    <div class="jumbotron jumbotron-fluid jumbotron-img3" style="height: 100px;">
        <div class="container">
          <h1 class="display-4">CONTACT US</h1>
        </div>
      </div>
      <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <p><strong> SEND</strong> US A MESSAGE</p>
                <div id="error"><?php echo $error; ?></div>
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Your name*</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" >
                      </div>
                    <div class="form-group">
                      <label for="email">Your email*</label>
                      <input type="email" name="email" class="form-control" id="exampleFormControlInput1" >
                    </div>
                    <div class="form-group">
                        <label for="number">Your phone*</label>
                        <input type="tel" name="number" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                        <label for="message">Write a Message*</label>
                        <div class="textarea">
                        <textarea id="message"  name="message" rows="4" cols="70"></textarea>
                        <div><input type="submit" name="submit" value="Submit"></div>
                        <div id="success"><?php echo $success; ?></div>
                      </div>
                    </div>
                 </div>
                  </form>      
            <div class="col-lg-5">
                <p><strong> FIND </strong> US</p>
                <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.1106423929878!2d77.54175131499174!3d13.092173790776824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae228c323e6f9f%3A0xd5980d5cd256aa31!2s3rd%20Main%20Rd%2C%20Best%20County%202%2C%20Vidyaranyapura%2C%20Bengaluru%2C%20Karnataka%20560097!5e0!3m2!1sen!2sin!4v1597583502232!5m2!1sen!2sin" width="400" height="450" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <p><i class="fa fa-building" aria-hidden="true"></i>
                  134, 3rd Main Road, Best County - 2, Vidyaranyapura Post, Bangalore - 560097, India.
                </p>
                <p>NO.347, 8th Main Road, MSR Road, Near Subbiah Hospital, Gokula 1st Stage, Mathikere, Bangalore - 560097, India</p>    
                <hr>
                <p id="text"><i class="fa fa-phone mr-2 my-2"></i>+91 9019531985<br>
                <i class="fa fa-envelope mr-2 mt-2"></i>info@digismartbusinesssolutions.com</p>
          </div>
         </div>
        </div>
     </div>
<nav  class="navbar navbar-light bg-secondary"  style="height:150px; border-top:solid 4px rgb(173, 173, 173)">
<div class="container">
  <p class="text3"> YOU ARE JUST A CLICK AWAY TO <span style="text-decoration: underline;">INCREASE YOUR BUSINESS REVENUE</span>, WISH YOU DON’T MISS</p>
<form class="form-inline">
 <a href="contact.html"> <button type="button" class="btn btn-success"></a>
    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  </svg>Get in touch</button>
</form>
</div>
</nav>
<nav class="navbar navbar-extend-md navbar-dark bg-dark">
  <div class="container">
  <div class="container">
    <div class="row row-cols-4">
      <div class="col-3 text-left">
        <ul class="nav flex-column navbar-nav">
          <li class="nav-item">
            <h6>Navigation</h6>
          </li>
          <li class="nav-item ">
            <a  class="nav-link active " href="index.html" title="home">Home</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link active " href="about.html" title="about">About</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link active " href="services.html" title="services">Services</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link active " href="contact.php" title="contact">Contact</a>
          </li>
        </ul>
      </div>
      <div class="col-3">
        <ul class="nav flex-column" id="social">
          <li class="nav-item">
            <h6>Get Social</h6>
          </li>
          <li class="nav-item">
            <a href="https://www.facebook.com/digismart.digismart.5" class="social-icon fa fa-facebook bg-success text-light" title="Digismart on Facebook"></a>
            <a href="https://twitter.com/DigiSmart4" class="social-icon fa fa-twitter bg-success text-light" title="Digismart on Twitter"></a>
          </li>
          <li>
            <a href="https://www.instagram.com/digi_smart_" class="social-icon fa fa-instagram bg-success text-light" title="Digismart on Instagram"></a>
            <a href="https://in.linkedin.com/public-profile/in/digismart-digismart-45174a1b3?challengeId=AQGRZvfsDGJsAgAAAXQ1cmMJWRMDY-gSCFykOefoG8qsFE-1j4EAHZC1fyJIYfk3PDouDGgea2SJLALAQKzii6HSoV0R" class="social-icon fa fa-linkedin bg-success text-light"  title="Digismart on Linkedin"></a>
          </li>
        </ul>
      </div>
      <div class="col-5">
        <ul  class="nav flex-column">
          <li class="nav-item">
            <img  class ="footer-logo" src="images/logo-rev.png" alt="">
            <p class="text-light py-0">(A Unit of MS Grafix)</p>
          </li>
          <li>
            <p class="text"><strong>Address 1:</strong>134, 3rd Main Road,</br>Best County - 2, Vidyaranyapura Post, Bangalore - 560097, India.</p> 
            <p class="text"><strong>Address 2:</strong>NO.347, 8th Main Road,<br> MSR Road, Near Subbiah Hospital, Gokula 1st Stage, Mathikere, Bangalore - 560097, India</p>    
          </li>
        </ul>
      </div>
    </div>
      <div class="col">
        <a href="contact.php" class="btn btn-success btn-md mb-2"><i class="fa fa-user-circle mr-2"></i>GET IN TOUCH</a> 
        <p class="text"><i class="fa fa-phone mr-2 my-2"></i>+91 9019531985<br>
          <i class="fa fa-envelope mr-2 mt-2"></i>info@digismartbusinesssolutions.com</p>
      </div>
      </div>
  </nav>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>