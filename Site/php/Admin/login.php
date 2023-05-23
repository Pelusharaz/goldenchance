<?php session_start();

require_once '../includes/config.php';

if(ISSET($_POST['submit'])){

$stmt = $DBH->prepare("SELECT * FROM admin WHERE role = ?");
$stmt->execute([$_POST['role']]);
$user = $stmt->fetch();
$_SESSION['role'] = $user['role'];

if ($user && password_verify($_POST['password'], $user['password']))
{   
	$_SESSION['role'] = $user['role'] ;
  if($_SESSION['role']=='super admin'){
    echo "<script>alert('Log in successful')</script>
    <script>window.location = 'registeredusers.php'</script>";
  }
  elseif($_SESSION['role']=='Maintainance'){
    echo "<script>alert('Log in successful')</script>
    <script>window.location = 'registeredusers.php'</script>";
  }
  elseif($_SESSION['role']=='Advert Manager'){
    echo "<script>alert('Log in successful')</script>
    <script>window.location = 'offers.php'</script>";
  }
  else{
    echo "<script>alert('Log in successful')</script>
    <script>window.location = 'contactmessages.php'</script>";
  }
} else {
    echo "
	<script>alert('Invalid email or password')</script>
	<script>window.location = 'login.php'</script>
	";
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" type = "text/css" href ="css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="shortcut icon" type="image" href="../../img/Golden chance logo.png" sizes="96x96" style="border-radius: 50%;"/>
    <title>Golden Chance Admin Login</title>
</head>
<body style="background-image: url('../../img/loginbg2.jpg');">
    <style>
        @media only screen and (max-width:570px) {
            .picture{
                display:none;
            }
            form{
                height:100%;
            }
        }
    </style>
    
        <div class="wrapper" style="display:flex; justify-content: center;">
        <div class="picture" style="margin-top:80px;">
            <img src="../../img/log-in.jpg" alt="" height="390px"  width="400px">
        </div>
        <div class="form-information" style="margin-top:80px;">
        <form action="login.php" method="POST">
        <div class="form-container">
            <div class="container">
                <h3 style="font-weight:bold;">Admin Log in <img src="../../img/padlock.png" alt=""align="left" width="50"></h3>
                <hr><br>
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>
                <label for="password"><b>Password</b></label>
                <div class="password">
                    <input type="password" placeholder="Enter password" name="password" id="id_password" required>
                    <i class="far fa-eye" id="togglePassword" style="margin:15px; margin-left:-60px;cursor: pointer;"></i>
                </div>
                <div class="item">
                   <select style="padding-top:8px; padding-bottom:8px;" name="role" required>
                    <option value="" disabled selected>Select Role <span>*</span></option>
                    <option value="super admin">super admin</option>
                    <option value="Advert Manager">Advert Manager</option>
                    <option value="Customer Care">Customer Care</option>
                    <option value="Maintainance">Maintainance</option>
                  </select>
                </div>
                <!-- <label for="role"><b>Role</b></label>
                <input type="email" placeholder="Enter email" name="email" required> -->
                <!-- <label for="Email"><b>RepeatPassword</b></label>
                <div class="Repeatpassword" style="display:flex;">
                   <input type="password" placeholder="Enter password" name="repeatpassword" id="id_password2" required>
                   <i class="far fa-eye" id="togglePassword2" style="margin:15px; margin-left:-60px;cursor: pointer;"></i>
                </div> -->
                <hr>
                
                <button style="float:right; background:skyblue;margin-left:80px;color:blue;" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Forgot Password</button>
                <button type="submit" name="submit" class="registerbtn" style="padding: 8px 48px;">Log in</button>
                <br><a href="signup.php"style="text-decoration:none;">sign up</a>
              </div>
        </div>
    </form>

        </div>
    </div>

    <!-- forgot password modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <legend class="modal-title btn-primary" id="staticBackdropLabel" style="border-radius:20px;"><h4 style="margin:5px 10px;;">Safe and Secure</h4></legend>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
    <form action="forgotpassword.php" method="POST" enctype="multipart/form-data" style="box-shadow:none;">
      <div class="modal-body">
      <fieldset>
        
        <div class="columns">
          <div class="item">
            <label for="email"> Registered Email<span>*</span></label>
            <input id="information" type="email" name="email" required/>
          </div>
          <div class="item">
            <label for="answer"> Answer<span>*</span></label>
            <input id="information" type="text" name="answer" required/>
          </div>
          <div class="item">
            <label for="question"> Security Question<span>*</span></label>
            <select style="padding-top:8px; padding-bottom:8px;" name="security">
              <option value="" disabled selected>Question</option>
              <option value="mothersname" >What's Your Mother's <br> Maiden Name ?</option>
              <option value="townbirth" >What is your Town of Birth ?</option>
              <option value="favcolor" >What is your favourite color ?</option>
            </select>
          </div>
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
        <button type="button" class="btn btn btn-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="securitycheck" class="btn btn-primary">Send</button>
      </div>
    </form>

  </div>
  </div>
</div>

    <!---TogglePassword-->
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');
 
       togglePassword.addEventListener('click', function (e) {
           // toggle the type attribute
           const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
           password.setAttribute('type', type);
           // toggle the eye slash icon
           this.classList.toggle('fa-eye-slash');
        });
    </script>

    <script>
        const togglePassword2 = document.querySelector('#togglePassword2');
        const repeatpassword = document.querySelector('#id_password2');
 
       togglePassword2.addEventListener('click', function (e) {
           // toggle the type attribute
           const type = repeatpassword.getAttribute('type') === 'password' ? 'text' : 'password';
           repeatpassword.setAttribute('type', type);
           // toggle the eye slash icon
           this.classList.toggle('fa-eye-slash');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>