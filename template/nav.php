

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  <h1><span>Curious </span>CyberSecurity</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li>
                    <a class="page-scroll" href="index.php">Home</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="about.php">About</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="services.php">Services</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="our-approach.php">Our Approach</a>
                  </li>

                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Drop Down<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <?php
                            if (isset($_SESSION['username'])) { $username = $_SESSION['username'];?>
                              
                            <a href="userProfile.php">My Profile</a>
                        <?php }?>
                      </li>
                      <li><a href=# >Drop Down 2</a></li>
                    </ul> 
                  </li>

                  <li>
                    <a class="page-scroll" href="contact-us.php">Contact</a>
                  </li>
                  <li>
                    <?php if(isset($_SESSION['username'])) { ?>
                      <a href="logout.php">Logout</a>
                        <?php }else {?>
                      <a href="login.php">Login</a>
                        <?php } ?>
                  </li>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->