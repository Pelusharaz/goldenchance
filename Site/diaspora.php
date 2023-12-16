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
  <script>window.location = 'diaspora.php'</script>";
 }
 
 ?>

<!-- Enquiry messages -->
<?php
require_once 'php/includes/config.php';
if (isset($_POST['enquiries'])) {

  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $type = $_POST['type'];
  $information = $_POST['information'];
  $checkbox = $_POST['checkbox'];
  try {
    //code...
    $sql = 'INSERT INTO enquiries(name,phone,email,type,information,checkbox,Date,Time ) VALUES(?,?,?,?,?,?,Now(),Now() )';
    $sth = $DBH->prepare($sql);
    $sth->execute(array($name, $phone, $email, $type, $information, $checkbox));
    $_SESSION['success'] = "message sent successfully.";
  } catch (PDOException $e) {
    //throw $th;
    echo $e->getMessage();
  }
  echo "<script>alert('Message sent successfully. We value Your Feedback')</script>
  <script>window.location = 'diaspora.php'</script>";
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
     
      <div class="p-5 text-center bg-image shadow-1-strong"
        style="background-image: url('img/Diaspora 1.jpg'); height: 500px;">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
              <h1 class="mb-3">DIASPORA CENTER</h1>
              <h5 class="mb-3">
               Are you Looking for property ?Grab a "GOLDEN CHANCE" Today
              </h4>
              <a class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#bookings" role="button">Book a site visit !</a>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 text-center bg-image shadow-1-strong"
        style="background-image: url('img/Diaspora 2.jpg'); height: 500px;">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
              <h1 class="mb-3">DIASPORA CENTER</h1>
              <h5 class="mb-3">
                Begin your journey of success
                Get instant property in a few clicks
              </h4>
              <a class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#bookings" role="button">Book a site visit !</a>
            </div>
          </div>
        </div>
      </div>

      <div class="p-5 text-center bg-image shadow-1-strong"
        style="background-image: url('img/land 1.jpg'); height: 500px;">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
              <h1 class="mb-3">DIASPORA CENTER</h1>
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
            <select style="padding-top:8px; padding-bottom:8px;margin-top:20px;" name="type" required>
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

      <div class="container">
        <p contenteditable="true">At Golden chance Real Estate Limited we value our diaspora investors and we are here to ensure that
           they have a hustle free investment. We consider anyone outside the borders of Kenya in Africa, 
           America, Asia,Australia and Europe to be a diaspora Investor whether you are out for studies, work 
           or are a permanent residence in another country but are a Kenyan Citizen.
        </p>
     </div>
    

     <div class="container diaspora-about" id="whoweare">
       <div class="dias-img">
        <img src="img/land 2.jpg" alt="img" style="width:100%;height:300px;">
       </div>
       <br>
       <div class="dias-info">
         <p contenteditable="true">Golden chance is a leading brand in the African real estate sector. 
            It was established in the year 2014 and has since then successfully settled its clients on their 
            dream property.
        </p>
        <p>
         <ul class="benefits" contenteditable="true">
          <li>We thrive in Honesty and professionalism</li>
          <li>We give you value for your money.</li>
          <li>We have ready titles for the projects</li>
          <li>We offer solutions to your investment need</li>
          <li>We pick you from the airport and take you to view your investment.</li>
          <li>We empower you on property investment and give guidance on requirements to own your property.</li>
          <li>Our projects have value additions and are fit for immediate settlement</li>
          <li>We have customer service officers who are available 24/7 to answer to all your questions on investment
              and gives advice on documentation needed in acquiring your property
          </li>
          <li>Our Diaspora department facilitates you in acquiring documents i.e PIN,ID by connecting you to the Kenyan Embassy.</li>
          <li>We have a list of property that one can choose from depending on their investment needs.</li>
          <li>We allow you to purchase a project and pay in monthly instalments.</li>
         </ul>
        </p>
       </div>
     </div>
     <br>
     <div class="container">
      <div class="title">
        <i class="fas fa-quote-left fa-lg" style="color: #e2128c;float:left;"></i>
        <h5 style="font-style: italic;font-weight:500;" contenteditable="true">HOW CAN ONE ACQUIRE A PROPERTY WHILE ABROAD?</h5>
      </div>
      <div class="text">
        <p contenteditable="true">
         At Golden chance Real Estate Limited we ensure that our diaspora investors have a hustle free investment 
         experience; by this we are in communication with them giving guidance every step of the way on acquiring their 
         property of choice until finalization. We send you our Investment catalogue for you to choose your 
         investment projectthat will suit your need as well as the project maps to choose the plot of interest.
        </p>
      </div>

     </div>
     <br>

     <div class="container" id="accordionExample" style="background-color: #f1f1f1; padding:20px 50px 20px 50px;">
      <div class="title">
        <i class="fa fa-thumbs-up fa-lg" style="color: #0017c7;float:left;margin-right:5px;"></i>
        <h4 style="font-weight:bold;" contenteditable="true">LEARN TO ACQUIRE LAND WITH US</h4>
      </div>
      <div class="text"style="padding:20px 50px 20px 50px;">
        <div class="dropdown-toggle"style="font-size:20px;font-weight:bolder;">
          <a data-toggle="collapse" data-target="#collapseFour"style="color:black;cursor:pointer;" contenteditable="true">
            Purchase Process
          </a>
        </div>
        <br>
        <div id="collapseFour" class="collapse" data-parent="#accordionExample">
          <ol contenteditable="true">
            <li>
                Inquiry of any Golden chance limited Property. Feedback: Type of investment (Long term or Short term) through 
                the live chat, Facebook, twitter, Skype, Whatsapp and the website Conversion: Further interaction to 
                enable the client select a desired project to fit the need.
            </li>
            <li> 
              Investment Catalog – Send an investors’ guide that will fit the client investment category.
            </li>
            <li> 
              Investment Catalog – Send an investors’ guide that will fit the client investment category.
            </li>
            <li>
              Plot Selection: Client selects the preferred project. Subdivision Map: Send the subdivision map directly or 
              check the updated map online from the project he has selected. Site Visit: Send a representative to view
              on behalf, the client should provide contact to enable communication. We shall also take the client to 
              view when he comes back to the country. (We conduct site visits free of charge).
            </li>
          </ol>
        </div>
      </div>
      
     </div> 
     <br><br><br>
    
     <!-- <?php 
      $message= $_POST['test'];
      ?>
     <form action="" method="post" id="translate">
        <label for="information"> Purchase Process<span>*</span></label>
        <textarea name="test" type="text"><?// echo $message; ?></textarea>
        
        <button type="submit" form="translate" value="submit">Translate</button>
        <button type="reset" value="reset">Reset</button>
     </form>
      
     <?php
       $message= $_POST['test'];
            
      ?>
      <div>
        <ol>
            <li><?// echo $message; ?></li>
        </ol>
       
      </div> -->
      
     <div class="container">
        <h5 style="color:black; font-weight:bold;">CHECK OUT PROPERTIES</h5>
        <div class="row more-properties">
            
            <?php
              require_once 'php/includes/config.php';
              $sql="SELECT * FROM products GROUP BY code order by RAND() LIMIT 3";
              $stmt = $DBH->prepare($sql);
              $stmt->execute();
              while($row = $stmt->fetchObject()) {
            
            ?>
             <div class="col-lg-4 properties"style="display:flex;">
                <div class="property-img" style="margin:10px;display:block;">
                  <?php if($row->ext == 'mp4'){ ?>
                  <video style="width:150px; height:200px;margin-top:-50px;" controls>
                    <source src="<?php echo "php/Admin/products/". "{$row->productimage}";?>" style="max-width:250px; height:200px;margin-left:auto;margin-right:auto;display:block;">
                  </video>
                  <?php }else{?>
                    <img src="<?php echo "php/Admin/products/". "{$row->productimage}";?>" style="width:150px; height:150px;margin-left:auto;margin-right:auto;display:block;">
                  <?php }?>
                </div>
                <div class="property-info">
                  <h6 style="font-weight: bolder;"><?php echo $row->productname ?> </h6>
                  <h6 style="color:blue; font-weight:bold;">Kes <?php echo number_format($row->price)?>/=</h6>
                  <p><i class="fa-map-marker fa"></i> <?php echo $row->location ?></p>
                  <a href="services/property.php?property=<?php echo $row->code ?>">see details</a>
                        
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
    .diaspora-about{
      display:flex;
    }
    .dias-img {
      width:40%;
      margin-right:10px;
    }
    .dias-info{
      width:60%
    }
    .benefits li{
      list-style:none;
      color:blue;
    }
    .benefits li:before{
      content:"\2714\0020";
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
    .diaspora-about{
      display:block;
    }
    .dias-img {
      width:100%;
      margin-right:10px;
    }
    .dias-info{
      width:100%
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