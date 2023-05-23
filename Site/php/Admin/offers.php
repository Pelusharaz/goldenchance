<?php session_start();
if($_SESSION['role']!=='super admin' && $_SESSION['role']!=='Advert Manager' && $_SESSION['role']!=='Maintainance'){
  echo "<script>alert('Access Denied !')</script>
  <script>window.location = '../includes/logout.php'</script>";
}
?>

<?php
require_once '../includes/config.php';
$sql="SELECT * FROM admin where role='" . $_SESSION["role"] . "' GROUP BY role";
$stmt = $DBH->prepare($sql);
$stmt->execute();
$total = $stmt->rowCount();

?>

<!--Adding Offers-->
<?php
 require_once '../includes/config.php';
 if (isset($_POST['addoffer'])){
  
  $productname = $_POST['offertitle'];
  $productimage = $_FILES['offerimage']['name'];
  $ext = pathinfo($productimage , PATHINFO_EXTENSION);
  $productinfo = $_POST['offerinfo'];
  $date = $_POST['dateposted'];
  
   // image file directory
   $target = "offers/".basename($productimage);
  
    try {
        //code...
        $sql = 'INSERT INTO offers(productname,productimage,ext,productinfo,Date) VALUES(?,?,?,?,?)';
        $sth = $DBH->prepare($sql);
        $sth->execute(array($productname,$productimage,$ext,$productinfo,$date));
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      //echo "<script>alert('Property Uploaded Successfully')</script>
		//   <script>window.location = 'admin.php'</script>";
    
    //uploading image
    if (move_uploaded_file($_FILES['offerimage']['tmp_name'], $target)) {
     // header("location:admin.php");
      $msg = "property uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

 }
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Golden Chance | Admin Panel</title>
    <!-- Tees Icon -->
    <link rel="icon" href="../../img/Golden chance logo.png" />
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
    <link rel ="stylesheet" type = "text/css" href ="css/admin.css">
    <link rel="stylesheet" href="../../css/styles.css" />
    <link rel="stylesheet" href="../../css/extrastyles.css" />
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
          <div class="collapse navbar-collapse" id="navbarExample01">
            <a class="navbar-brand" href="#">
              <img src="../../img/Golden chance logo.png" height="100" width="280" alt="" loading="lazy" style="border-radius:50%;margin-right:-50px;" />
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item active">
                <a class="nav-link" aria-current="page" href="admin.php">Welcome To The Admin Panel</a>
              </li>
              
            </ul>
            <ul class="navbar-nav d-flex flex-row">
            <?php
              while($row = $stmt->fetchObject()) {
            ?>
              <div class="d-flex input-group w-auto" style="margin-top:10px;">SESSION : <?php echo "{$row->username}"; ?>  </div>
            
 
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
                    <a class="dropdown-item" href="contactmessages.php">Messages</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="blogs.php">Blogs</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="registeredusers.php">Registered Users</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="bookings.php">Bookings</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="orders.php">Call Requests</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="admin.php">Add Properties</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="offers.php">Offers</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="updatestudio.php">Update Gallery</a>
                  </li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="../includes/logout.php">Log Out</a>
                  </li>
                  
                </ul>
              </li>
            </ul>
             
            <a href="../includes/logout.php">
              <button
                class="btn btn-outline-primary"
                type="button"
                data-mdb-ripple-color="dark">
                LOG OUT
              </button>
            </a>
            
          </div>
        </div>
      </nav>

      <!-- Background image -->
      <div
        class="p-5 text-center bg-image shadow-1-strong"
        style="background-image: url('../../img/best-offer.jpg'); height: 550px">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
              <h1 class="mb-3">Golden Chance</h1>
              <h4 class="mb-3">
                Add Offer
              </h4>
              <a class="btn btn-outline-light btn-lg" href="#!" role="button">welcome <?php echo "{$row->username}"; ?></a>
              <?php
              }
            ?>
            </div>
            
          </div>
        </div>
      </div>
    </header>
    <main class="mt-5">
      <div class="container">
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
              <strong class="text-dark mr-2">Featured offers:</strong>
              <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <form action=" " method="POST" style="box-shadow:none;">
                    <input type="text" name="search" value=" " style="display:none;">
                    <button class="nav-link active" type="submit" name="submit"style="background-color:white;border:none;">All</button>
                  </form>
                </li>
                <li class="nav-item">
                  <form action=" " method="POST" style="box-shadow:none;">
                    <input type="text" name="search" value="featured" style="display:none;">
                    <button class="nav-link" type="submit" name="submit"style="background-color:white;border:none;">Featured offers</button>
                  </form>
                </li>
                <li class="nav-item">
                  <form action=" " method="POST" style="box-shadow:none;">
                    <input type="text" name="search" value="bestselling" style="display:none;">
                    <button class="nav-link" type="submit" name="submit"style="background-color:white;border:none;">Best Selling</button>
                  </form>
                </li>
                <li class="nav-item">
                  <form action=" " method="POST" style="box-shadow:none;">
                    <input type="text" name="search" value="hotdeals" style="display:none;">
                    <button class="nav-link" type="submit" name="submit"style="background-color:white;border:none;">Hot Deals</button>
                  </form>
                </li>
              </ul> -->
              <form class="d-flex input-group w-auto" action=" " method="POST" style="box-shadow:none;">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Search"
                  aria-label="Search"
                  name="search"/>
                <button
                  class="btn btn-outline-primary"
                  type="submit"
                  name="submit"
                  data-mdb-ripple-color="dark">Go
                </button>
              </form>
            </div>
          </div>
        </nav>

  <!--add offer-->
    <div class="sharaz-store" style="marging-left:auto;margin-right:auto;display:block;text-align:center;">
      <h4>Add offer</h4>
    </div>
    <br>
  <div class="testbox">
       <form action="offers.php" method="POST" enctype="multipart/form-data">
          <fieldset>
            <legend style="border-radius: 25px;">
              <h4 style="margin:15px;">Post New Offer</h4>
            </legend>
            <div class="columns">
              <div class="item">
                <label for="booktitle">Offer Title<span>*</span></label>
                <input id="booktitle" type="text" name="offertitle" maxlength="30" />
              </div>
              <div class="item">
                <label for="information"> Offer Image<span>*</span></label>
                <input id="information" type="file" name="offerimage" />
              </div>
              <div class="item">
                <label for="information"> Information about The Property<span>*</span></label>
                <textarea name="offerinfo" id="" maxlength=" " cols="30" rows="10"></textarea>
              </div>
              <div class="item">
                <label for="information"> Date<span>*</span></label>
                <input id="information" type="date" name="dateposted" />
              </div>
              
          </fieldset>
          <div class="btn-block">
            <button type="submit" name="addoffer" style="border-radius: 25px;">Submit</button>
          </div>
        </form>
    
</div>
    <br>
    <div class="sharaz-store" style="marging-left:auto;margin-right:auto;display:block;text-align:center;">
      <h4>Golden Chance Offers</h4>
    </div>
    <br><br>

       
        <!--- database products -->
        <?php
         require_once '../includes/config.php';
         if (isset($_POST['submit'])){

         $search = $_POST['search'];

         
        //code...
        $sql="SELECT * FROM offers where (productname LIKE '%" . $_POST["search"] . "%') OR (productinfo LIKE '%" . $_POST["search"] . "%') ";
        $stmt = $DBH->prepare($sql);
        $stmt->execute();
        $total = $stmt->rowCount();
        
      }
      else{
        $sql="SELECT * FROM offers ";
        $stmt = $DBH->prepare($sql);
        $stmt->execute();
        $total = $stmt->rowCount();
      }
      
    ?>
        <section class="text-center mb-4" >
        <?php
          $t = 0;
          while($row = $stmt->fetchObject()) {
            $t++;
                if($t == 1)
                {
        ?>
      <div class="row" style="display:flex;">

            <div class="col-lg-4 col-md-12 mb-4">
              <div class="card" style="">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                  <?php if ($row->ext == 'mp4') { ?>
                    <video style="max-width:295px; height:300px;" autoplay muted loop>
                       <source src="<?php echo "offers/". "{$row->productimage}";?>">
                    </video>
                    <?php } else { ?>
                      <img src="<?php echo "offers/" . "{$row->productimage}"; ?>" class="img-fluid" style="max-width:295px; height:300px;" />
                    <?php } ?>
                  <a href="#!">
                    <div
                      class="mask"
                      style="background-color: rgba(251, 251, 251, 0.15)"> </div>
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo "{$row->productname}"; ?></h5>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <p class="card-text">
                  <?php echo "{$row->productinfo}"; ?>
                  </p>
                  <h6>Date Posted <?php echo "{$row->date}"; ?></h6>
                  
                  <div class="tools" style="display:flex;margin-left:-40px;">
                      <script>
                       function editproduct() {
                          var x = document.getElementsByClassName("card-update");
                          var i=" "
                          for(var i = 0; i < x.length; i++){
                            if (x[i].style.display === "none") {
                                x[i].style.display = "block";
                                
                            }
                            else {
                           x[i].style.display = "none";
                           
                           } 
                          }
                          
                       }
                      </script>
                      
                    
                      <div class="tools" style="display:flex;margin-left:100px;">

                        <div class="delete-edit" style="margin-left:auto;margin-right:auto;display:block;">
                          <div class="edit" >
                           <button style="margin-top:20px;" class="btn btn-dark " onclick=editproduct()>EDIT OFFER</button>
                          </div>
                          <form action="deleteproducts.php" method="post" style="box-shadow:none;">
                            <input type="hidden" name="deleteoffer_id" value="<?php echo "{$row->id}"; ?>">
                           <button type="submit" class="btn btn-danger " name="deleteoffer_btn">DELETE OFFER</button>
                          </form>

                        </div>
                     </div>
                  </div>
                  <br>
                <div id="cardupdate" class="card-update" style="display:none;">
                <form action="deleteproducts.php" method="POST" enctype="multipart/form-data" style=" ">
                    <fieldset>
                      <legend style="border-radius:25px;"><p style="margin:15px;">Edit the offer</p></legend>
                      <div class="columns">
                        <div class="item">
                          <label for="booktitle">Offer Title<span>*</span></label>
                          <input id="booktitle" type="text" name="productname" value="<?php echo "{$row->productname}"; ?>" />
                        </div>
                        <div class="item">
                          <label for="additional-information">Date<span>*</span></label>
                          <input id="information" type="date" name="date" value="<?php echo "{$row->date}"; ?>"  />
                        </div>
                        <div class="item" style="display:none;">
                          <input id="information" type="hidden" name="id" value="<?php echo "{$row->id}"; ?>" />
                        </div>
                      </div>  
                    </fieldset>
                    <div class="item">
                      <label for="information"> Information about The Offer<span>*</span></label>
                      <input id="information" type="text" name="productinfo"value="<?php echo "{$row->productinfo}"; ?>" />
                    </div>
                    <div class="item">
                      <label for="cover">file<span>*</span></label>
                      <input type="file" name="productimage" required>
                    </div>
                    <div class="btn-block">
                     <button type="submit" class="btn btn-dark " name="updateoffer"> SAVE </button>
                    </div>
                  </form>
                </div>
                

                </div>
                
                
              </div>
            </div>

          
        <?php
            }else if($t == 3){
              ?>
              <div class="col-lg-4 col-md-12 mb-4">
              <div class="card" style="">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                  <?php if ($row->ext == 'mp4') { ?>
                    <video style="max-width:295px; height:300px;" autoplay muted loop>
                       <source src="<?php echo "offers/". "{$row->productimage}";?>">
                    </video>
                    <?php } else { ?>
                      <img src="<?php echo "offers/" . "{$row->productimage}"; ?>" class="img-fluid" style="max-width:295px; height:300px;" />
                    <?php } ?>
                  <a href="#!">
                    <div
                      class="mask"
                      style="background-color: rgba(251, 251, 251, 0.15)"
                    > </div>
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo "{$row->productname}"; ?></h5>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <p class="card-text">
                  <?php echo "{$row->productinfo}"; ?>
                  </p>
                  <h6>Date Posted <?php echo "{$row->date}"; ?></h6>
                  <div class="tools" style="display:flex;">

                        <div class="delete-edit" style="margin-left:auto;margin-right:auto;display:block;">
                          <div class="edit" >
                           <button style="margin-top:20px;" class="btn btn-dark " onclick=editproduct()>EDIT OFFER</button>
                          </div>
                          <form action="deleteproducts.php" method="post" style="box-shadow:none;">
                            <input type="hidden" name="deleteoffer_id" value="<?php echo "{$row->id}"; ?>">
                           <button type="submit" class="btn btn-danger " name="deleteoffer_btn">DELETE OFFER</button>
                          </form>

                        </div>
                     </div>
                 </div>
                  <br>
                <div id="cardupdate" class="card-update" style="display:none;">
                <form action="deleteproducts.php" method="POST" enctype="multipart/form-data" style=" ">
                    <fieldset>
                      <legend style="border-radius:25px;"><p style="margin:15px;">Edit the offer</p></legend>
                      <div class="columns">
                        <div class="item">
                          <label for="booktitle">Offer Title<span>*</span></label>
                          <input id="booktitle" type="text" name="productname" value="<?php echo "{$row->productname}"; ?>" />
                        </div>
                        <div class="item">
                          <label for="additional-information">Date<span>*</span></label>
                          <input id="information" type="date" name="date" value="<?php echo "{$row->date}"; ?>"/>
                        </div>
                        <div class="item" style="display:none;">
                          <input id="information" type="hidden" name="id" value="<?php echo "{$row->id}"; ?>" />
                        </div>
                      </div>  
                    </fieldset>
                    <div class="item">
                      <label for="information"> Information about The Offer<span>*</span></label>
                      <input id="information" type="text" name="productinfo"value="<?php echo "{$row->productinfo}"; ?>" />
                    </div>
                    <div class="item">
                      <label for="cover">file<span>*</span></label>
                      <input type="file" name="productimage" required>
                    </div>
                    <div class="btn-block">
                     <button type="submit" class="btn btn-dark " name="updateoffer"> SAVE </button>
                    </div>
                  </form>
                </div>
                  
                </div>
              </div>
            </div>
      </div>    
            <?php
                  $t = 0;
                }else{
                  ?>

            <div class="col-lg-4 col-md-12 mb-4">
              <div class="card" style="">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                  <?php if ($row->ext == 'mp4') { ?>
                    <video style="max-width:295px; height:300px;" autoplay muted loop>
                       <source src="<?php echo "offers/". "{$row->productimage}";?>">
                    </video>
                    <?php } else { ?>
                      <img src="<?php echo "offers/" . "{$row->productimage}"; ?>" class="img-fluid" style="max-width:295px; height:300px;" />
                    <?php } ?>
                  <a href="#!">
                    <div
                      class="mask"
                      style="background-color: rgba(251, 251, 251, 0.15)"
                    > </div>
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo "{$row->productname}"; ?></h5>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <p class="card-text">
                  <?php echo "{$row->productinfo}"; ?>
                  </p>
                  <h6>Date Posted <?php echo "{$row->date}"; ?></h6>
                  <div class="tools" style="display:flex;">

                        <div class="delete-edit" style="margin-left:auto;margin-right:auto;display:block;">
                          <div class="edit" >
                           <button style="margin-top:20px;" class="btn btn-dark " onclick=editproduct()>EDIT OFFER</button>
                          </div>
                          <form action="deleteproducts.php" method="post" style="box-shadow:none;">
                            <input type="hidden" name="deleteoffer_id" value="<?php echo "{$row->id}"; ?>">
                           <button type="submit" class="btn btn-danger " name="deleteoffer_btn">DELETE OFFER</button>
                          </form>

                        </div>
                     </div>
                </div>
                <br>
                <div id="cardupdate" class="card-update" style="display:none;">
                  <form action="deleteproducts.php" method="POST" enctype="multipart/form-data" style=" ">
                    <fieldset>
                      <legend style="border-radius:25px;"><p style="margin:15px;">Edit the offer</p></legend>
                      <div class="columns">
                        <div class="item">
                          <label for="booktitle">Offer Title<span>*</span></label>
                          <input id="booktitle" type="text" name="productname" value="<?php echo "{$row->productname}"; ?>" />
                        </div>
                        <div class="item">
                          <label for="additional-information">Date<span>*</span></label>
                          <input id="information" type="date" name="date" value="<?php echo "{$row->date}"; ?>"/>
                        </div>
                        <div class="item" style="display:none;">
                          <input id="information" type="hidden" name="id" value="<?php echo "{$row->id}"; ?>" />
                        </div>
                      </div>  
                    </fieldset>
                    <div class="item">
                      <label for="information"> Information about The Offer<span>*</span></label>
                      <input id="information" type="text" name="productinfo"value="<?php echo "{$row->productinfo}"; ?>" />
                    </div>
                    <div class="item">
                      <label for="cover">file<span>*</span></label>
                      <input type="file" name="productimage" required>
                    </div>
                    <div class="btn-block">
                     <button type="submit" class="btn btn-dark " name="updateoffer"> SAVE </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php
                }
            }
            if($t < 3){
              ?>
              </div>
              <?php
            }
            ?>      
            

          </section>
          <!-- end --->
        
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
            data-mdb-ripple-color="dark"
            ><i class="fab fa-facebook-f"></i
          ></a>

          <!-- Twitter -->
          <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"
            ><i class="fab fa-twitter"></i
          ></a>

          <!-- Google -->
          <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"
            ><i class="fab fa-google"></i
          ></a>

          <!-- Instagram -->
          <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"
            ><i class="fab fa-instagram"></i
          ></a>

          <!-- Linkedin -->
          <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"
            ><i class="fab fa-linkedin"></i
          ></a>
          <!-- Github -->
          <a
            class="btn btn-link btn-floating btn-lg text-dark m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"
            ><i class="fab fa-github"></i
          ></a>
        </section>
        <!-- Section: Social media -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div
        class="text-center text-dark p-3"
        style="background-color: rgba(0, 0, 0, 0.2)"
      >
        <p> &copy; Copyright <?php $year=date("Y"); echo $year; ?>
        <a class="text-dark" href="">Golden Chance.</a></p>
      </div>
      <!-- Copyright -->
    </footer>
  </body>
  <!-- Scripts -->
  <script type="text/javascript" src="../../js/script1.js"></script>
  <script type="text/javascript"></script>
  
</html>
