<?php
session_start();
      require_once("php/includes/config.php");
      $db_handle = new DBController();
      if(!empty($_GET["action"])) {
      switch($_GET["action"]) {
	    case "add":
        if(!empty($_POST["quantity"])) {
          $productByCode = $db_handle->runQuery("SELECT * FROM products WHERE code='" . $_GET["code"] . "'");
          $itemArray = array($productByCode[0]["code"]=>array('productname'=>$productByCode[0]["productname"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'productimage'=>$productByCode[0]["productimage"], 'productinfo'=>$productByCode[0]["productinfo"]));
          
          if(!empty($_SESSION["cart_item"])) {
            if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
              foreach($_SESSION["cart_item"] as $k => $v) {
                  if($productByCode[0]["code"] == $k) {
                    if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                      $_SESSION["cart_item"][$k]["quantity"] = 0;
                    }
                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                  }
              }
            } else {
              $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
            }
          } else {
            $_SESSION["cart_item"] = $itemArray;
          }
        }
      break;
      case "remove":
        if(!empty($_SESSION["cart_item"])) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($_GET["code"] == $k)
                unset($_SESSION["cart_item"][$k]);				
              if(empty($_SESSION["cart_item"]))
                unset($_SESSION["cart_item"]);
          }
        }
      break;
      case "empty":
        unset($_SESSION["cart_item"]);
      break;
    }
  }
  ?>
  <!-- Request Call -->
  <?php
 require_once 'php/includes/config.php';
 if (isset($_POST['request'])){

  $name = $_POST['name'];
  $phone = $_POST['phone'];
  try {
    //code...
    $sql = 'INSERT INTO callrequests(name,phone,Date,Time ) VALUES(?,?,Now(),Now() )';
    $sth = $DBH->prepare($sql);
    $sth->execute(array($name,$phone));
    $_SESSION['success'] = "message sent successfully.";
  } catch (PDOException $e) {
    //throw $th;
    echo $e->getMessage();
  }
  echo "<script>alert('Thank you for Contacting us an agent will be with you Shortly')</script>
  <script>window.location = 'properties.php'</script>";
 }
 
 ?>

 <!-- Site Visits -->
 <?php
 require_once 'php/includes/config.php';
 if (isset($_POST['sitevisits'])){

  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $location = $_POST['location'];
  $preferreddate = $_POST['preferreddate'];
  $message = $_POST['message'];
  $checkbox = $_POST['checkbox'];
 
  try {
    //code...
    $sql = 'INSERT INTO bookings(name,phone,email,location,preferreddate,message,checkbox,Date,Time ) VALUES(?,?,?,?,?,?,?,Now(),Now() )';
    $sth = $DBH->prepare($sql);
    $sth->execute(array($name,$phone,$email,$location,$preferreddate,$message,$checkbox ));
    $_SESSION['success'] = "message sent successfully.";
  } catch (PDOException $e) {
    //throw $th;
    echo $e->getMessage();
  }
  echo "<script>alert('Booking was successfully. We will get back to you shortly')</script>
  <script>window.location = 'properties.php'</script>";
 }
 
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Golden chance | Home</title>
    <!-- Tees Icon -->
    <link rel="icon" href="img/Golden chance logo.png"/>
    <!-- Badge Icons from Font Awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
    />
    <!-- Fonts from Google-->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- Styles -->
    <link href="css/cart.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/extrastyles.css" />
    <link rel="stylesheet" href="php/Admin/css/admin.css" />
  </head>
  <body>
    <header>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
          <a
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarExample01"
            aria-controls="navbarExample01"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </a>
          <a href="home-loggedin.php">
            <img src="img/Golden chance logo.png" class="small-screen-logo" align="right" height="80" width="220" alt="" loading="lazy" style="border-radius:50%;" />
          </a>
          <div class="collapse navbar-collapse" id="navbarExample01">
            <a class="navbar-brand" href="#" style="margin-right:-30px; margin-left:-30px;">
              <img src="img/Golden chance logo.png" class="large-screen-logo" height="100" width="280" alt="" loading="lazy" style="border-radius:50%;" />
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item active">
                <a class="nav-link" aria-current="page" href="home-loggedin.php">Home</a>
              </li>
              <li class="nav-item active" style="cursor:pointer;">
                <a class="nav-link" aria-current="page" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Make Enquiries</a>
              </li>
              <li class="nav-item active" style="cursor:pointer;">
                <a class="nav-link" aria-current="page" onclick="whoweare()">About us</a>
              </li>
              <li class="nav-item me-3 me-lg-0 dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-mdb-toggle="dropdown"
                  aria-expanded="false">Information Center
                 </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                    <a class="dropdown-item" href="services/blogs.php" onclick="showblogs()"> <i class="fa fa-book" aria-hidden="true" style="cursor:pointer;"> Blogs</i> </a>
                  </li>
                  <li>
                   <a class="dropdown-item" href="services/studio.php"> <i class="fa fa-camera" aria-hidden="true" style="cursor:pointer;"> Gallery</i> </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item me-3 me-lg-0 dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-mdb-toggle="dropdown"
                  aria-expanded="false">

                <button
                  class="btn btn-outline-primary"
                  type="submit"
                  name="submit"
                  data-mdb-ripple-color="dark">Our properties
                </button>
                  <img src="img/icons/services.png" alt="services">
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                    <a class="dropdown-item" onclick="showMsg()"> <i class="fa fa-map-marker" aria-hidden="true"> Plots in Mombasa Road</i> </a>
                  </li>
                  <li>
                   <a class="dropdown-item" onclick="showMsg()"> <i class="fa fa-map-marker" aria-hidden="true"> Plots in Matuu</i> </a>
                  </li>
                  <li>
                   <a class="dropdown-item" onclick="showMsg()"> <i class="fa fa-map-marker" aria-hidden="true"> Plots in Gilgil Nakuru</i> </a>
                  </li>
                  <li>
                   <a class="dropdown-item" onclick="showMsg()"> <i class="fa fa-map-marker" aria-hidden="true"> Plots in Ruiru</i> </a>
                  </li>
                  <li>
                  <a class="dropdown-item" onclick="showMsg()"> <i class="fa fa-map-marker" aria-hidden="true"> Plots in Nyandarua</i> </a>
                  </li>
                  </li>
                  <li>
                  <a class="dropdown-item" onclick="showMsg()"> <i class="fa fa-map-marker" aria-hidden="true"> Plots in Juja</i> </a>
                  </li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="tel:0791386752"><i class="fa fa-phone fa fa-flip-horizontal"></i> Own property Today!</a>
                  </li>
                </ul>
              </li>
              
            </ul>
            <ul class="navbar-nav d-flex flex-row">
              <!-- Icons -->
              <li class="nav-item me-3 me-lg-0">
                <a class="nav-link" href="tel:0791386752">
                  <span class="badge badge-pill bg-danger"></span>
                  <span><i class="fa fa-phone fa fa-flip-horizontal"></i></span>
                </a>
              </li>
              <li class="nav-item me-3 me-lg-0">
                <a class="nav-link" target="_blank" href="https://chat.whatsapp.com/C7eN9Xty4an65uNXjLPgH7">
                  <i class="fab fa-whatsapp"></i>
                </a>
              </li>
              <!-- Icon dropdown -->
              <li class="nav-item me-3 me-lg-0 dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-mdb-toggle="dropdown"
                  aria-expanded="false">
                  <i class="fas fa-user"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                    <a class="dropdown-item" href="php/Users/signup.php">Sign Up</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="php/Users/login.php">Log in</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="php/Admin/login.php"><i class="fa fa-lock" aria-hidden="true"></i></a>
                  </li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="tel:0791386752"> <i class="fa fa-phone fa fa-flip-horizontal"></i> We are Just a call away </a>
                  </li>
                </ul>
              </li>
            </ul>
            <iframe name="reload" style="display:none;"></iframe>
              <form class="d-flex input-group w-auto" action="index.php" target="reload" method="POST" onsubmit="property()" style="box-shadow:none;display:flex;">
                <input style="padding:10px;"
                  type="text"
                  class="form-control"
                  placeholder="Search for property"
                  aria-label="Search"
                  name="search"/>
                <button style="margin-bottom:10px;"
                  class="btn btn-outline-primary"
                  type="submit"
                  name="submit"
                  data-mdb-ripple-color="dark">Go
                </button>
              </form>
              
              <script>
                function property(){
                    var search = document.getElementById("store");

                   search.scrollIntoView({
                    behavior:"smooth",
                    block:"end",
                    inline:"nearest"
                })

                }
                
                function whoweare(){
                    var search = document.getElementById("whoweare");

                   search.scrollIntoView({
                    behavior:"smooth",
                    block:"end",
                    inline:"nearest"
                })

                }
            </script>
          </div>
        </div>
      </nav>
      
      <style>
        #video-background{
          width:100vw;
          height:100vh;
          object-fit:cover;
          left:0;
          right:0;
          top:0;
          bottom:0;
          z-index: -1;
        }

        
      </style>
      <!-- Background images -->
      <div class="slideshow-container">
     
      <div class="p-5 text-center bg-image shadow-1-strong"
        style="background-image: url('img/land 1.jpg'); height: 500px;">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
              <h1 class="mb-3">WELCOME TO GOLDEN CHANCE PROPERTIES</h1>
              <h5 class="mb-3">
               Are you Looking for property ?Grab a "GODLEN CHANCE" Today
              </h4>
              <a class="btn btn-outline-light btn-lg" href="mailto: "  role="button">Reach us !</a>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 text-center bg-image shadow-1-strong"
        style="background-image: url('img/land 2.jpg'); height: 500px;">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
              <h1 class="mb-3">GRAB A GOLDEN CHANCE PROPERTY</h1>
              <h5 class="mb-3">
                Begin your journey of success
                Get instatnt property in a few clicks
              </h4>
              <a class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#bookings" role="button">Book a site visit !</a>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 text-center bg-image shadow-1-strong"
        style="background-image: url('img/land 4.jpg'); height: 500px;">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
              <h1 class="mb-3">GRAB A GOLDEN CHANCE PROPERTY</h1>
              <h5 class="mb-3">
              Cheap and affordable properties
              </h4>
              <a class="btn btn-outline-light btn-lg" href="tel: "  role="button">Call Today!</a>
            </div>
          </div>
        </div>
      </div>
      </div>

<!-- Modal for enquiries -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <legend class="modal-title " id="staticBackdropLabel" style="border-radius:20px;"> We Value Your Feedback</legend>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <form action="index.php" method="POST" enctype="multipart/form-data" style="box-shadow:none;">
      <div class="modal-body">
      <fieldset>
        
        <div class="columns">
          <div class="item">
            <label for="booktitle">Name<span>*</span></label>
            <input id="booktitle" type="text" name="name" required/>
          </div>
          <div class="item">
            <label for="information"> Phone<span>*</span></label>
            <input id="information" type="tel" name="phone" required />
          </div>
          <div class="item">
            <label for="information"> Email<span>*</span></label>
            <input id="information" type="email" name="email" required/>
          </div>
          <div class="item">
            <select style="padding-top:8px; padding-bottom:8px;margin-top:20px;" name="type" required>
             <option value="" disabled selected>Select Type of Enquiry</option>
             <option value="Compliment">Compliment</option>
             <option value="Complaint" >Complaint</option>
             <option value="Interest" >Interest</option>
             <option value="Follow up" >Follow up</option>
            </select>
          </div>
          
        </div>
        <div class="item">
            <label for="cover">Describe Your Enquiry<span>*</span></label>
            <textarea type="text" name="information" required></textarea>
        </div>
        
          <div class="item" style="display:flex;">
            <input id="information" type="checkbox" name="checkbox" required/>
            <label for="booktitle">I agree with Terms and conditions<span>*</span></label>
            <style>
              input[type=checkbox]{ 
              display: inline;
              margin-top:5px;
              width:8%;
            }
            </style>
         </div>
         <a href="policies.php">Terms and conditions</a>  
      </fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="enquiries" class="btn btn-primary">Send</button>
      </div>
    </form>

  </div>
  </div>
</div>

<!-- Modal For Booking site visits -->
<div class="modal fade" id="bookings" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <legend class="modal-title btn-primary" id="staticBackdropLabel" style="border-radius:20px;">Book a site visit</legend>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
    <form action="properties.php" method="POST" enctype="multipart/form-data" style="box-shadow:none;">
      <div class="modal-body">
      <fieldset>
        
        <div class="columns">
          <div class="item">
            <label for="booktitle">Name<span>*</span></label>
            <input id="booktitle" type="text" name="name" required/>
          </div>
          <div class="item">
            <label for="information"> Phone<span>*</span></label>
            <input id="information" type="tel" name="phone" required />
          </div>
          <div class="item">
            <label for="information"> Email<span>*</span></label>
            <input id="information" type="email" name="email" required/>
          </div>
          <div class="item">
            <select style="padding-top:8px; padding-bottom:8px;margin-top:17px;" name="location" required>
             <option value="" disabled selected>Location <span>*</span></option>
             <option value="Mombasa Road" >Mombasa Road</option>
             <option value="Matuu" >Matuu</option>
             <option value="Gil Gil Nakuru">Gil Gil Nakuru</option>
             <option value="Ruiru">Ruiru</option>
             <option value="Nyandarua">Nyandarua</option>
             <option value="Juja<">Juja</option>
            </select>
          </div>
            <div class="form-group m-1">
             <label for="information"> Date<span>*</span></label>
              <div class="d-flex input-group w-auto" >
                <span style="margin-bottom:9px;"
                 class="btn btn-outline-primary "
                  type=" "
                  name="submit"
                  data-mdb-ripple-color="dark">
                  <i class="fa fa-calendar" 
                     onclick="setDatepicker(this)">
                  </i>
                </span>
                <input style="padding:10px;" type="text"
                  class="form-control"
                  placeholder=" "
                  aria-label="Search"
                  name="preferreddate"
                  id="dob"
                  value="" required/>
              </div>
            </div>
        </div>
          <div class="item">
            <label for="message"> Additional Message<span>*</span></label>
            <textarea name="message" id="" cols="30" rows="5"></textarea>
          </div>
          <div class="item" style="display:flex;">
            <input id="information" type="checkbox" name="checkbox" required/>
            <label for="booktitle">I agree with Terms and conditions<span>*</span></label>
            <style>
              input[type=checkbox]{ 
              display: inline;
              margin-top:5px;
              width:8%;
            }
            </style>
         </div>
         <a href="policies.php">Terms and conditions</a>  
      </fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="sitevisits" class="btn btn-primary">Book Now!</button>
      </div>
    </form>

  </div>
  </div>
</div>

      <div style="text-align:center"style="display:none;">
          <span class="dot"style="display:none;"></span> 
          <span class="dot"style="display:none;"></span> 
          <span class="dot"style="display:none;"></span> 
        </div>
        <style>
        /* The dots/bullets/indicators */
        .dot {
          height: 15px;
          width: 15px;
          bottom: 0px;
          background-color: aqua;
          border-radius: 50%;
          margin-top: -280px!important;
          display: inline-block;
          transition: background-color 0.6s ease;
          }

        .active {
           background-color: white;
        }
        /*funcbtn*/
        .funcbtn{
          height:15%;
          text-align:center;
          opacity: 1;
          background: blue;
          color:#fff;
          border-radius:25px;
          padding:10px;
        }
        /*viewcbtn*/
        .viewbtn{
          height:15%;
          text-align:center;
          opacity: 1;
          background: rgb(241, 50, 194);
          color:#fff;
          border-radius:25px;
          padding:15px;
          width:100%;
        }
        .viewbtn:hover{
          background:red;
        }
        </style>
        
        <script>
        var slideIndex = 0;
        showSlides();
        
        function showSlides() {
          var i;
          var slides = document.getElementsByClassName("p-5 text-center bg-image shadow-1-strong");
          var dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}    
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
          setTimeout(showSlides, 5000); // Change image every 5 seconds
        }

        </script>


    </header>

    <main class="mt-5">

    <div class="golden chance properties" style="margin-left:auto;margin-right:auto;display:block;text-align:center;">
      <h4 style="color:blue; font-weight:bolder;" >Our Property</h4>
    </div>
    <div class="alertMsg" id="alertMsg">Thank you for showing interest in our properties</div>
    <!-- <div class="alertMsg" id="alertMsg2">Thank you for Contacting us an agent will be with you Shortly</div> -->
    <br>
    </div>

      <div class=" ">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
          <div class="container-fluid">
            <a
              class="navbar-toggler"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#navbarTogglerDemo02"
              aria-controls="navbarTogglerDemo02"
              aria-expanded="false"
              aria-label="Toggle navigation">
              <i class="fas fa-bars"></i>
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <strong class="text-dark mr-2">Find Your Dream Property:</strong>
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <form action=" " method="POST" style="box-shadow:none;">
                    <input type="text" name="search" value="" style="display:none;">
                    <button class="nav-link active" type="submit" name="submit"style="background-color:white;border:none;">All</button>
                  </form>
                </li>
                <li class="nav-item">
                  <form action=" " method="POST" style="box-shadow:none;">
                    <input type="text" name="search" value="Events" style="display:none;">
                    <button class="nav-link" type="submit" name="submit"style="background-color:white;border:none;">Featured Property</button>
                  </form>
                </li>
                <li class="nav-item">
                  <form action=" " method="POST" style="box-shadow:none;">
                    <input type="text" name="search" value="Shoots" style="display:none;">
                    <button class="nav-link" type="submit" name="submit"style="background-color:white;border:none;">Best Selling</button>
                  </form>
                </li>
                <li class="nav-item">
                  <form action=" " method="POST" style="box-shadow:none;">
                    <input type="text" name="search" value="Edits" style="display:none;">
                    <button class="nav-link" type="submit" name="submit"style="background-color:white;border:none;">Hot Deals</button>
                  </form>
                </li>
              </ul>
              <form class="d-flex input-group w-auto" action=" " method="POST" style="box-shadow:none;">
                <input
                  type="text"
                  class="form-control dt-properties-form"
                  placeholder="Search for properties"
                  aria-label="Search"
                  name="search"/>
                <button style="margin-bottom:10px;"
                  class="btn btn-outline-primary"
                  type="submit"
                  name="submit"
                  data-mdb-ripple-color="dark">Go
                </button>
              </form>
            </div>
          </div>
        </nav>

        <!--- database property -->
        
        <section class="text-center mb-4" style="margin-left:auto;margin-right:auto;display:block;" id="store" >
        <div class="row" >
        <div id="product-grid">
          <?php
          if (isset($_POST['submit'])){
            $search = $_POST['search'];
            $product_array = $db_handle->runQuery("SELECT * FROM products where (category LIKE '%" . $_POST["search"] . "%') OR (productname LIKE '%" . $_POST["search"] . "%') OR (productinfo LIKE '%" . $_POST["search"] . "%')OR (price LIKE '%" . $_POST["search"] . "%') OR (products LIKE '%" . $_POST["search"] . "%')");
            if (!empty($product_array)) { 
              foreach($product_array as $key=>$value){
                ?>
          <div class="product-item card" style="width:270px;height:450px;">
          <iframe name="votar" style="display:none;"></iframe>
            <form method="post" target="votar" action="sharazstore.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>" onsubmit="showMsg()" style="box-shadow:none;">
            <div class="product-image">
              <?php if($product_array[$key]['ext'] == 'mp4'){ ?>
                <video style="width:200px; height:200px;" autoplay muted loop>
                 <source src="<?php echo "php/Admin/products/".$product_array[$key]['productimage'];?>" style="max-width:250px; height:200px;margin-left:auto;margin-right:auto;display:block;">
                </video>
                <?php }else{?>
                  <img src="<?php echo "php/Admin/products/".$product_array[$key]['productimage'];?>" style="max-width:250px; height:200px;margin-left:auto;margin-right:auto;display:block;">
              <?php }?>
            </div>
            <div class="product-tile-footer"><br><br><br>
            <div class="product-title"><h5><?php echo $product_array[$key]["productname"]; ?></h5>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <h6><?php echo $product_array[$key]["price"]; ?> ksh</h6>
            <p class="card-text show-read-more">
              <?php echo $product_array[$key]["productinfo"]; ?>
            </p>
            <script>
                      $(document).ready(function() {
                        var maxLength = 50;
                        $(".show-read-more").each(function() {
                          var myStr = $(this).text();
                          if ($.trim(myStr).length > maxLength) {
                            var newStr = myStr.substring(0, maxLength);
                            var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
                            $(this).empty().html(newStr);
                            $(this).append(' <a href="javascript:void(0);" class="read-more">...</a>');
                            $(this).append('<span class="more-text">' + removedStr + '</span>');
                          }
                        });
                        $(".read-more").click(function() {
                          $(this).siblings(".more-text").contents().unwrap();
                          $(this).remove();
                        });
                      });
            </script>
            <style>
              .show-read-more .more-text {
                  display: none;
              }
            </style>
                      <?php
                        require_once 'php/includes/config.php';
                        $sql = "SELECT * FROM soldout WHERE propertyId = '" . $product_array[$key]["id"] . "'";
                        $stmt = $DBH->prepare($sql);
                        $stmt->execute();
                        if ($stmt->rowCount() == 1) {
                          while ($row = $stmt->fetchObject()) {
                        ?>
                            <a class="btn btn-danger" style="cursor: no-drop;">Property Sold Out</a>
                          <?php }
                        } else { ?>
                          <a class="viewbtn" data-bs-toggle="modal" data-bs-target="#vendorcontact">Ask Vendor to Call You</a>
                      <?php } ?>
            
          </div> 
    
        </div>
        </form>
		    </div>
        <?php
        }
      }
    }else{
    $product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY id ASC ");
	  if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
    <div class="product-item card" style="width:270px;height:450px;box-shadow:none;">
    <iframe name="votar" style="display:none;"></iframe>
			<form method="post" target="votar" action="sharazstore.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>" onsubmit="showMsg()" style="box-shadow:none;">
			<div class="product-image">
              <?php if($product_array[$key]['ext'] == 'mp4'){ ?>
                <video style="width:200px; height:200px;" autoplay muted loop>
                 <source src="<?php echo "php/Admin/products/".$product_array[$key]['productimage'];?>" style="max-width:250px; height:200px;margin-left:auto;margin-right:auto;display:block;">
                </video>
                <?php }else{?>
                  <img src="<?php echo "php/Admin/products/".$product_array[$key]['productimage'];?>" style="max-width:250px; height:200px;margin-left:auto;margin-right:auto;display:block;">
              <?php }?>
      </div>
			<div class="product-tile-footer"><br><br><br>
			<div class="product-title"><h5><?php echo $product_array[$key]["productname"]; ?></h5>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <h6><?php echo $product_array[$key]["price"]; ?> ksh</h6>
        <p class="card-text show-read-more">
          <?php echo $product_array[$key]["productinfo"]; ?>
        </p>
            <script>
                      $(document).ready(function() {
                        var maxLength = 50;
                        $(".show-read-more").each(function() {
                          var myStr = $(this).text();
                          if ($.trim(myStr).length > maxLength) {
                            var newStr = myStr.substring(0, maxLength);
                            var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
                            $(this).empty().html(newStr);
                            $(this).append(' <a href="javascript:void(0);" class="read-more">...</a>');
                            $(this).append('<span class="more-text">' + removedStr + '</span>');
                          }
                        });
                        $(".read-more").click(function() {
                          $(this).siblings(".more-text").contents().unwrap();
                          $(this).remove();
                        });
                      });
            </script>
            <style>
              .show-read-more .more-text {
                  display: none;
              }
            </style>
          <?php
            require_once 'php/includes/config.php';
            $sql="SELECT * FROM soldout WHERE propertyId = '".$product_array[$key]["id"]."'";
            $stmt = $DBH->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount() == 1) {
            while($row = $stmt->fetchObject()) {
            ?>
        <a class="btn btn-danger" style="cursor: no-drop;">Property Sold Out</a>
        <?php }}else{?>
          <a class="viewbtn" data-bs-toggle="modal" data-bs-target="#vendorcontact" style="cursor: pointer;"> Ask Vendor to Call You </a>
       <?php }?>
      </div> 
			
			</div>
			</form>
    </div>
    <?php
        }
      }
    }
    ?>
    </div>

<!-- vendor contact modal -->
<div class="modal fade" id="vendorcontact" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="text-align:left;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <legend class="modal-title " id="staticBackdropLabel" style="border-radius:20px;"> We Try to be as Responsive as Possible</legend>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <form action="properties.php" method="POST" enctype="multipart/form-data" style="box-shadow:none;">
      <div class="modal-body">
      <fieldset>
        
        <div class="columns">
          <div class="item">
            <label for="booktitle">Name<span>*</span></label>
            <input id="booktitle" type="text" name="name" required/>
          </div>
          <div class="item">
            <label for="information"> Phone<span>*</span></label>
            <input id="information" type="tel" name="phone" required />
          </div>
          
      </fieldset>
      </div>
      <div class="modal-footer" style="display:flex;">
        <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="request" class="btn btn-primary">Send</button>
      </div>
    </form>

  </div>
  </div>
</div>
    <!-- success message -->
    <script>
      function showMsg()
      {
      $("#alertMsg").fadeIn('slow', function () {
      $(this).delay(1000).fadeOut('slow');
      window.location = 'properties.php'
      });
    }

    // function showMsg2()
    //   {
    //   $("#alertMsg2").fadeIn('slow', function () {
    //   $(this).delay(2000).fadeOut('slow');
    //   });
    // }
    </script>

   <style>
    .alertMsg
    {
     display: none;
     padding: 10px 6px;
     border: 1 px solid;
     background:lightgreen;
     bottom: 300px;
     position: fixed;
     z-index: 1;
     border-radius:20px;
    }
    
    .about-us{
      display:flex;
      justify-content: center;
      margin:10px 10px;
      background-color: rgba(0, 0, 0, 0.2);
      padding-top:20px;
      
    }
    .who-we-are{
      width:30%;
    }
    .core-values{
      width:30%;
    }
    .contacts{
      width:30%;
    }
    .links{
      color:black;
    }
    .reach-us li{
      list-style-type:none;
    }
    .values li{
      list-style:none;
    }
    .values li:before{
      content:"\2714\0020";
    }
    .small-screen-logo{
      display:none;
    }
    .dt-properties-form{
       margin-left:-50px;
      }
    @media only screen and (max-width: 700px) {
    .dt-properties-form{
       margin-left:0px;
      }
    .about-us{
      display:block;
    }
    .who-we-are{
      width:100%;
      margin-left:10px;
    }
    .core-values{
      width:100%;
    }
    .contacts{
      width:100%;
    }
    .small-screen-logo{
      display:block;
      margin:-15px;
    }
    .large-screen-logo{
      display:none;
    }
    }
   </style>
                  
  </section>
  <!-- end --->
  </div>
      
      

        <div class="about-us" id="whoweare">
          <div class="who-we-are">
            <h5 style="color:blue; font-weight:bolder;">Who we are</h5>
            <p>Golden chance is a leading brand in the African real estate sector.
              It was established in the year 2014 and has since then successfully settled its 
              clients on their dream property.
            </p>
            <br><br>
            <h5 style="color:blue; font-weight:bolder;">Our Mission</h5>
            <p>To assist our clients discover valuable investment opportunities in real time
            </p>
            <br><br>
            <h5 style="color:blue; font-weight:bolder;">Our vision</h5>
            <p>To become the most reliable Real Estate company driven by the customer's dream.
            </p>
          </div>
          <div class="core-values">
            <ul class="values">
            <h5 style="color:blue; font-weight:bolder;">Core Values</h5>
              <li>Led by God</li>
              <li>Open and honest</li>
              <li>Team work</li>
              <li>Uphold integrity</li>
              <li>Persue excellence</li>
            </ul>
          </div>
          <div class="contacts">
            <ul class="reach-us">
            <h5 style="color:blue; font-weight:bolder;">We would Love to Hear From You</h5>
              <li class="nav-item me-3 me-lg-0">
                <a class="nav-link links" href="tel:07276660509">
                  <span class="badge badge-pill bg-danger"></span>
                  <span><i class="fa fa-phone fa fa-flip-horizontal"></i> 07276660509</span>
                </a>
              </li>
              <li class="nav-item me-3 me-lg-0">
                <a class="nav-link links" href="tel:0799091006">
                  <span class="badge badge-pill bg-danger"></span>
                  <span><i class="fa fa-phone fa fa-flip-horizontal"></i> 0799091006</span>
                </a>
              </li>
              <li class="nav-item me-3 me-lg-0">
                <a class="nav-link links" href=" ">
                  <span class="badge badge-pill bg-danger"></span>
                  <span><i class="fa fa-map-marker"> Ruiru Town,Bidii House 2nd Floor opposite NHIF,Room c2</i></span>
                </a>
              </li>
              
            </ul>
          </div>
        </div>

    </main>

    <!--Footer-->
    <footer class="text-center text-white" style="background-color: #f1f1f1">
      <!-- Grid container -->
      <div class="container pt-4">
        <!-- Section: Social media -->
        <section class="mb-4">
          <!-- Facebook -->
          <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

          <!-- Twitter -->
          <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

          <!-- Google -->
          <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>

          <!-- Instagram -->
          <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

          <!-- Linkedin -->
          <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>
          <!-- whats app -->
          <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="https://chat.whatsapp.com/C7eN9Xty4an65uNXjLPgH7"
            target="_blank" role="button"
            data-mdb-ripple-color="dark"><i class="fab fa-whatsapp"></i></a>
            
        </section>
        <!-- Section: Social media -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div
        class="text-center text-dark p-3"
        style="background-color: blue;">
        <p style="color:white;"> &copy; Copyright <?php $year=date("Y"); echo $year; ?>
        <a class="text-white" href="sharaztechs.66ghz.com">Golden Chance - Developed By Sharaz Technologies</a></p>
      </div>
      <!-- Copyright -->
    </footer>
  </body>
  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/script1.js"></script>
  <script type="text/javascript"></script>

  <!-- success message -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</html>
