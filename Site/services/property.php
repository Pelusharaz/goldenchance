<!-- Site Visits -->
<?php
 require_once '../php/includes/config.php';
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
  echo "<script>alert('Booking was successfully. We will get back to you shortly')</script>";
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
    <title>Golden chance | News and Blogs</title>
    <!-- Tees Icon -->
    <link rel="icon" href="../img/Golden chance logo.png"/>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/cart.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/extrastyles.css" />
    <link rel="stylesheet" href="../php/Admin/css/admin.css" />

    <!--date picker--->
    <!-- Importing jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous">
    </script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"integrity=
        "sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous">
    </script>
    <!-- Importing datepicker cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <style>
  .order {
  height:15%;
  text-align:center;
  opacity: 1;
  background: green;
  color:#fff;
  border-radius:25px;
  -webkit-animation: bounce .3s infinite alternate;
  -moz-animation: bounce .3s infinite alternate;
  animation: bounce .3s infinite alternate;
 }
      

  @-webkit-keyframes bounce {
    to { -webkit-transform: scale(1.2); }
  }
  @-moz-keyframes bounce {
  to { -moz-transform: scale(1.2); }
  }
  @keyframes bounce {
  to { transform: scale(1.2); }
  }
  </style>
  </head>
  <body>
    <header>
      <!-- Navbar -->
      <?php require_once '../php/includes/header2.php'; ?>
      
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
      <!-- Background images
      <div class="slideshow-container">
     
      <div class="p-5 text-center bg-image shadow-1-strong">
        <video id="video-background" src="../img/background video1.mp4" style="margin:-55px; 0px; height: 559px;" autoplay muted loop></video>
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
              <h1 class="mb-3">WELCOME TO GOLDEN CHANCE PROPERTIES</h1>
              <h5 class="mb-3">
               Are you Looking for property ?Grab a "GODLEN CHANCE" Today
              </h4>
              <a class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#bookings" role="button">Book a site visit !</a>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 text-center bg-image shadow-1-strong">
      <video id="video-background" src="../img/bgvideo2.mp4" style="margin:-55px; 0px; height: 559px;" autoplay muted loop></video>
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

      <div class="p-5 text-center bg-image shadow-1-strong">
        <video id="video-background" src="../img/video3.mp4" style="margin:-55px; 0px; height: 559px;" autoplay muted loop></video>
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
              <h1 class="mb-3">GRAB A GOLDEN CHANCE PROPERTY</h1>
              <h5 class="mb-3">
              Cheap and affordable properties
              </h4>
              <a class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#bookings" role="button">Book a site visit !</a>
            </div>
          </div>
        </div>
      </div>
      </div> -->

<!-- Modal for enquiries -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <legend class="modal-title " id="staticBackdropLabel" style="border-radius:20px;"> We Value Your Feedback</legend>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <form action="../index.php" method="POST" enctype="multipart/form-data" style="box-shadow:none;">
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
    
    <form action=" " method="POST" enctype="multipart/form-data" style="box-shadow:none;">
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
        .viewbtn {
         width: 100px;
         padding: 0px;
         border: none;
         border-radius: 5px; 
         background: rgb(11, 117, 238);
         font-size: 16px;
         cursor: pointer;
         color: rgb(252, 252, 252);
        }
        .viewbtn:hover {
          background: orangered;
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

    <div class="alertMsg" id="alertMsg">Thank you for showing interest in our properties</div>
    <br>
        
    <div class="grid-gallery" style="margin-top:-80px;">
        <div class="row"> 
         <div class="column single">
          <img src="../img/land 1.jpg" style="width:100%; height:103%;">
         </div>
         <div class="column">
            <img src="../img/land 1.jpg" style="width:100%; height:50%;">
            <img src="../img/land 1.jpg" style="width:100%; height:50%;">
         </div>  
         <div class="column single">
           <img src="../img/land 1.jpg" style="width:100%;height:103%;">
         </div>
         <div class="column">
           <img src="../img/land 1.jpg" style="width:100%; height:50%;">
           <img src="../img/land 1.jpg" style="width:100%; height:50%;">
         </div>
        </div>
    </div>
        <?php
            require_once '../php/includes/config.php';
            $sql="SELECT * FROM products where id = '" .$_GET["property"] . "' ";
            $stmt = $DBH->prepare($sql);
            $stmt->execute();
            while($row = $stmt->fetchObject()) {
            
        ?>
        <div class="container news-blogs" style="padding-top:20px;margin-top:20px;">
          <div class="header" style="display:flex;">
            <div class="available"style="margin-left:10px;">
            <?php
                require_once '../php/includes/config.php';
                $sql = "SELECT * FROM soldout WHERE propertyId = $row->id";
                $stmt = $DBH->prepare($sql);
                $stmt->execute();
                if ($stmt->rowCount() == 1) {
                    while ($row1 = $stmt->fetchObject()) {
                ?>
                <button class="btn viewbtn" style="cursor: no-drop; background-color:red;text-transform:lowercase;">Sold out</button>
                <?php }
                    } else { ?>
                <button class="viewbtn" onclick="showMsg()">Available</button>
            <?php } ?>
            </div>
            <h4 style="color:black; font-weight:bolder;margin-right:10px;"></h4><h5 style="color:black; font-weight:bold;">Kes <?php echo number_format($row->price)?>/=</h5>
          </div>
          <h4 style="color:blue; font-weight:bolder;margin-left:10px;"><?php echo $row->productname ?></h4>
          <a href="tel:0740027027"><i class="fa-map-marker fa"></i> <?php echo $row->location ?></a><br><br><br>

          <div class="row row-blog">
            
            <div class="blog">

              <div class="blog-img" style="margin:10px;">
              <?php if($row->ext == 'mp4'){ ?>
                 <video style="width:250px; height:250px;margin-top:-50px;" controls>
                   <source src="<?php echo "../php/Admin/products/". "{$row->productimage}";?>" style="max-width:250px; height:200px;margin-left:auto;margin-right:auto;display:block;">
                 </video>
                <?php }else{?>
                    <img src="<?php echo "../php/Admin/products/". "{$row->productimage}";?>" style="width:250px; height:250px;margin-left:auto;margin-right:auto;display:block;">
              <?php }?>
              </div>
              
              <div class="information">
                  <h6 style="font-weight: bolder;">Amenities </h6>
                  <p><?php echo $row->productinfo ?></p>
                  <span style="display:flex;"><h6>Size : </h6><p><?php echo $row->size ?></p></span>
                  <span style="display:flex;"><h6>Category : </h6><p><?php echo $row->category ?></p></span>
                  <button type="submit" name="submit" data-bs-toggle="modal" data-bs-target="#bookings" role="button"> <a style="color:white;">Book Site Visit</a> </button>
              </div>


              <?php }?>

              <div class="more-properties">
                  <h5 style="color:black; font-weight:bold;">MORE PROPERTIES</h5>
                  <?php
                    require_once '../php/includes/config.php';
                    $sql="SELECT * FROM products order by id DESC LIMIT 2";
                    $stmt = $DBH->prepare($sql);
                    $stmt->execute();
                    while($row = $stmt->fetchObject()) {
            
                  ?>
                    <div class="properties"style="display:flex;">
                      <div class="property-img" style="margin:10px;">
                       <?php if($row->ext == 'mp4'){ ?>
                        <video style="width:150px; height:150px;margin-top:-50px;" controls>
                         <source src="<?php echo "../php/Admin/products/". "{$row->productimage}";?>" style="max-width:250px; height:200px;margin-left:auto;margin-right:auto;display:block;">
                        </video>
                       <?php }else{?>
                        <img src="<?php echo "../php/Admin/products/". "{$row->productimage}";?>" style="width:150px; height:150px;margin-left:auto;margin-right:auto;display:block;">
                       <?php }?>
                      </div>
                      <div class="property-info">
                        <h6 style="font-weight: bolder;"><?php echo $row->productname ?> </h6>
                        <p><i class="fa-map-marker fa"></i> <?php echo $row->location ?></p>
                        <a href="property.php?property=<?php echo $row->id ?>">see details</a>
                        
                      </div>
                    </div>
                  <?php }?>
              </div>

            </div>

          </div>

        </div>
    <!-- success message -->
    <script>
      function showMsg()
      {
      $("#alertMsg").fadeIn('slow', function () {
      $(this).delay(1000).fadeOut('slow');
      window.location = '../properties.php'
      });
    }
    </script>
    <script>
    $(window).on('load', function() {
      $("#alertMsg").fadeIn('slow');
      $("#alertMsg").delay(1000).fadeOut('slow');
    });
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

    .blog {
      display: flex;
      }
    .blog-img{
      width:20%;
    }
    .information{
      margin-left:40px;
      width:40%;
    }
    .more-properties{
      width:30%;
      margin-left:10px;
      margin-top:-130px;
      display:block;
    }

    /* grid-gallery */
    .row {
     display: -ms-flexbox; /* IE10 */
     display: flex;
     -ms-flex-wrap: wrap; /* IE10 */
      flex-wrap: wrap;
      padding: 0 4px;
    }

    /* Create four equal columns that sits next to each other */
     .column {
      -ms-flex: 25%; /* IE10 */
       flex: 25%;
       max-width: 25%;
       padding: 0 4px;
    }

     .column img {
      margin-top: 8px;
      vertical-align: middle;
      width: 100%;
     }

      /* Responsive layout - makes a two column-layout instead of four columns */
      @media screen and (max-width: 800px) {
      .column {
        -ms-flex: 50%;
        flex: 50%;
        max-width: 50%;
       }
    }

      /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
       @media screen and (max-width: 600px) {
       .column {
        -ms-flex: 100%;
        flex: 100%;
        max-width: 100%;
       }
     } 
    @media only screen and (max-width: 700px) {
    .single{
      margin-bottom: 20px;
      margin-top: 20px;
    }
    .blog {
      display: block;
     }
    .information{
      padding: 20px;
      margin-left:0px;
      width:100%;
    }
    .blog-image{
      width:100%;
    }
    .more-properties{
      width:100%;
      margin-left:10px;
      margin-top:0px;
      display:block;
    }
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
                  
  <!-- end --->

    </main>
    <!--Footer-->
    <div class="footer">
     <?php require_once '../php/includes/footer.php'; ?>
    </div>

    
  </body>
  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/script1.js"></script>
  <script type="text/javascript"></script>

  <!-- success message -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</html>
