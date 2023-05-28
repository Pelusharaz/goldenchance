    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container-fluid">
        <a class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </a>
        <a href="home-loggedin.php">
          <img src="img/Golden chance logo.png" class="small-screen-logo" align="right" height="80" width="220" alt="" loading="lazy" style="border-radius:50%;" />
        </a>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <a class="navbar-brand" href="#" style="margin-right:-30px; margin-left:-30px;">
            <img src="img/Golden chance logo.png" class="large-screen-logo" height="100" width="280" alt="" loading="lazy" style="border-radius:50%;" />
          </a>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="home-loggedin.php"><p style="font-weight: bolder;">Home</p></a>
            </li>
            <li class="nav-item active" style="cursor:pointer;">
              <a class="nav-link" aria-current="page" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><p style="font-weight: bolder;">Make Enquiries</p></a>
            </li>
            <li class="nav-item active" style="cursor:pointer;">
              <a class="nav-link" aria-current="page" onclick="whoweare()"><p style="font-weight: bolder;">About us</p></a>
            </li>
            <li class="nav-item active" style="cursor:pointer;">
              <a class="nav-link" aria-current="page" onclick="contactus()"><p style="font-weight: bolder;">Contact us</p></a>
            </li>
            <li class="nav-item active" style="cursor:pointer;">
              <a class="nav-link" aria-current="page" onclick="showblogs()"><p style="font-weight: bolder;">Blogs</p></a>
            </li>
            <li class="nav-item active" style="cursor:pointer;">
              <a class="nav-link" aria-current="page" href="services/studio.php"><p style="font-weight: bolder;">Gallery</p></a>
            </li>

            <!-- <li class="nav-item me-3 me-lg-0 dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false"><p style="font-weight: bolder;">Gallery</p></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item" onclick="showblogs()"> <i class="fa fa-book" aria-hidden="true" style="cursor:pointer;"> Blogs</i> </a>
                </li>
                <li>
                  <a class="dropdown-item" href="services/studio.php"> <i class="fa fa-camera" aria-hidden="true" style="cursor:pointer;"> View Gallery</i> </a>
                </li>
              </ul>
            </li>  -->
             
            <li class="nav-item me-3 me-lg-0 dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">

                <button class="btn btn-outline-primary" type="submit" name="submit" data-mdb-ripple-color="dark">Our properties
                </button>
                <img src="img/icons/services.png" alt="services">
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
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item" href="tel:0791386752"><i class="fa fa-phone fa fa-flip-horizontal"></i> Own property Today!</a>
            </li>
          </ul>
          </li>

          </ul>
          <ul class="navbar-nav d-flex flex-row">
            <!-- Icon dropdown -->
            <li class="nav-item me-3 me-lg-0 dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item" href="php/Users/signup.php">Sign Up</a>
                </li>
                <li>
                  <a class="dropdown-item" href="php/Users/login.php">Log in</a>
                </li>
                <li>
                  <a class="dropdown-item" href="php/Admin/login.php"><i class="fa fa-lock" aria-hidden="true"></i></a>
                </li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li>
                  <a class="dropdown-item" href="tel:0791386752"> <i class="fa fa-phone fa fa-flip-horizontal"></i> We are Just a call away </a>
                </li>
              </ul>
            </li>
            
            <!-- Icons -->
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" target="_blank" href="mailto:goldenchancerealestateltd@gmail.com">
                <i class="fa fa-envelope"><p style="font-weight:bolder;"></p></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="tel:0740027027">
                <span class="badge badge-pill bg-danger"></span>
                <span><i class="fa fa-phone fa fa-flip-horizontal"></i></span>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" target="_blank" href="https://wa.me/+254740027027">
                <i class="fab fa-whatsapp"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="tel:0740027027">
                <span class="badge badge-pill bg-danger"></span>
                <span style="font-weight:bolder;">0740027027</span>
              </a>
            </li>
            
          </ul>
          <!-- <iframe name="reload" style="display:none;"></iframe>
          <form class="d-flex input-group w-auto" action="index.php" target="reload" method="POST" onsubmit="property()" style="box-shadow:none;display:flex;">
            <input style="padding:10px;" type="text" class="form-control" placeholder="Search for property" aria-label="Search" name="search" />
            <button style="margin-bottom:10px;" class="btn btn-outline-primary" type="submit" name="submit" data-mdb-ripple-color="dark">Go
            </button>
          </form> -->

          <script>
            function property() {
              var search = document.getElementById("store");

              search.scrollIntoView({
                behavior: "smooth",
                block: "end",
                inline: "nearest"
              })

            }

            function whoweare() {
              var search = document.getElementById("whoweare");

              search.scrollIntoView({
                behavior: "smooth",
                block: "end",
                inline: "nearest"
              })

            }
            function contactus() {
              var search = document.getElementById("contactus");

              search.scrollIntoView({
                behavior: "smooth",
                block: "end",
                inline: "nearest"
              })

            }

            function showblogs() {
              var search = document.getElementById("blogs");

              search.scrollIntoView({
                behavior: "smooth",
                block: "end",
                inline: "nearest"
              })

            }
          </script>
        </div>
      </div>
    </nav>