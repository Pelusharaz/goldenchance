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

<!--Adding properties-->
<?php
 require_once '../includes/config.php';
 if (isset($_POST['product'])){
  
  $productname = $_POST['productname'];
  $price = $_POST['price'];
  $productinfo = $_POST['productinfo'];
  $category = $_POST['category'];
  $products = $_POST['products'];
  $code = $_POST['code'];
  $productimage = $_FILES['productimage']['name'];
  $ext = pathinfo($productimage , PATHINFO_EXTENSION);
  
   // image file directory
   $target = "products/".basename($productimage);
  
    try {
        //code...
        $sql = 'INSERT INTO products(productname,price,productinfo,productimage,ext,category,products,code,Date,Time ) VALUES(?,?,?,?,?,?,?,?,Now(),Now() ) ';
        $sth = $DBH->prepare($sql);
        $sth->execute(array($productname,$price,$productinfo,$productimage,$ext,$category,$products,$code));
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      echo "<script>alert('Property Uploaded Successfully')</script>
		   <script>window.location = 'admin.php'</script>";
    
    //uploading image
    if (move_uploaded_file($_FILES['productimage']['tmp_name'], $target)) {
      header("location:admin.php");
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
              <strong class="text-dark mr-2">Featured Properties:</strong>
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <form action=" " method="POST" style="box-shadow:none;">
                    <input type="text" name="search" value=" " style="display:none;">
                    <button class="nav-link active" type="submit" name="submit"style="background-color:white;border:none;">All</button>
                  </form>
                </li>
                <li class="nav-item">
                  <form action=" " method="POST" style="box-shadow:none;">
                    <input type="text" name="search" value="featured" style="display:none;">
                    <button class="nav-link" type="submit" name="submit"style="background-color:white;border:none;">Featured Properties</button>
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
              </ul>
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

  <!--add properties-->
    <div class="sharaz-store" style="marging-left:auto;margin-right:auto;display:block;text-align:center;">
      <h4>ADD PROPERTIES</h4>
    </div>
    <br>
  <div class="testbox">
    <form action="admin.php" method="POST" enctype="multipart/form-data">
      <fieldset>
        <legend style="border-radius: 25px;"><h4 style="margin:15px;">Add properties</h4></legend>
        <div class="columns">
          <div class="item">
            <label for="booktitle">Property Name<span>*</span></label>
            <input id="booktitle" type="text" name="productname" />
          </div>
          <div class="item">
            <label for="information"> Price of the Property<span>*</span></label>
            <input id="information" type="text" name="price" />
          </div>
          <div class="item">
            <label for="information"> Information about The Property<span>*</span></label>
            <input id="information" type="text" name="productinfo" />
          </div>
          <div class="item" style="display:none;">
            <label for="additional-information"> Information about The Property<span>*</span></label>
            <input id="information" type="text" name="products" value="products" />
          </div>
          <div class="item">
            <select name="category">
             <option value="" disabled selected>Select Category</option>
             <option value="featured" >Featured</option>
             <option value="bestselling">Best Selling</option>
             <option value="hotdeals">Hot Deals</option>
            </select>
          </div>
          <div class="item">
            <label for="information"> Enter Unique Code<span>*</span></label>
            <input id="information" type="text" name="code" />
          </div>
          <div class="item">
              <label for="cover">File Of the Product<span>*</span></label>
              <input type="file" name="productimage" >
          </div>
      </fieldset>
      <div class="btn-block">
        <button type="submit" name="product"style="border-radius: 25px;">Submit</button>
      </div>
    </form>
    
</div>
    <br>
    <div class="sharaz-store" style="marging-left:auto;margin-right:auto;display:block;text-align:center;">
      <h4>Golden Chance Properties</h4>
    </div>
    <br><br>

       
        <!--- database products -->
        <?php
         require_once '../includes/config.php';
         if (isset($_POST['submit'])){

         $search = $_POST['search'];

         
        //code...
        $sql="SELECT * FROM products where (category LIKE '%" . $_POST["search"] . "%') OR (productname LIKE '%" . $_POST["search"] . "%') OR (productinfo LIKE '%" . $_POST["search"] . "%')OR (price LIKE '%" . $_POST["search"] . "%') OR (products LIKE '%" . $_POST["search"] . "%') ";
        $stmt = $DBH->prepare($sql);
        $stmt->execute();
        $total = $stmt->rowCount();
        
      }
      else{
        $sql="SELECT * FROM products ";
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
                       <source src="<?php echo "products/". "{$row->productimage}";?>">
                    </video>
                    <?php } else { ?>
                      <img src="<?php echo "products/" . "{$row->productimage}"; ?>" class="img-fluid" style="max-width:295px; height:300px;" />
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
                  <h6><?php echo "{$row->price}"; ?></h6>
                  <p class="card-text">
                  <?php echo "{$row->productinfo}"; ?>
                  </p>
                  
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
   <button style="margin-top:20px;" class="btn btn-dark " onclick=editproduct()>EDIT PROPERTY</button>
 </div>
  <form action="deleteproducts.php" method="post" style="box-shadow:none;">
    <input type="hidden" name="deletecode_id" value="<?php echo "{$row->id}"; ?>">
    <button type="submit" class="btn btn-danger " name="deleteproduct_btn">DELETE PROPERTY</button>
  </form>
  <?php
            require_once '../includes/config.php';
            $sql1="SELECT * FROM soldout WHERE propertyId = $row->id";
            $stmt1 = $DBH->prepare($sql1);
            $stmt1->execute();
            if($stmt1->rowCount() == 1) {
            while($row1 = $stmt1->fetchObject()) {
            ?>
        <a class="btn btn-danger" style="cursor: no-drop;">SOLD OUT</a>
        <?php }}else{?>
          <form action="deleteproducts.php" method="post" style="box-shadow:none;">
            <input type="hidden" name="soldid" value="<?php echo "{$row->id}"; ?>">
            <button type="submit" class="btn btn-warning" name="soldbtn">SEll</button>
          </form>
  <?php }?>
</div>
</div>
                  </div>
                  <br>
                <div id="cardupdate" class="card-update" style="display:none;">
                  <form action="deleteproducts.php" method="POST" enctype="multipart/form-data" style=" ">
                    <fieldset>
                      <legend style="border-radius:25px;"><p style="margin:15px;">Edit the Property</p></legend>
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
                          <input id="information" type="text" name="id" value="<?php echo "{$row->id}"; ?>" />
                        </div>
                      </div>  
                    </fieldset>
                    <div class="item">
                      <label for="information"> Information about The Property<span>*</span></label>
                      <input id="information" type="text" name="productinfo"value="<?php echo "{$row->productinfo}"; ?>" />
                    </div>
                    <div class="item">
                      <label for="cover">Property<span>*</span></label>
                      <input type="file" name="productimage" required>
                    </div>
                    <div class="btn-block">
                     <button type="submit" class="btn btn-dark " name="updateproduct"> SAVE </button>
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
                       <source src="<?php echo "products/". "{$row->productimage}";?>">
                    </video>
                    <?php } else { ?>
                      <img src="<?php echo "products/" . "{$row->productimage}"; ?>" class="img-fluid" style="max-width:295px; height:300px;" />
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
                  <h6><?php echo "{$row->price}"; ?></h6>
                  <p class="card-text">
                  <?php echo "{$row->productinfo}"; ?>
                  </p>
<div class="tools" style="display:flex;margin-left:-40px;">

<div class="delete-edit" style="margin-left:auto;margin-right:auto;display:block;">
 <div class="edit" >
   <button style="margin-top:20px;" class="btn btn-dark " onclick=editproduct()>EDIT PROPERTY</button>
 </div>
  <form action="deleteproducts.php" method="post" style="box-shadow:none;">
    <input type="hidden" name="deletecode_id" value="<?php echo "{$row->id}"; ?>">
    <button type="submit" class="btn btn-danger " name="deleteproduct_btn">DELETE PROPERTY</button>
  </form>
  <?php
            require_once '../includes/config.php';
            $sql1="SELECT * FROM soldout WHERE propertyId = $row->id";
            $stmt1 = $DBH->prepare($sql1);
            $stmt1->execute();
            if($stmt1->rowCount() == 1) {
            while($row1 = $stmt1->fetchObject()) {
            ?>
        <a class="btn btn-danger" style="cursor: no-drop;">SOLD OUT</a>
        <?php }}else{?>
          <form action="deleteproducts.php" method="post" style="box-shadow:none;">
            <input type="hidden" name="soldid" value="<?php echo "{$row->id}"; ?>">
            <button type="submit" class="btn btn-warning" name="soldbtn">SEll</button>
          </form>
  <?php }?>
</div>
</div>
                  <br>
                <div id="cardupdate" class="card-update" style="display:none;">
                  <form action="deleteproducts.php" method="POST" enctype="multipart/form-data" style=" ">
                    <fieldset>
                      <legend style="border-radius:25px;"><p style="margin:15px;">Edit the Property</p></legend>
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
                          <input id="information" type="text" name="id" value="<?php echo "{$row->id}"; ?>" />
                        </div>
                      </div>  
                    </fieldset>
                    <div class="item">
                      <label for="information"> Information about The Property<span>*</span></label>
                      <input id="information" type="text" name="productinfo"value="<?php echo "{$row->productinfo}"; ?>" />
                    </div>
                    <div class="item">
                      <label for="cover">Property<span>*</span></label>
                      <input type="file" name="productimage" required>
                    </div>
                    <div class="btn-block">
                     <button type="submit" class="btn btn-dark " name="updateproduct"> SAVE </button>
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
                       <source src="<?php echo "products/". "{$row->productimage}";?>">
                    </video>
                    <?php } else { ?>
                      <img src="<?php echo "products/" . "{$row->productimage}"; ?>" class="img-fluid" style="max-width:295px; height:300px;" />
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
                  <h6><?php echo "{$row->price}"; ?></h6>
                  <p class="card-text">
                  <?php echo "{$row->productinfo}"; ?>
                  </p>
<div class="tools" style="display:flex;margin-left:-40px;">

<div class="delete-edit" style="margin-left:auto;margin-right:auto;display:block;">
 <div class="edit" >
   <button style="margin-top:20px;" class="btn btn-dark " onclick=editproduct()>EDIT PROPERTY</button>
 </div>
  <form action="deleteproducts.php" method="post" style="box-shadow:none;">
    <input type="hidden" name="deletecode_id" value="<?php echo "{$row->id}"; ?>">
    <button type="submit" class="btn btn-danger " name="deleteproduct_btn">DELETE PROPERTY</button>
  </form>
  <?php
            require_once '../includes/config.php';
            $sql1="SELECT * FROM soldout WHERE propertyId = $row->id";
            $stmt1 = $DBH->prepare($sql1);
            $stmt1->execute();
            if($stmt1->rowCount() == 1) {
            while($row1 = $stmt1->fetchObject()) {
            ?>
        <a class="btn btn-danger" style="cursor: no-drop;">SOLD OUT</a>
        <?php }}else{?>
          <form action="deleteproducts.php" method="post" style="box-shadow:none;">
            <input type="hidden" name="soldid" value="<?php echo "{$row->id}"; ?>">
            <button type="submit" class="btn btn-warning" name="soldbtn">SEll</button>
          </form>
  <?php }?>
</div>
</div>
                </div>
                <br>
                <div id="cardupdate" class="card-update" style="display:none;">
                  <form action="deleteproducts.php" method="POST" enctype="multipart/form-data" style=" ">
                    <fieldset>
                      <legend style="border-radius:25px;"><p style="margin:15px;">Edit the Property</p></legend>
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
                          <input id="information" type="text" name="id" value="<?php echo "{$row->id}"; ?>" />
                        </div>
                      </div>  
                    </fieldset>
                    <div class="item">
                      <label for="information"> Information about The Property<span>*</span></label>
                      <input id="information" type="text" name="productinfo"value="<?php echo "{$row->productinfo}"; ?>" />
                    </div>
                    <div class="item">
                      <label for="cover">Property<span>*</span></label>
                      <input type="file" name="productimage" required>
                    </div>
                    <div class="btn-block">
                     <button type="submit" class="btn btn-dark " name="updateproduct"> SAVE </button>
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
