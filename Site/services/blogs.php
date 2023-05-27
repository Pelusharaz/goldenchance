<!---book information--->
<?php
 require_once '../php/includes/config.php';
 if (isset($_POST['bookbtn'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $location = $_POST['location'];
  $service = $_POST['service'];
  $editing = $_POST['editing'];
  $dateofservice = $_POST['dateofservice'];
  $checkbox = $_POST['checkbox'];

    try {
        //code...
        $sql = 'INSERT INTO studiobookings(name,email,phone,location,service,editing,dateofservice,checkbox,Date,Time ) VALUES(?,?,?,?,?,?,?,?,Now(),Now() )';
        $sth = $DBH->prepare($sql);
        $sth->execute(array($name,$email,$phone,$location,$service,$editing,$dateofservice,$checkbox));
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      echo" <script>alert('Booked successfully')</script>
      <script>window.location = 'studio.php'</script>";
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
  
    <!-- length of blogs -->
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
            <img src="../img/Golden chance logo.png" class="small-screen-logo" align="right" height="80" width="220" alt="" loading="lazy" style="border-radius:50%;" />
          </a>
          <div class="collapse navbar-collapse" id="navbarExample01">
            <a class="navbar-brand" href="#" style="margin-right:-30px; margin-left:-30px;">
              <img src="../img/Golden chance logo.png" class="large-screen-logo" height="100" width="280" alt="" loading="lazy" style="border-radius:50%;" />
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item active">
                <a class="nav-link" aria-current="page" href="../home-loggedin.php">Home</a>
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
                    <a class="dropdown-item" href="blogs.php"> <i class="fa fa-book" aria-hidden="true" style="cursor:pointer;"> Blogs</i> </a>
                  </li>
                  <li>
                   <a class="dropdown-item" href="studio.php"> <i class="fa fa-camera" aria-hidden="true" style="cursor:pointer;"> Gallery</i> </a>
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
                  <img src="../img/icons/services.png" alt="services">
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
                    <a class="dropdown-item" href="../php/Users/signup.php">Sign Up</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../php/Users/login.php">Log in</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../php/Admin/login.php"><i class="fa fa-lock" aria-hidden="true"></i></a>
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
                    window.location = 'properties.php'
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
        <video id="video-background" src="../img/background video1.mp4" style="margin:-55px; 0px; height: 559px;" autoplay muted loop></video>
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
    
    <form action="studio.php" method="POST" enctype="multipart/form-data" style="box-shadow:none;">
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
            <select style="padding-top:8px; padding-bottom:8px;margin-top:17px;" name="service" required>
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
                  name="dateofservice"
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
        <button type="submit" name="bookbtn" class="btn btn-primary">Book Now!</button>
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

    <br><br>
    <div class="sharaz-store" style="marging-left:auto;margin-right:auto;display:block;text-align:center;">
      <h3 style="font-family: 'Courier New', Courier, monospace;">Get up to date with Golden Chance News</h3>
    </div>

    <main class="mt-5">

    <div class="alertMsg" id="alertMsg">Thank you for showing interest in our properties</div>
    <br>

      <div class="news-blogs" style="background-color:rgba(0, 0, 0, 0.2);padding-top:20px;">
          <div class="header"style="margin:auto;display:block;text-align:center;">
            <h4 style="color:blue; font-weight:bolder;">News and Blogs</h4>
          </div>

        <div class="row row-blog" style="overflow:scroll; height:900px;">
            
          <?php
              require_once '../php/includes/config.php';
              $sql="SELECT * FROM blogs ORDER BY id DESC";
              $stmt = $DBH->prepare($sql);
              $stmt->execute();
              while($row = $stmt->fetchObject()) {
           ?>
          
           <div class="col-lg-3 blog">
             <div class="card" style="width:auto;height:auto;margin:10px;0px; margin-left:auto;margin-right:auto;display:block;" >
              <div class="blog-img" style="margin:10px;">
                <h5 class="card-title" style="font-weight: bolder;"><?php echo $row->blogtitle ?></h5>
                <?php if($row->ext == 'mp4'){ ?>
                <video style="width:200px; height:200px;" controls>
                 <source src="<?php echo "../php/Admin/blogs/". "{$row->blogimage}";?>">
                </video>
                <?php }else{?>
                    <img src="<?php echo "../php/Admin/blogs/". "{$row->blogimage}";?>"
                    class="img-fluid" style="width:200px; height:200px;" />
                <?php }?>
              </div>
              <div class="card-body">
                <h6 style="font-weight: bolder;">Posted By: <?php echo $row->postedby ?></h6>
                <p>Date: <?php echo $row->dateposted ?></p>
              
                <div class="information">
                  <p id="text" class="show-read-more"><?php echo $row->bloginfo ?></p>
                    <script>
                      $(document).ready(function() {
                        var maxLength = 200;
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
                  <button type="submit" name="submit"> <a href="blog.php?blog=<?php echo $row->id ?>" style="color:white;">Read More</a> </button>
                </div>
              </div>
                
             </div>
           </div>

          <?php }?>

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
      .row{
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
  <script type="text/javascript" src="../js/script1.js"></script>
  <script type="text/javascript"></script>

  <!-- success message -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</html>
