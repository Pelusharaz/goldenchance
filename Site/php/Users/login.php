<?php session_start();

require_once '../includes/config.php';

if(ISSET($_POST['submit'])){

$stmt = $DBH->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$_POST['username']]);
$user = $stmt->fetch();
$_SESSION['username'] = $user['username'];

if ($user && password_verify($_POST['password'], $user['password']))
{   
	$_SESSION['username'] = $user['username'];
    echo "<script>alert('Log in Successful')</script>
	<script>window.location = '../../home-loggedin.php'</script>";
} else {
    echo "
	<script>alert('Invalid username or password')</script>
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
    <link rel ="stylesheet" type = "text/css" href ="../Admin/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="shortcut icon" type="image" href="../../img/Golden chance logo.png" sizes="96x96" style="border-radius: 50%;"/>
    <title>Golden Chance user Login</title>
</head>
<body style="background-image: url('../../img/loginbg2.jpg');">
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </a>
    <a href="../../home-loggedin.php">
      <img src="../../img/Golden chance logo.png" class="small-screen-logo" align="right" height="80" width="220" alt="" loading="lazy" style="border-radius:50%;" />
    </a>
    <div class="collapse navbar-collapse" id="navbarExample01">
        <a class="navbar-brand" href="../../home-loggedin.php" style="margin-right:-30px; margin-left:-30px;">
          <img src="../../img/Golden chance logo.png" class="large-screen-logo" height="100" width="280" alt="" loading="lazy" style="border-radius:50%;" />
        </a>
        <div class="container">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="../../home-loggedin.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="../../properties.php">Properties</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="../../services/blogs.php">Blogs</a>
            </li>
        </ul>
        </div>
    </div>
  </nav>
    <style>
      .btn:hover{
         background: orangered;
       }
       .small-screen-logo {
          display: none;
        }
        .forgotpass{
           position:fixed;
           margin-top:-10px;
        }
        .button {
        text-decoration:none;
        cursor:pointer;
        text-align: center;
        opacity: 1;
        background: blue;
        color: #fff;
        padding: 14px 30px;
       }
       form{
         height:100%;
        }
        @media only screen and (max-width:700px) {
            .picture{
                display:none;
            }
            form{
                height:100%;
            }
            .small-screen-logo {
                display: block;
                margin: -15px 0px -8px -15px;
              }

              .large-screen-logo {
                display: none;
              }
        }
    </style>
    
        <div class="wrapper" style="display:flex; justify-content: center;">
        <div class="picture" style="margin-top:50px;background-color:white;">
            <img src="../../img/land 2.jpg" alt="" height="387px"  width="400px">
        </div>
        <div class="form-information" style="margin-top:50px;">
        <form action="login.php" method="POST">
        <div class="form-container">
            <div class="container">
                <h3 style="font-weight:bold;">User Log in <img src="../../img/padlock.png" alt=""align="left" width="50"></h3>
                <hr><br>
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>
                <label for="password"><b>Password</b></label>
                <div class="password">
                    <input type="password" placeholder="Enter password" name="password" id="id_password" required>
                    <i class="far fa-eye" id="togglePassword" style="margin:15px; margin-left:-60px;cursor: pointer;"></i>
                </div>
                <!-- <label for="Email"><b>RepeatPassword</b></label>
                <div class="Repeatpassword" style="display:flex;">
                   <input type="password" placeholder="Enter password" name="repeatpassword" id="id_password2" required>
                   <i class="far fa-eye" id="togglePassword2" style="margin:15px; margin-left:-60px;cursor: pointer;"></i>
                </div> -->
                <hr>
                
                <button type="submit" name="submit" class="registerbtn"style="margin:auto; display:block;background: rgb(241, 50, 194)  ;">Log in</button>
                <br><a href="signup.php" class="button">sign up</a>
                <a class="button forgotpass" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="float:right;margin-left:55px;padding:12px;">Forgot Password</a>
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
        <legend class="modal-title btn-primary" id="staticBackdropLabel" style="border-radius:20px;"><h3 style="margin:5px 10px;;">Safe and Secure</h5></legend>
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
    <script type="text/javascript" src="../../js/script1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!--Footer-->
    <footer class="text-center text-white" style="background-color: #f1f1f1; bottom:0; position:fixed; width:100%;">
      <!-- Copyright -->
      <div class="text-center text-dark p-3" style="background-color: blue;">
         <p style="color:white;"> &copy; Copyright <?php $year = date("Y"); echo $year; ?>
          <a class="text-white" style="text-decoration: none;" href="http://sharaztechs.66ghz.com">Golden Chance - Developed By Sharaz Technologies</a>
        </p>
      </div>
    </footer>

    </body>
</html>