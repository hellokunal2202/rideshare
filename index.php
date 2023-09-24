<?php
session_start();
include('connection.php');

//logout
include('logout.php');

//remember me
include('remember.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Sharing Website Final</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="styling.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAqae-o5nTRe28k9M3BazQIPzkr9AQB3zw"></script>
      <style>
          /*margin top for myContainer*/
          #myContainer {
             
              text-align: center;
              color: black;
          }
          
          /*header size*/
          #myContainer h1{
              font-size: 5em;
          }
          
          .bold{
              font-weight: bold;
          }
          #googleMap{
              width: 100%;
              height: 30vh;
              margin: 10px auto;
          }
          .signup{
              margin-top: 20px;
          }
          #spinner{
              display: none;
              position: fixed;
              top: 0;
              left: 0;
              bottom: 0;
              right: 0;
              height: 85px;
              text-align: center;
              margin: auto;
              z-index: 1100;
          }
          #results{
            margin-bottom: 100px;   
          }
          .driver{
            font-size:1.5em;
            text-transform:capitalize;
            text-align: center;
          }
          .price{
            font: size 1.2em;
          }
          .departure, .destination{
            font-size:1.5em;
          }
          .perseat{
            font-size:0.5em;
          }
          .journey{
            text-align:left; 
          }
          .journey2{
            text-align:right; 
          }
          .time{
            margin-top:10px;  
          }
          .telephone{
            margin-top:10px;
          }
          .seatsavailable{
            font-size:0.7em; 
            margin-top:5px;
          }
          .moreinfo{
            text-align:left; 
          }
          .aboutme{
            border-top:1px solid grey;
            margin-top:15px;
            padding-top:5px;
          }
          #message{
            margin-top:20px;
          }
          .journeysummary{
            text-align:left; 
            font-size:1.5em;
          }
          .noresults{
            text-align:center;  
            font-size:1.5em;
          }
          
          .previewing{
              max-width: 100%;
              height: auto;
              border-radius: 50%;
          }
          .previewing2{
              margin: auto;
              height: 20px;
              border-radius: 50%;
          }
          .header {
  background: url('m1.jpg') no-repeat center center;
background-attachment: fixed;
background-size: cover;
  padding: 20px;
  text-align: center;
 
}
          .container {
  display: flex;
  justify-content: space-between; /* Distribute space equally between the child elements */
  padding-bottom: 10px;
  color:#2e5266ff;
  padding-top: 40px;
  padding-bottom:40px;
}

.box {
  flex: 1; /* Grow to take available space equally */
  padding: 20px;
  
}
h6{
  font-size: 28px;
  font-weight: 400px;
}
.about1{
  padding-bottom:20px;
}
.container1 {
            display: flex;
            align-items: center;
            height: 60vh;
            background-color:#004658;
           
        }

        .image-div {
            flex: 1;
            padding: 20px;
        }
        .container1 h5{
          font-size: 40px;
  font-weight:800px;
  color: white;
        }
        .text-div {
            flex: 1;
            padding: 20px;
        }
        .container1 p{
            color:white;}
        img {
            max-width: 100%;
            height: auto;
            display: block;
        }
  .container2 {
            display: flex;
            align-items: center;
            height: 60vh;
           
        }

        .image-div {
            flex: 1;
            padding: 100px;
        }

        .text-div {
            flex: 1;
            padding: 20px;
        }
        .container2 p{
            color:black;
          }
        img {
            max-width: 100%;
            height: auto;
            display: block;
        }
        .container2 h5{
          font-size: 40px;
  font-weight:800px;
  color: black;
        }
        .container1 .signup-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ffff;
            color: #004658; 
            text-decoration: none;
            border: none;
            border-radius: 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .container1 .signup-button:hover {
            background-color: #ffff; 
            color:#007bff;
        }

        .container2 .signup-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #004658;
            color: #ffff; 
            text-decoration: none;
            border: none;
            border-radius: 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .signup-button:hover {
            background-color: #004659; 
            color:white;
        }
          /*footer*/
          .pg-footer {
  font-family: 'Roboto', sans-serif;
}


.footer {
    background-color: #004658;
    color: #fff;
}
.footer-wave-svg {
    background-color: transparent;
    display: block;
    height: 20px;
    position: relative;
    top: -1px;
    width: 100%;
}
.footer-wave-path {
    fill: #fffff2;
}

.footer-content {
    margin-left: auto;
    margin-right: auto;
    max-width: 1230px;
    
    position: relative;
}

.footer-content-column {
    box-sizing: border-box;
    float: left;
    padding-left: 15px;
    padding-right: 15px;
    width: 100%;
    color: #fff;
}

.footer-content-column ul li a {
  color: #fff;
  text-decoration: none;
}

.footer-logo-link {
    display: inline-block;
}
.footer-menu {
    margin-top: 30px;
}

.footer-menu-name {
    color: #fffff2;
    font-size: 15px;
    font-weight: 900;
    letter-spacing: .1em;
    line-height: 18px;
    margin-bottom: 0;
    margin-top: 0;
    text-transform: uppercase;
}
.footer-menu-list {
    list-style: none;
    margin-bottom: 0;
    margin-top: 10px;
    padding-left: 0;
}
.footer-menu-list li {
    margin-top: 5px;
}

.footer-call-to-action-description {
    color: #fffff2;
    margin-top: 10px;
    margin-bottom: 20px;
}
.footer-call-to-action-button:hover {
    background-color: #fffff2;
    color: #00bef0;
}
.button:last-of-type {
    margin-right: 0;
}
.footer-call-to-action-button {
    background-color: #027b9a;
    border-radius: 21px;
    color: #fffff2;
    display: inline-block;
    font-size: 11px;
    font-weight: 900;
    letter-spacing: .1em;
    line-height: 18px;
    padding: 12px 30px;
    margin: 0 10px 10px 0;
    text-decoration: none;
    text-transform: uppercase;
    transition: background-color .2s;
    cursor: pointer;
    position: relative;
}
.footer-call-to-action {
    margin-top: 30px;
}
.footer-call-to-action-title {
    color: #fffff2;
    font-size: 14px;
    font-weight: 900;
    letter-spacing: .1em;
    line-height: 18px;
    margin-bottom: 0;
    margin-top: 0;
    text-transform: uppercase;
}
.footer-call-to-action-link-wrapper {
    margin-bottom: 0;
    margin-top: 10px;
    color: #fff;
    text-decoration: none;
}
.footer-call-to-action-link-wrapper a {
    color: #fff;
    text-decoration: none;
}





.footer-social-links {
    bottom: 0;
    height: 54px;
    position: absolute;
    right: 0;
    width: 236px;
}

.footer-social-amoeba-svg {
    height: 54px;
    left: 0;
    display: block;
    position: absolute;
    top: 0;
    width: 236px;
}

.footer-social-amoeba-path {
    fill: #027b9a;
}

.footer-social-link.linkedin {
    height: 26px;
    left: 3px;
    top: 11px;
    width: 26px;
}

.footer-social-link {
    display: block;
    padding: 10px;
    position: absolute;
}

.hidden-link-text {
    position: absolute;
    clip: rect(1px 1px 1px 1px);
    clip: rect(1px,1px,1px,1px);
    -webkit-clip-path: inset(0px 0px 99.9% 99.9%);
    clip-path: inset(0px 0px 99.9% 99.9%);
    overflow: hidden;
    height: 1px;
    width: 1px;
    padding: 0;
    border: 0;
    top: 50%;
}



.footer-copyright {
    background-color: #027b9a;
    color: #fff;
    padding: 15px 30px;
  text-align: center;
}

.footer-copyright-wrapper {
    margin-left: auto;
    margin-right: auto;
    max-width: 1200px;
}

.footer-copyright-text {
  color: #fff;
    font-size: 13px;
    font-weight: 400;
    line-height: 18px;
    margin-bottom: 0;
    margin-top: 0;
}

.footer-copyright-link {
    color: #fff;
    text-decoration: none;
}







/* Media Query For different screens */
@media (min-width:320px) and (max-width:479px)  { /* smartphones, portrait iPhone, portrait 480x320 phones (Android) */
  .footer-content {
    margin-left: auto;
    margin-right: auto;
    max-width: 1230px;
    padding: 40px 15px 1050px;
    position: relative;
  }
}
@media (min-width:480px) and (max-width:599px)  { /* smartphones, Android phones, landscape iPhone */
  .footer-content {
    margin-left: auto;
    margin-right: auto;
    max-width: 1230px;
    padding: 40px 15px 1050px;
    position: relative;
  }
}
@media (min-width:600px) and (max-width: 800px)  { /* portrait tablets, portrait iPad, e-readers (Nook/Kindle), landscape 800x480 phones (Android) */
  .footer-content {
    margin-left: auto;
    margin-right: auto;
    max-width: 1230px;
    padding: 40px 15px 1050px;
    position: relative;
  }
}
@media (min-width:801px)  { /* tablet, landscape iPad, lo-res laptops ands desktops */

}
@media (min-width:1025px) { /* big landscape tablets, laptops, and desktops */

}
@media (min-width:1281px) { /* hi-res laptops and desktops */

}




@media (min-width: 760px) {
  .footer-content {
      margin-left: auto;
      margin-right: auto;
      max-width: 1230px;
      padding: 40px 15px 450px;
      position: relative;
  }

  .footer-wave-svg {
      height: 50px;
  }

  .footer-content-column {
      width: 24.99%;
  }
}
@media (min-width: 568px) {
  /* .footer-content-column {
      width: 49.99%;
  } */
}
.header p{
  color:white;
}
      
      </style>
  </head>
  <body>
    <!--Navigation Bar-->  
    <?php
    if(isset($_SESSION["user_id"])){
        include("navigationbarconnected.php");
    }else{
        include("navigationbarnotconnected.php");
    }  
    ?>
    
      <div class="container-fluid" id="myContainer">
          <div class="row header">
              <div class="col-md-6 col-md-offset-3 ">
                  <h1>Plan your next trip now!</h1>
                  <p class="lead">Save Your Money ! </p>
                  <p class="bold">
                  </p>
                  <!--Search Form-->
                  <form class="form-inline" method="get" id="searchform" >
                      <div class="form-group">
                          <label class="sr-only" for="departure">Departure:</label>
                          <input type="text" class="form-control" id="departure" placeholder="Departure" name="departure">
                      </div>
                      <div class="form-group">
                          <label class="sr-only"></label>
                          <input type="text" class="form-control" id="destination" placeholder="Destination" name="destination">
                      </div>
                      <input type="submit" value="Search" class="btn btn-lg green" name="search">
                  
                  </form>
                  <!--Search Form End-->
                  
                  <!--Google Map-->
                  
                  <!--Sign up button-->
                  <?php
                  if(!isset($_SESSION["user_id"])){
                      echo '<button type="button" class="btn btn-lg green signup" data-toggle="modal" data-target="#signupModal">Sign up</button>';
                  }
                  ?>
                  <div id="results">
                    <!--will be filled with Ajax Call-->
                  </div>
              
              </div>
          
          </div>
      
      </div>

    <!--Login form/Modal-->    
      <form method="post" id="loginform">
        <div class="modal" id="loginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <!-- model header -->
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Login:    
                  </h4>
                </div>
                <!-- model header ends -->
              <div class="modal-body">
                  
                  <!--Login message from PHP file-->
                  <div id="loginmessage"></div>
                  

                  <div class="form-group">
                      <label for="loginemail" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="loginemail" id="loginemail" placeholder="Email" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="loginpassword" class="sr-only">Password:</label>
                      <input class="form-control" type="password" name="loginpassword" id="loginpassword" placeholder="Password" maxlength="30">
                  </div>
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="rememberme" id="rememberme">
                        Remember me
                      </label>
                          <a class="pull-right" style="cursor: pointer" data-dismiss="modal" data-target="#forgotpasswordModal" data-toggle="modal">
                      Forgot Password?
                      </a>
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <!-- login button -->
                  <input class="btn green" name="login" type="submit" value="Login">
                  <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cancel
                  </button>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="signupModal" data-toggle="modal">
                  Register
                </button>  
              </div>
          </div>
      </div>
      </div>
      </form>

    <!--Sign up form--> 
      <form method="post" id="signupform">
        <div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Sign up today
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Sign up message from PHP file-->
                  <div id="signupmessage"></div>
                  
                  <div class="form-group">
                      <label for="username" class="sr-only">Username:</label>
                      <input class="form-control" type="text" name="username" id="username" placeholder="Username" maxlength="30">
                  </div>
                  <div class="form-group">
                      <label for="firstname" class="sr-only">Firstname:</label>
                      <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Firstname" maxlength="30">
                  </div>
                  <div class="form-group">
                      <label for="lastname" class="sr-only">Lastname:</label>
                      <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Lastname" maxlength="30">
                  </div>
                  <div class="form-group">
                      <label for="email" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="email" id="email" placeholder="Email Address" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="password" class="sr-only">Choose a password:</label>
                      <input class="form-control" type="password" name="password" id="password" placeholder="Choose a password" maxlength="30">
                  </div>
                  <div class="form-group">
                      <label for="password2" class="sr-only">Confirm password</label>
                      <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm password" maxlength="30">
                  </div>
                  <div class="form-group">
                      <label for="phonenumber" class="sr-only">Telephone:</label>
                      <input class="form-control" type="text" name="phonenumber" id="phonenumber" placeholder="Telephone Number" maxlength="15">
                  </div>
                  <div class="form-group">
                      <label><input type="radio" name="gender" id="male" value="male">Male</label>
                      <label><input type="radio" name="gender" id="female" value="female">Female</label>
                  </div>
                  <div class="form-group">
                      <label for="moreinformation">Comments: </label>
                      <textarea name="moreinformation" class="form-control" rows="5" maxlength="300"></textarea>
                  </div>
              </div>
              <!-- sign up to database   -->
              <div class="modal-footer">
                  <input class="btn green" name="signup" type="submit" value="Sign up">
                  <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cancel
                  </button>
              </div>
          </div>
      </div>
      </div>
      </form>

    <!--Forgot password form-->
      <form method="post" id="forgotpasswordform">
        <div class="modal" id="forgotpasswordModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Forgot Password? Enter your email address: 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--forgot password message from PHP file-->
                  <div id="forgotpasswordmessage"></div>
                  

                  <div class="form-group">
                      <label for="forgotemail" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="forgotemail" id="forgotemail" placeholder="Email" maxlength="50">
                  </div>
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="forgotpassword" type="submit" value="Submit">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="signupModal" data-toggle="modal">
                  Register
                </button>  
              </div>
          </div>
      </div>
      </div>
      </form>
      <section class ="about" id="About">
<div class="container">
  <div class="box">
  <img src = "coins.png" width="50px" height ="50px"></img>
  <h6>Your pick of rides at low prices</h6>
  <p>No matter where you’re going, by bus or carpool, find the perfect ride from our wide range of destinations and routes at low prices.</p>
  </div>
  <div class="box">
  <img src = "approval.png" width="50px" height ="50px"></img>
  <h6>Trust who you travel with</h6>
  <p>We take the time to get to know each of our members and bus partners. We check reviews, profiles and IDs, so you know who you’re travelling with and can book your ride at ease on our secure platform.</p>
  </div>
  <div class="box">
  <img src = "lighting.png" width="50px" height ="50px"></img>
  <h6>Scroll, click, tap and go!</h6>
  <p>Booking a ride has never been easier! Thanks to our simple app powered by great technology, you can book a ride close to you in just minutes.</p>
  </div>
</div>

</section>
<section class ="about1">
<div class="container1">
        <div class="image-div">
            <img src="ab1.png" alt="Your Image" width ="400x" height ="400px">
        </div>
        <div class="text-div">
        <h5>Your safety is our priority</h5>
            <p>At Ride-Share, we're working hard to make our platform as secure as it can be. But when scams do happen, we want you to know exactly how to avoid and report them. Follow our tips to help us keep you safe.</p>
            <a href="" class="signup-button" data-dismiss="modal" data-target="signupModal" data-toggle="modal">Sign Up</a>
            </div>
        
    </div>
</section>
<section class ="about1">
<div class="container2">
        
        <div class="text-div">
        <!-- signup button bottom  -->
        <h5>Driving in your car soon?</h5>
            <p>Good news, drivers: get rewarded for your good habits! Earn the Carpool Bonus by completing 3 carpools in 3 months. See eligibility conditions.</p>
            <!-- <a href="signup.html" class="signup-button" data-target="#signupModal">Sign Up</a> -->
            <button type="button" class="btn btn-lg green signup" data-toggle="modal" data-target="#signupModal">Sign up</button>
            </div>
        <div class="image-div">
            <img src="ab2.png" alt="Your Image" width ="400x" height ="400px">
        </div>
    </div>
</section>

    <!-- Footer-->
      <div class="footer">
          <div class="container-al">
              <p> &copy; 2023.</p>
          </div>
      </div>
      
      <!--Spinner-->
      <div id="spinner">
         <img src='ajax-loader.gif' width="64" height="64" />
         <br>Loading..
      </div>
      
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  
    <script src="js/bootstrap.min.js"></script>
    <script src="map.js"></script>  
    <script src="javascript.js"></script>
  </body>
</html>



