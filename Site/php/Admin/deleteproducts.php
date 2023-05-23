<!-- sold out -->
 <?php
 require_once '../includes/config.php';
 if (isset($_POST['soldbtn'])){
    $id = $_POST['soldid'];
    try {
        //code...
        $sql1 = "SELECT * FROM soldout WHERE propertyId =  '$id'";
        $sth1 = $DBH->prepare($sql1);
        $sth1->execute(array());

        if($sth1->rowCount() == 1) {
          echo "<script>alert('Error! Property already Marked as sold out')</script>
          <script>window.location = 'admin.php'</script>"; 
        }else{
          $sql = "INSERT INTO soldout(propertyId) VALUES($id)";
          $sth = $DBH->prepare($sql);
          $sth->execute(array());
        }

        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      
      echo "<script>alert('Property Marked as sold out successfully')</script>
		  <script>window.location = 'admin.php'</script>"; 

    }  
 ?>
<!-- delete blog -->
<?php
 require_once '../includes/config.php';
 if (isset($_POST['deleteblog_btn'])){

    $id = $_POST['deleteblog_id'];
    echo $id;
  

    try {
        //code...
        $sql = "DELETE FROM blogs WHERE id='$id'";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      echo "<script>alert('Blog has been deleted successfully')</script>
		   <script>window.location = 'blogs.php'</script>"; 
    }
    
 ?>
<!-- Update blogs -->
<?php
 require_once '../includes/config.php';
 if (isset($_POST['updateblog'])){

  $id = $_POST['id'];
  $blogtitle = $_POST['blogtitle'];
  $price = $_POST['price'];
  $bloginfo = $_POST['bloginfo'];
  $dateposted = $_POST['dateposted'];
  $postedby = $_POST['postedby'];
  $blogimage = $_FILES['blogimage']['name'];
  $ext = pathinfo($blogimage, PATHINFO_EXTENSION);

  // image file directory
  $target = "blogs/".basename($blogimage);
  
  

    try {
        //code...
        $sql = "UPDATE blogs SET blogtitle='$blogtitle',price='$price',bloginfo='$bloginfo', dateposted = '$dateposted', postedby='$postedby', blogimage='$blogimage',ext='$ext'  where id= '". $_POST["id"] ."' ";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      
      echo "<script>alert('Blog edited Successfully')</script>
		  <script>window.location = 'blogs.php'</script>";

    //uploading image
    if (move_uploaded_file($_FILES['blogimage']['tmp_name'], $target)){
      header("location:blogs.php");
      $msg = "Blog image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

    }  
 ?>


<!-- delete properties -->
<?php
 require_once '../includes/config.php';
 if (isset($_POST['deleteproduct_btn'])){

    $id = $_POST['deletecode_id'];
    echo $id;
  

    try {
        //code...
        $sql = "DELETE FROM products WHERE id='$id'";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      echo "<script>alert('property has been deleted successfully')</script>
		   <script>window.location = 'admin.php'</script>"; 
    }
    
 ?>
<!-- Update properties -->
<?php
 require_once '../includes/config.php';
 if (isset($_POST['updateproduct'])){

  $id = $_POST['id'];
  $productname = $_POST['productname'];
  $price = $_POST['price'];
  $productinfo = $_POST['productinfo'];
  $category = $_POST['category'];
  $productimage = $_FILES['productimage']['name'];
  $ext = pathinfo($productimage, PATHINFO_EXTENSION);

  // image file directory
  $target = "products/".basename($productimage);
  
  

    try {
        //code...
        $sql = "UPDATE products SET productname='$productname',price='$price',productinfo='$productinfo',category='$category',productimage='$productimage',ext='$ext'  where id= '". $_POST["id"] ."' ";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      
      echo "<script>alert('Property edited Successfully')</script>
		  <script>window.location = 'admin.php'</script>";

    //uploading image
    if (move_uploaded_file($_FILES['productimage']['tmp_name'], $target)){
      header("location:admin.php");
      $msg = "profile uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

    }  
 ?>

 <!---Edit gallery-->
 <!---Delete pictures-->
 <?php
 require_once '../includes/config.php';
 if (isset($_POST['deletepic_btn'])){

    $id = $_POST['deletepic_id'];
    echo $id;
  

    try {
        //code...
        $sql = "DELETE FROM studio WHERE id='$id'";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      echo "<script>alert('picture has been deleted successfully')</script>
		   <script>window.location = 'updatestudio.php'</script>"; 
    }
    
 ?>

 <!---update gallery--->
 <?php
 require_once '../includes/config.php';
 if (isset($_POST['updategallery'])){

  $id = $_POST['id'];
  $category = $_POST['category'];
  $image = $_FILES['image']['name'];
  $ext = pathinfo($image, PATHINFO_EXTENSION);

  // image file directory
  $target = "studio/".basename($image);
  
  

    try {
        //code...
        $sql = "UPDATE studio SET category='$category',image='$image',ext='$ext'  where id= '". $_POST["id"] ."' ";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      
      echo "<script>alert('Gallery edited Successfully')</script>
		  <script>window.location = 'updatestudio.php'</script>";

    //uploading image
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
      header("location:updatestudio.php");
      $msg = "Picture uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

    }  
 ?>

 <!---Delete contact messages-->
<?php
 require_once '../includes/config.php';
 if (isset($_POST['deletemessage_btn'])){

    $id = $_POST['deletemessage_id'];
    echo $id;
  

    try {
        //code...
        $sql = "DELETE FROM contact WHERE id='$id'";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      echo "<script>alert('Message has been deleted successfully')</script>
		   <script>window.location = 'contactmessages.php'</script>"; 
    }
    
 ?>

 <!---Delete enquiry messages-->
<?php
 require_once '../includes/config.php';
 if (isset($_POST['deleteenquiry_btn'])){

    $id = $_POST['deleteenquiry_id'];
    echo $id;
  

    try {
        //code...
        $sql = "DELETE FROM enquiries WHERE id='$id'";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      echo "<script>alert('Message has been deleted successfully')</script>
		   <script>window.location = 'contactmessages.php'</script>"; 
    }
    
 ?>

<!---Delete registered user-->
<?php
 require_once '../includes/config.php';
 if (isset($_POST['deleteuser_btn'])){

    $id = $_POST['deleteuser_id'];
    echo $id;
  

    try {
        //code...
        $sql = "DELETE FROM users WHERE id='$id'";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      echo "<script>alert('User account has been deleted successfully')</script>
		   <script>window.location = 'registeredusers.php'</script>"; 
    }
    
 ?>

<!---Delete employee-->
 <?php
 require_once '../includes/config.php';
 if (isset($_POST['deleteemployee_btn'])){

    $id = $_POST['deleteemployee_id'];
    echo $id;
  

    try {
        //code...
        $sql = "DELETE FROM admin WHERE id='$id'";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      echo "<script>alert('Employee account has been deleted successfully')</script>
		   <script>window.location = 'registeredusers.php'</script>"; 
    }
    
 ?>

 <!---Delete bookings-->
<?php
 require_once '../includes/config.php';
 if (isset($_POST['booking_btn'])){

    $id = $_POST['deletebooking_id'];
    echo $id;
  

    try {
        //code...
        $sql = "DELETE FROM bookings WHERE id='$id'";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      echo "<script>alert('Booking has been deleted successfully')</script>
		   <script>window.location = 'bookings.php'</script>"; 
    }
    
 ?>

 <!-- delete call Requests -->
<?php
 require_once '../includes/config.php';
 if (isset($_POST['deleterequest_btn'])){

    $id = $_POST['deleterequest_id'];
    echo $id;
  

    try {
        //code...
        $sql = "DELETE FROM callrequests WHERE id='$id'";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      echo "<script>alert('Call Request has been deleted successfully')</script>
		   <script>window.location = 'orders.php'</script>"; 
    }
    
 ?>

 <!-- Update products -->
<?php
 require_once '../includes/config.php';
 if (isset($_POST['assign_role'])){

  $id = $_POST['id'];
  $role = $_POST['role'];

    try {
        //code...
        $sql = "UPDATE admin SET role='$role' where id= '". $_POST["id"] ."' ";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      
      echo "<script>alert('Role assigned Successfully')</script>
		  <script>window.location = 'registeredusers.php'</script>";

    }  
 ?>
 <!-- delete offers -->
<?php
 require_once '../includes/config.php';
 if (isset($_POST['deleteoffer_btn'])){

    $id = $_POST['deleteoffer_id'];
    echo $id;
  

    try {
        //code...
        $sql = "DELETE FROM offers WHERE id='$id'";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      echo "<script>alert('Offer has been deleted successfully')</script>
		   <script>window.location = 'offers.php'</script>"; 
    }
    
 ?>

 <!---update offer--->
 <?php
 require_once '../includes/config.php';
 if (isset($_POST['updateoffer'])){

  $id = $_POST['id'];
  $productname = $_POST['productname'];
  $productinfo = $_POST['productinfo'];
  $date = $_POST['date'];
  $productimage = $_FILES['productimage']['name'];
  $ext = pathinfo($productimage, PATHINFO_EXTENSION);

  // image file directory
  $target = "offers/".basename($productimage);
  
  

    try {
        //code...
        $sql = "UPDATE offers SET productname='$productname',productinfo='$productinfo',date='$date',productimage='$productimage',ext='$ext'  where id= '$id' ";
        $sth = $DBH->prepare($sql);
        $sth->execute(array());
        $_SESSION['success'] = "message sent successfully.";
      } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
      }
      
      echo "<script>alert('Offer edited Successfully')</script>
		  <script>window.location = 'offers.php'</script>";

    //uploading image
    if (move_uploaded_file($_FILES['productimage']['tmp_name'], $target)){
      header("location:offers.php");
      $msg = "Picture uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

    }  
 ?>