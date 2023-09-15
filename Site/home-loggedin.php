<?php session_start();
if(!isset($_SESSION['username'])){
  $_SESSION['redirectURL'] = $_SERVER['REQUEST_URL'];
  header('location:index.php');
}
?>

<?php
require_once 'php/includes/config.php';
$sql="SELECT * FROM users where username='" . $_SESSION["username"] . "'";
$stmt = $DBH->prepare($sql);
$stmt->execute();
$total = $stmt->rowCount();

?>

<?php
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
    <!-- length of blogs -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous">
    </script>
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

    <!-- popup -->
  <script type="text/javascript">
    $(window).on('load', function() {
      $("#myModal3").modal('show');
    });
  </script>
  
  </head>
  <body>
    <!-- popup modal -->

  <div class="modal fade" id="myModal3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:450px;">
      <div class="modal-content">
        <div class="modal-header">
          <legend class="modal-title " id="staticBackdropLabel" style="border-radius:20px;"> Today's Top Deal</legend>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="$('#myModal3').modal('hide')"></button>
        </div>
        <div class="modal-body">
          <!-- content offer goes here -->

          <?php
            require_once 'php/includes/config.php';
            $offer="SELECT * FROM offers order by id DESC LIMIT 1";
            $stmtoffer = $DBH->prepare($offer);
            $stmtoffer->execute();
            while($offerrow = $stmtoffer->fetchObject()) {
            ?>
          
          <h3 class="text-center"><?php echo $offerrow->productname; ?></h3>
            <div class="blog-img" style="margin-left:auto; margin-right:auto; display:block;">
              <?php if($offerrow->ext == 'mp4'){ ?>
                <video height="100%" style="max-width:430px;" controls>
                 <source src="<?php echo "php/Admin/offers/". "{$offerrow->productimage}";?>">
                </video>
                <?php }else{?>
                    <img class="offer-image" src="<?php echo "php/Admin/offers/". "{$offerrow->productimage}";?>" height="100%;" style="max-width:430px;" />
              <?php }?>
            </div>
          <p class="text-center p-2"><b><?php echo $offerrow->productinfo; ?></b></p>
        
          <?php }?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal" onclick="$('#myModal3').modal('hide')">Cancel</button>
          </div>

      </div>
    </div>
  </div>
  <!-- end pop up -->
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
              <a class="nav-link" aria-current="page" href="home-loggedin.php"><p style="font-weight: bolder;">Home</p></a>
            </li>
            <li class="nav-item active" style="cursor:pointer;">
              <a class="nav-link" aria-current="page" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><p style="font-weight: bolder;">Make Enquiries</p></a>
            </li>
            <li class="nav-item active" style="cursor:pointer;">
              <a class="nav-link" aria-current="page" onclick="whoweare()"><p style="font-weight: bolder;">About us</p></a>
            </li>
            <li class="nav-item active" style="cursor:pointer;">
              <a class="nav-link" aria-current="page" onclick="contactus()"><p style="font-weight: bolder;">Contact us</p></a>
            </li>
            <li class="nav-item active" style="cursor:pointer;">
              <a class="nav-link" aria-current="page" onclick="showblogs()"><p style="font-weight: bolder;">Blogs</p></a>
            </li>
            <li class="nav-item active" style="cursor:pointer;">
              <a class="nav-link" aria-current="page" href="services/studio.php"><p style="font-weight: bolder;">Gallery</p></a>
            </li>

            <!-- <li class="nav-item me-3 me-lg-0 dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false"><p style="font-weight: bolder;">Gallery</p></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item" onclick="showblogs()"> <i class="fa fa-book" aria-hidden="true" style="cursor:pointer;"> Blogs</i> </a>
                </li>
                <li>
                  <a class="dropdown-item" href="services/studio.php"> <i class="fa fa-camera" aria-hidden="true" style="cursor:pointer;"> View Gallery</i> </a>
                </li>
              </ul>
            </li>  -->
             
            <li class="nav-item me-3 me-lg-0 dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">

                <button class="btn btn-outline-primary" type="submit" name="submit" data-mdb-ripple-color="dark">Our properties
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
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item" href="tel:0791386752"><i class="fa fa-phone fa fa-flip-horizontal"></i> Own property Today!</a>
            </li>
          </ul>
          </li>
  
          </ul>
            <ul class="navbar-nav d-flex flex-row">
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
                  <?php
                    while($row = $stmt->fetchObject()) {
                  ?>
                    <p class="dropdown-item" style="">Logged in as : <?php echo "{$row->username}"; ?></p> 
                  <?php
                    }
                  ?>
                  <li>
                    <a class="dropdown-item" href="php/includes/logout.php">Log Out</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="php/Admin/login.php"><i class="fa fa-lock" aria-hidden="true"></i></a>
                  </li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="tel:0740027027"> <i class="fa fa-phone fa fa-flip-horizontal"></i> We are Just a call away </a>
                  </li>
                </ul>
              </li>
            <!-- Icons -->
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" target="_blank" href="mailto:goldenchancerealestateltd@gmail.com">
                <i class="fa fa-envelope"><p style="font-weight:bolder;"></p></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="tel:0740027027">
                <span class="badge badge-pill bg-danger"></span>
                <span><i class="fa fa-phone fa fa-flip-horizontal"></i></span>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" target="_blank" href="https://wa.me/+254740027027">
                <i class="fab fa-whatsapp"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="tel:0740027027">
                <span class="badge badge-pill bg-danger"></span>
                <span style="font-weight:bolder;">0740027027</span>
              </a>
            </li>
            
          </ul>
          <!-- <iframe name="reload" style="display:none;"></iframe>
          <form class="d-flex input-group w-auto" action="index.php" target="reload" method="POST" onsubmit="property()" style="box-shadow:none;display:flex;">
            <input style="padding:10px;" type="text" class="form-control" placeholder="Search for property" aria-label="Search" name="search" />
            <button style="margin-bottom:10px;" class="btn btn-outline-primary" type="submit" name="submit" data-mdb-ripple-color="dark">Go
            </button>
          </form> -->
            
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
                function contactus() {
                var search = document.getElementById("contactus");

               search.scrollIntoView({
                behavior: "smooth",
                block: "end",
                inline: "nearest"
              })

               }
                
                function showblogs(){
                    var search = document.getElementById("blogs");

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
     
      <div class="p-5 text-center bg-image shadow-1-strong">
        <video id="video-background" src="img/background video1.mp4" style="margin:-55px; 0px; height: 559px;" autoplay muted loop></video>
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
              <h1 class="mb-3">WELCOME TO GOLDEN CHANCE PROPERTIES</h1>
              <h5 class="mb-3">
               Are you Looking for property ?Grab a "GOLDEN CHANCE" Today
              </h4>
              <a class="btn btn-outline-light btn-lg"  href="mailto:goldenchancerealestateltd@gmail.com"  role="button">Reach us !</a>
              <div class="offer-btn" style="margin-top:10px;">
                  <button>
                   <a class=" " aria-current="page" data-bs-toggle="modal" data-bs-target="#myModal3"style="color:white;">View Offers</a>
                  </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 text-center bg-image shadow-1-strong">
      <video id="video-background" src="img/bgvideo2.mp4" style="margin:-55px; 0px; height: 559px;" autoplay muted loop></video>
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
              <h1 class="mb-3">GRAB A GOLDEN CHANCE PROPERTY</h1>
              <h5 class="mb-3">
                Begin your journey of success
                Get instant property in a few clicks
              </h4>
              <a class="btn btn-outline-light btn-lg"  href="mailto:goldenchancerealestateltd@gmail.com"  role="button">Reach us !</a>
              <div class="offer-btn" style="margin-top:10px;">
                  <button>
                   <a class=" " aria-current="page" data-bs-toggle="modal" data-bs-target="#myModal3"style="color:white;">View Offers</a>
                  </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 text-center bg-image shadow-1-strong">
        <video id="video-background" src="img/video3.mp4" style="margin:-55px; 0px; height: 559px;" autoplay muted loop></video>
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
              <h1 class="mb-3">GRAB A GOLDEN CHANCE PROPERTY</h1>
              <h5 class="mb-3">
              Cheap and affordable properties
              </h4>
              <a class="btn btn-outline-light btn-lg"  href="mailto:goldenchancerealestateltd@gmail.com" role="button">Reach us !</a>
              <div class="offer-btn" style="margin-top:10px;">
                  <button>
                   <a class=" " aria-current="page" data-bs-toggle="modal" data-bs-target="#myModal3"style="color:white;">View Offers</a>
                  </button>
              </div>
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
          background: blue;
          color:#fff;
          border-radius:25px;
          padding:10px;
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

    <div class="golden-chance-properties" style="margin-left:auto;margin-right:auto;display:block;text-align:center;">
      <h4 style="color:blue; font-weight:bolder;">Featured Property</h4>
    </div>
    <div class="alertMsg" id="alertMsg">Thank you for showing interest in our properties</div>
    <br>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container-fluid">
          <a class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </a>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <strong class="text-dark mr-2">Find Your Dream Property:</strong>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <form action=" " method="POST" style="box-shadow:none;background-color:transparent;">
                  <input type="text" name="search" value="" style="display:none;">
                  <button class="nav-link active" type="submit" name="submit" style="background-color: rgb(241, 50, 194);border:none;color:white;">All</button>
                </form>
              </li>
              <li class="nav-item">
                <form action=" " method="POST" style="box-shadow:none;background-color:transparent;">
                  <input type="text" name="search" value="featured" style="display:none;">
                  <button class="nav-link" type="submit" name="submit" style="background-color:transparent;border:none;">Featured Property</button>
                </form>
              </li>
              <li class="nav-item">
                <form action=" " method="POST" style="box-shadow:none;background-color:transparent;">
                  <input type="text" name="search" value="bestselling" style="display:none;">
                  <button class="nav-link" type="submit" name="submit" style="background-color:transparent;border:none;">Best Selling</button>
                </form>
              </li>
              <li class="nav-item">
                <form action=" " method="POST" style="box-shadow:none;background-color:transparent;">
                  <input type="text" name="search" value="hotdeals" style="display:none;">
                  <button class="nav-link" type="submit" name="submit" style="background-color:transparent;border:none;">Hot Deals</button>
                </form>
              </li>
            </ul>
            <form class="d-flex input-group w-auto" action=" " method="POST" style="box-shadow:none;background-color:transparent;">
              <input type="text" class="form-control dt-properties-form" placeholder="Search for properties" aria-label="Search" name="search" />
              <button style="margin-bottom:10px;" class="btn btn-outline-primary" type="submit" name="submit" data-mdb-ripple-color="dark">Go
              </button>
            </form>
          </div>
        </div>
      </nav>

      <div class="properties">
      <!--- database property -->
      <section class="text-center mb-4" style="margin-left:auto;margin-right:auto;display:block;" id="store">
        <div class="row">
          <div id="product-grid">
            <?php
            if (isset($_POST['submit'])) {
              $search = $_POST['search'];
              $product_array = $db_handle->runQuery("SELECT * FROM products where (category LIKE '%" . $_POST["search"] . "%') OR (productname LIKE '%" . $_POST["search"] . "%') OR (productinfo LIKE '%" . $_POST["search"] . "%')OR (price LIKE '%" . $_POST["search"] . "%') OR (products LIKE '%" . $_POST["search"] . "%') GROUP BY code");
              if (!empty($product_array)) {
                foreach ($product_array as $key => $value) {
            ?>
                <a style="color:black;" title="see details of property" href="services/property.php?property=<?php echo $product_array[$key]["code"]; ?>">
                  <div class="product-item card" style="width:270px;height:450px;">
                    <iframe name="votar" style="display:none;"></iframe>
                    <form method="post" target="votar" action="sharazstore.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>" onsubmit="showMsg()" style="box-shadow:none;">
                      <div class="btn-warning" style="position:absolute;padding:10px 20px;margin-left:-2px;transform: skew(-20deg);"><?php echo $product_array[$key]["category"]; ?></div>
                      <div class="product-image">
                        <?php if ($product_array[$key]['ext'] == 'mp4') { ?>
                          <video style="width:300px; height:310px;margin-top:-70px;" controls>
                            <source src="<?php echo "php/Admin/products/" . $product_array[$key]['productimage']; ?>" style="max-width:250px; height:200px;margin-left:auto;margin-right:auto;display:block;">
                          </video>
                        <?php } else { ?>
                          <img src="<?php echo "php/Admin/products/" . $product_array[$key]['productimage']; ?>" style="width:300px; height:250px;margin-left:auto;margin-right:auto;display:block;">
                        <?php } ?>
                      </div>
                      <div class="product-tile-footer"><br><br><br><br>
                        <div class="product-title">
                          <h5><?php echo $product_array[$key]["productname"]; ?></h5>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <h6>Kes <?php echo number_format($product_array[$key]["price"]); ?>/=</h6>
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
                        </div>

                        <?php
                        require_once 'php/includes/config.php';
                        $sql = "SELECT * FROM soldout WHERE propertyId = '" . $product_array[$key]["code"] . "'";
                        $stmt = $DBH->prepare($sql);
                        $stmt->execute();
                        if ($stmt->rowCount() == 1) {
                          while ($row = $stmt->fetchObject()) {
                        ?>
                            <!-- <a class="btn btn-danger" style="cursor: no-drop;">Property Sold Out</a> -->
                            <a class="btn btn-danger" href="services/property.php?property=<?php echo $product_array[$key]["code"]; ?>">Property Sold Out</a>
                          <?php }
                        } else { ?>
                           <!-- <button class="viewbtn" onclick="showMsg()">View Property</button> -->
                           <a class="btn viewbtn" href="services/property.php?property=<?php echo $product_array[$key]["code"]; ?>">View Property</a> 
                        <?php } ?>

                      </div>
                    </form>
                  </div>
                </a>

                <!-- success message -->
                <script>
                   function showMsg() {
                   $("#alertMsg").fadeIn('slow', function() {
                   $(this).delay(3000).fadeOut('slow');
                   window.location = 'properties.php'
                  });
                 }
                </script>
                <?php
                }
              }
            } else {
              $product_array = $db_handle->runQuery("SELECT * FROM products WHERE category = 'featured' GROUP BY code ORDER BY id ASC ");
              if (!empty($product_array)) {
                foreach ($product_array as $key => $value) {
                ?>
                <a style="color:black;" title="see details of property" href="services/property.php?property=<?php echo $product_array[$key]["code"]; ?>">
                  <div class="product-item card" style="width:270px;height:450px;box-shadow:none;">
                    <iframe name="votar" style="display:none;"></iframe>
                    <form method="post" target="votar" action="sharazstore.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>" onsubmit="showMsg()" style="box-shadow:none;">
                      <div class="btn-warning" style="position:absolute;padding:10px 20px;margin-left:-2px;transform: skew(-20deg);"><?php echo $product_array[$key]["category"]; ?></div>
                      <div class="product-image">
                        <?php if ($product_array[$key]['ext'] == 'mp4') { ?>
                          <video style="width:300px; height:310px;margin-top:-70px;" controls>
                            <source src="<?php echo "php/Admin/products/" . $product_array[$key]['productimage']; ?>" style="max-width:250px; height:200px;margin-left:auto;margin-right:auto;display:block;">
                          </video>
                        <?php } else { ?>
                          <img src="<?php echo "php/Admin/products/" . $product_array[$key]['productimage']; ?>" style="width:300px; height:250px;margin-left:auto;margin-right:auto;display:block;">
                        <?php } ?>
                      </div>
                      <div class="product-tile-footer"><br><br><br><br>
                        <div class="product-title">
                          <h5><?php echo $product_array[$key]["productname"]; ?></h5>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <h6>Kes <?php echo number_format($product_array[$key]["price"]); ?>/=</h6>
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
                        </div>

                        <?php
                        require_once 'php/includes/config.php';
                        $sql = "SELECT * FROM soldout WHERE propertyId = '" . $product_array[$key]["code"] . "'";
                        $stmt = $DBH->prepare($sql);
                        $stmt->execute();
                        if ($stmt->rowCount() == 1) {
                          while ($row = $stmt->fetchObject()) {
                        ?>
                            <!-- <a class="btn btn-danger" style="cursor: no-drop;">Property Sold Out</a> -->
                            <a class="btn btn-danger" href="services/property.php?property=<?php echo $product_array[$key]["code"]; ?>">Property Sold Out</a>
                          <?php }
                        } else { ?>
                           <!-- <button class="viewbtn" onclick="showMsg()">View Property</button> -->
                           <a class="btn viewbtn" href="services/property.php?property=<?php echo $product_array[$key]["code"]; ?>">View Property</a> 
                        <?php } ?>


                      </div>
                    </form>
                  </div>
                </a>

                <!-- success message -->
                <script>
                   function showMsg() {
                   $("#alertMsg").fadeIn('slow', function() {
                   $(this).delay(3000).fadeOut('slow');
                   window.location = 'properties.php'
                  });
                 }
                </script>
            <?php
                }
              }
            }
            ?>
          </div>
    
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
    .progress{
      display:flex;
      padding-top:30px;
      padding-bottom:120px;
    }
    .wrapper{
      display:flex;
      justify-content: center;
    }
    .dt-properties-form{
       margin-left:-50px;
    }
    .service{
      width:80%;
    }
    .conatct{
      width:40%;
    }
    .row-blog{
      display:flex;
      /* flex-wrap: wrap; */
    }
    .blog{
      display:flex;
    }
    .blog-img{
      width:50%
    }
    .information{
      width:50%;
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
    .offer-image{
      width:456px;
      margin-left:-110px;
    }
    .properties{
      overflow-x:hidden;
      margin-top:-90px;
    }
    @media only screen and (max-width: 700px) {
      .progress{
        display:block;
        padding-bottom:450px;
      }
      .wrapper{
        display:block;
      }
      .dt-properties-form{
       margin-left:0px;
      }
      .service{
      width:100%;
     }
    .conatct{
      width:100%;
    }
    .row-blog{
      display:block;
      margin:auto;
      height:550px;
    }
    .blog{
      display:block;
    }
    .blog-img{
      width:90%
    }
    .information{
      width:100%;
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
    .offer-image{
      width:100%;
      margin-left:0px;
    }
    .properties{
      overflow:scroll;
      height:700px;
      overflow-x:hidden;
      margin-top:-15px;
    }
    }
   </style>
                  
  </section>
  <!-- end --->
  </div>
      <!-- awards,progress -->
      <div class="progress text-center text-white" style="background-color: blue;">
        <div class="icon" style="margin-left:auto;margin-right:auto;display:block;color: white;">
          <i class="fa fa-users fa-2x" aria-hidden="true"></i>
          <h5>1000+</h5>
          <h4>Happy Clients</h4>
        </div>
        <div class="icon" style="margin-left:auto;margin-right:auto;display:block;color: white;">
          <i class="fa fa-trophy fa-2x" aria-hidden="true"></i>
          <h5>20+</h5>
          <h4>Awards</h4>
        </div>
        <div class="icon" style="margin-left:auto;margin-right:auto;display:block;color: white;">
          <i class="fa fa-bookmark fa-2x" aria-hidden="true"></i>
          <h5>50+</h5>
          <h4>Projects Done</h4>
        </div>
        <div class="icon" style="margin-left:auto;margin-right:auto;color: white;">
         <i class="fa fa-file fa-2x" aria-hidden="true"></i>
         <h5>300+</h5>
         <h4>Issued Titles</h5>
        </div>
      </div>
      <div class="why-choose-us" style="display:flex;">
          <img src="img/sitebanner.png" class="img-fluid" alt="" style="width:100%"> 
      </div>
      
      <!-- contact us-->
      <div class="wrapper" id="contactus">
        <div class="service picture" style="margin-top:50px;">
            <img class="img-fluid" src="img/contactus.jpg" alt="" height="470px">
        </div>
        <div class="contact form-information" style="margin-top:50px;">
        <form action="index.php" method="POST" style="box-shadow:none;">
        <div class="form-container">
            <div class="container">
                <h3>We would Love To hear From You<img src="img/icons/services.png" alt=""align="left" width="50"></h3>
                <hr><br>
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="name" required>
                <label for="Email"><b>email</b></label>
                <input type="email" placeholder="Enter email" name="email" required>
                <label for="password"><b>Your Message</b></label>
                <textarea type="text" name="message" placeholder="Enter message" required></textarea>
                <label for="refreral"><b>How did you hear about us</b></label>
                <input type="text" placeholder="We appreciate the support" name="referals" >

                <button type="submit" name="contactmsg" style="color:white;">Send</button>
                
            </div>
          </div>
        </form>
        </div>
      </div>
      <br><br>

      <div class="Happy Clients">
        <div class="testiomonials" style="margin-left:auto;margin-right:auto;display:block;text-align:center;color:blue;">
          <h4 style="font-weight: bolder;" >Happy Clients</h4>
          <div class="border-img">
            <img src="img/border.png" alt="" class="img-fluid"style="margin-bottom:10px;">
          </div>
        </div>

        <div class="testimonies">
          <div class="testimonial" style="text-align:center; box-shadow: pink;">
           <p>Selling and buyingis incredibly stressful! Thankfully,we had a great team at the Golden
            Chance Real Estate Team to walk us through the process and make our experince as stress-free
            as possible.
           </p>
           <h5 style="font-weight: bolder;">Harry Kuria</h5>
          </div>

          <div class="testimonial" style="text-align:center; box-shadow: pink;">
           <p>Golden Chance is one of the most reliable real estate companies, they go beyond any 
            expectation and get things done.
           </p>
           <h5  style="font-weight: bolder;">Christine Makimet</h5>
          </div>

          <div class="testimonial testbox" style="text-align:center; box-shadow: pink;">
           <p>Very timely and flexible even with busy schedules.They are always ready to answer questions
            and provide guidance and support as we were first time buyers.</p>
           <h5  style="font-weight: bolder;">Stephen Ndung'u</h5>
          </div>

          <div class="testimonial" style="text-align:center; box-shadow: pink;">
           <p>They patiently explained every step of the way to me,giving me step-by-step instructions,
            never pressuring me or being reluctant in showing me properties above my
            stated price range
           </p>
           <h5  style="font-weight: bolder;">Kelvin Munene</h5>
          </div>
       </div>

        <div style="text-align:center"style="display:;">
          <span class="dot2"style="display:;"></span> 
          <span class="dot2"style="display:;"></span> 
          <span class="dot2"style="display:;"></span>
          <span class="dot2"style="display:;"></span>  
        </div>
      </div>
        <style>
        /* The dots/bullets/indicators */
        .dot2 {
          margin-top:10px;
          height: 15px;
          width: 15px;
          border-color: black;
          background-color: grey;
          border-radius: 50%;
          display: inline-block;
          transition: background-color 0.6s ease;
          }

          .active2 {
           background-color: black;
        }

          .testimonial{
           width: 60%;
           padding: 20px;
           border-radius: 6px;
           background: #fff;
           box-shadow: 0 0 8px rgb(255, 0, 212);
           margin:auto;
           display:block;
          }

          .blog{
           padding: 10px;
           border-radius: 6px;
           background: #fff;
           box-shadow: 0 0 8px rgb(255, 0, 212);
           margin: 10px;
           flex: 0 0 33.333333%;
          }
        </style>
        <script>
        var slideIndex = 0;
        showtestimonials();
        
        function showtestimonials() {
          var i;
          var testimonial = document.getElementsByClassName("testimonial");
          var dot2 = document.getElementsByClassName("dot2");
          for (i = 0; i < testimonial.length; i++) {
            testimonial[i].style.display = "none";  
          }
          slideIndex++;
          if (slideIndex > testimonial.length) {slideIndex = 1}    
          for (i = 0; i < dot2.length; i++) {
            dot2[i].className = dot2[i].className.replace(" active2", "");
          }
          testimonial[slideIndex-1].style.display = "block";  
          dot2[slideIndex-1].className += " active2";
          setTimeout(showtestimonials, 5000); // Change image every 5 seconds
        }

        </script>
        <br><br>

      <div class="news-blogs" id="blogs" style="background-color:rgba(0, 0, 0, 0.2);padding-top:20px;">
      <div class="header" style="margin:auto;display:block;text-align:center;">
        <h4 style="color:blue; font-weight:bolder;">News and Blogs</h4>
        <h4><a href="services/blogs.php"> <i class="fa fa-arrow-right"></i> View All Blogs</a></h4>
      </div>

      <div class="row-blog" style="overflow:scroll;">
            <?php
              require_once 'php/includes/config.php';
              $sql="SELECT * FROM blogs order by id DESC LIMIT 5";
              $stmt = $DBH->prepare($sql);
              $stmt->execute();
              while($row = $stmt->fetchObject()) {
            ?>

        <div class="blog">
          <div class="blog-img" style="margin:10px;">
            <h5 style="font-weight: bolder;"><?php echo $row->blogtitle ?></h5>
            <?php if($row->ext == 'mp4'){ ?>
                <video style="width:200px; height:200px;" controls>
                 <source src="<?php echo "php/admin/blogs/". "{$row->blogimage}";?>">
                </video>
                <?php }else{?>
                    <img src="<?php echo "php/admin/blogs/". "{$row->blogimage}";?>"
                    class="img-fluid" style="width:200px; height:200px;" />
            <?php }?>
            <h6 style="font-weight: bolder;">Posted By: <?php echo $row->postedby ?></h6>
            <p>Date: <?php echo $row->dateposted ?></p>
          </div>

          <div class="information">
          <p id="text" class="show-read-more-info"><?php echo $row->bloginfo ?></p>
          <script>
                      $(document).ready(function() {
                        var maxLength = 200;
                        $(".show-read-more-info").each(function() {
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
              .show-read-more-info .more-text {
                  display: none;
              }
            </style>
          <button type="submit" name="submit"> <a href="services/blog.php?blog=<?php echo $row->id ?>" style="color:white;">Read More</a> </button>
          </div>
        </div>


        <?php }?>

      </div>

    </div>
  </main>
  <!--Footer-->
  <div class="footer">
    <?php require_once 'php/includes/footer.php'; ?>
  </div>

    
  </body>
  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/script1.js"></script>
  <script type="text/javascript"></script>

  <!-- success message -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</html>
