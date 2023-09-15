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
    <!-- Jquery multiple photos -->
    <script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"integrity=
        "sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous">
    </script>
    
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        style="background-image: url('../../img/land 1.jpg'); height: 550px">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
              <h1 class="mb-3">Golden Chance</h1>
              <h4 class="mb-3">
                Add Properties
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
    
    <br>
    <div class="sharaz-store" style="marging-left:auto;margin-right:auto;display:block;text-align:center;">
    <h4><a href="admin.php"> <i class="fa fa-arrow-left"></i> Back To Properties</a></h4>
    </div>
    <br><br>
      
      <!-- Modal for Editing Properties-->
      <script type="text/javascript">
       $(window).on('load', function() {
       $("#staticBackdrop").modal('show');
       });
      </script>
      <!-- Modal for Editing Properties -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <legend class="modal-title " id="staticBackdropLabel" style="border-radius:20px;"><h5 style="margin:8px 5px;">Edit Property </h5></legend>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="$('#staticBackdrop').modal('hide')"></button>
          </div>
          <div class="modal-body">
          <div class="alertMsg" id="alertMsg">Success please reload page to view changes</div>
    
          <div class="row">
            <div class="frame">
            <div class="mainpic">
            <?php
              require_once '../includes/config.php';
              $sql="SELECT  * FROM products where code = '" .$_GET["property"] . "' LIMIT 1 ";
              $stmt = $DBH->prepare($sql);
              $stmt->execute();
              while($row = $stmt->fetchObject()) {
            ?>
          
            <div class="">
              <iframe name="votar" style="display:none;"></iframe>
              <form action="deleteproducts.php" method="post" target="votar" onsubmit="showMsg()" title="Delete Image?" style="box-shadow:none;background-color:transparent;margin-left:-20px;">
                <input type="hidden" name="deleteimg_id" value="<?php echo "{$row->id}"; ?>">
                <button type="submit" class="btn-close" name="deleteimg_btn"></button>
              </form>
              <?php if($row->ext == 'mp4'){ ?>
                 <video style="width:100%; height:250px;margin-top:-10px;" controls>
                   <source src="<?php echo "products/". "{$row->productimage}";?>" style="max-width:250px;margin-left:auto;margin-right:auto;display:block;">
                 </video>
                <?php }else{?>
                    <img src="<?php echo "products/". "{$row->productimage}";?>" style="width:100%;height:300px;margin-left:auto;margin-right:auto;display:block;">
              <?php }?>
            </div>
            
            <?php }?>
            </div>
          
            <div class="flexbox">
            <?php
              require_once '../includes/config.php';
              $sql="SELECT  * FROM products where code = '" .$_GET["property"] . "' ORDER BY id DESC LIMIT 5";
              $stmt = $DBH->prepare($sql);
              $stmt->execute();
              while($row = $stmt->fetchObject()) {
            ?>
          
            <div class="col-lg-3 column">
              <iframe name="votar" style="display:none;"></iframe>
              <form action="deleteproducts.php" method="post" target="votar" onsubmit="showMsg()" title="Delete Image?"style="box-shadow:none;background-color:transparent;margin-left:-20px;">
                <input type="hidden" name="deleteimg_id" value="<?php echo "{$row->id}"; ?>">
                <button type="submit" class="btn-close" name="deleteimg_btn"></button>
              </form>
              <?php if($row->ext == 'mp4'){ ?>
                 <video style="width:100%; height:100px;margin-top:0px;" controls>
                   <source src="<?php echo "products/". "{$row->productimage}";?>" style="max-width:250px;margin-left:auto;margin-right:auto;display:block;">
                 </video>
                <?php }else{?>
                    <img src="<?php echo "products/". "{$row->productimage}";?>" style="width:100%;height:100px;margin-left:auto;margin-right:auto;display:block;">
              <?php }?>
            </div>
            
            <?php }?>
            </div>

            </div>
          </div>
          <style>
            .frame{
              display:block;
            }

            /* grid-gallery */
           .flexbox {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap; /* IE10 */
            flex-wrap: wrap;
            padding: 0 4px;
            width:100%;
            }
           .mainpic{
           width:100%;
           }

           /* Create 3 equal columns that sits next to each other */
           .column {
            -ms-flex: 33%; /* IE10 */
             flex: 33%;
             max-width: 33%;
             padding: 0 4px;
            }
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
          </style>
          <!-- success message -->
          <script>
           function showMsg()
           {
           $("#alertMsg").fadeIn('slow', function () {
           $(this).delay(1000).fadeOut('slow');
           });
          }
          </script>

          <!-- add to the gallery -->
          <?php
            require_once '../includes/config.php';
            $sql="SELECT * FROM products where code = '" .$_GET["property"] . "' LIMIT 1  ";
            $stmt = $DBH->prepare($sql);
            $stmt->execute();
            while($row = $stmt->fetchObject()) {
            
          ?>      <iframe name="votar" style="display:none;"></iframe>
                  <form action="admin.php" target="votar" onsubmit="showMsg()" method="POST" enctype="multipart/form-data" style="box-shadow:none;">
            
                    <fieldset>
                      <div class="columns">
                        <div class="item"style="display:none;">
                          <label for="booktitle">Property Name<span>*</span></label>
                          <input id="booktitle" type="text" name="productname" value="<?php echo "{$row->productname}"; ?>" />
                        </div>
                        <div class="item"style="display:none;">
                          <label for="information"> Price<span>*</span></label>
                          <input id="information" type="text" name="price" value="<?php echo "{$row->price}"; ?>" />
                        </div>
                        <div class="item" style="display:none;">
                          <label for="additional-information"> Information about The Property<span>*</span></label>
                          <input id="information" type="text" name="products" value="products" />
                        </div>
                        <div class="item"style="display:none;">
                          <label for="information"> Location<span>*</span></label>
                          <input id="information" type="text" name="location" value="<?php echo "{$row->location}"; ?>" />
                        </div>
                        <div class="item"style="display:none;">
                          <label for="information"> Size<span>*</span></label>
                          <input id="information" type="text" name="size" value="<?php echo "{$row->size}"; ?>" />
                        </div>
                        <div class="item"style="display:none;">
                        <label for="information"> Category <span>*</span></label>
                          <select name="category" value="<?php echo "{$row->category}"; ?>" >
                           <option value="<?php echo "{$row->category}"; ?>"><?php echo "{$row->category}"; ?></option>
                           <option value="featured" >Featured</option>
                           <option value="bestselling">Best Selling</option>
                           <option value="hotdeals">Hot Deals</option>
                          </select>
                        </div>
                        <div class="item" style="display:none;">
                          <label for="additional-information"> Information about The Property<span>*</span></label>
                          <input id="information" type="text" name="code" value="<?php echo "{$row->code}"; ?>" />
                        </div>
                      </div>  
                    </fieldset>
                    <div class="item"style="display:none;">
                      <label for="information"> Information about The Property<span>*</span></label>
                      <textarea name="productinfo" id="information"><?php echo "{$row->productinfo}"; ?></textarea>
                    </div>
                    
                    <div class="item">
                     <label for="cover">Add to the Gallery<span>*</span></label>
                     <input onchange="readURL2(this);" id="uploadedImages2" type="file" name="productimage[]" multiple="multiple">
                    </div>
                    <div id ="editimages" class="item" style="display:flex;overflow:scroll;height:auto;">
                      <label for="preview">Preview Selected Files<span>*</span></label>
                    </div>
                    <script type="text/javascript">
                      var readURL2 = function(input) {
                      $('#editimages').empty();  
                       var number = 0;
                       $.each(input.files, function(value) {
                       var reader = new FileReader();
                       reader.onload = function (e) {
                       var id = (new Date).getTime();
                       number++;
                      $('#editimages').prepend('<img style="margin-right:10px;" id='+id+' src='+e.target.result+' width="100px" height="100px" data-index='+number+' onclick="removePreviewImage('+id+')"/><video style="margin-right:10px;" id='+id+' src='+e.target.result+' width="100px" height="100px" data-index='+number+' onclick="removePreviewImage('+id+')" controls></video>')
                      };
                      reader.readAsDataURL(input.files[value]);
                      }); 
                      }
                    </script>
                    <script>
                      $("#uploadedImages2").on("change", function(){
                      if($("#uploadedImages2")[0].files.length>5){
                      alert("Please select a maximum of 5 Files and a minimum of 4 !");
                      }
                      });
                    </script>

                   <?php }?>
                   <button type="submit" name="product" class="btn btn-primary">SAVE</button>
                  </form>
                <!-- end adding to gallery -->
            
          
          
          <?php
            require_once '../includes/config.php';
            $sql="SELECT * FROM products where code = '" .$_GET["property"] . "' LIMIT 1  ";
            $stmt = $DBH->prepare($sql);
            $stmt->execute();
            while($row = $stmt->fetchObject()) {
            
          ?>
                  <form action="deleteproducts.php" method="POST" enctype="multipart/form-data" style="box-shadow:none;">
            
                    <fieldset>
                      <div class="columns">
                        <div class="item">
                          <label for="booktitle">Property Name<span>*</span></label>
                          <input id="booktitle" type="text" name="productname" value="<?php echo "{$row->productname}"; ?>" />
                        </div>
                        <div class="item">
                          <label for="information"> Price<span>*</span></label>
                          <input id="information" type="text" name="price" value="<?php echo "{$row->price}"; ?>" />
                        </div>
                        <div class="item">
                          <label for="information"> Location<span>*</span></label>
                          <input id="information" type="text" name="location" value="<?php echo "{$row->location}"; ?>" />
                        </div>
                        <div class="item">
                          <label for="information"> Size<span>*</span></label>
                          <input id="information" type="text" name="size" value="<?php echo "{$row->size}"; ?>" />
                        </div>
                        <div class="item">
                        <label for="information"> Category <span>*</span></label>
                          <select name="category" value="<?php echo "{$row->category}"; ?>" >
                           <option value="<?php echo "{$row->category}"; ?>"><?php echo "{$row->category}"; ?></option>
                           <option value="featured" >Featured</option>
                           <option value="bestselling">Best Selling</option>
                           <option value="hotdeals">Hot Deals</option>
                          </select>
                        </div>
                        <div class="item" style="display:none;">
                          <label for="additional-information"> Information about The Property<span>*</span></label>
                          <input id="information" type="text" name="code" value="<?php echo "{$row->code}"; ?>" />
                        </div>
                      </div>  
                    </fieldset>
                    <div class="item">
                      <label for="information"> Information about The Property<span>*</span></label>
                      <textarea name="productinfo" id="information"><?php echo "{$row->productinfo}"; ?></textarea>
                    </div>
                    
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn" data-bs-dismiss="modal"  onclick="$('#staticBackdrop').modal('hide')">Cancel</button>
              <button type="submit" name="updateproduct" class="btn btn-primary">SAVE</button>
            </div>
          </form>
          <?php }?>

        </div>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../../js/script1.js"></script>
  <script type="text/javascript"></script>
  
</html>
