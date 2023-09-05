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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/cart.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/extrastyles.css" />
    <link rel="stylesheet" href="php/Admin/css/admin.css" />

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
      <?php require_once 'php/includes/header.php'; ?>
      
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
               Are you Looking for property ?Grab a "GODLEN CHANCE" Today
              </h4>
              <a class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#bookings" role="button">Book a site visit !</a>
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
                Get instatnt property in a few clicks
              </h4>
              <a class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#bookings" role="button">Book a site visit !</a>
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
              <a class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#bookings" role="button">Book a site visit !</a>
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
            <select style="padding-top:8px; padding-bottom:8px;margin-top:20px;" name="service" required>
             <option value="" disabled selected>Select Type of Enquiry</option>
             <option value="Blogging">Compliment</option>
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
        <button type="submit" name="bookbtn" class="btn btn-primary">Send</button>
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

    <div class="alertMsg" id="alertMsg">Thank you for showing interest in our properties</div>
    <br>

      <div class="container">
        
        <!--- page information -->
        
        
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
                  
  <!-- end --->
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


<!-- test -->