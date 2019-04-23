

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
                <a class="navbar-brand page-scroll sticky-logo" href="index.php">
                  <h1><span>Curious </span><br>CyberSecurity</h1>
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
                    <a class="page-scroll" href="training.php">Training</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="our-approach.php">Our Approach</a>
                  </li>
                  
                  <li>
                    <a class="page-scroll" href="contact-us.php">Contact</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="location.php">Location</a>
                  </li>

                  <?php if(isset($_SESSION['username'])) { $username = $_SESSION['username'];?>

                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $username; ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="userProfile.php">My Profile</a></li>

                      <?php if(isset($_SESSION['username']) && $_SESSION['user_type'] == 0){ $username = $_SESSION['username'];?>
                      <li><a href="userBookingDetails.php">My Booking List</a></li>
                    <?php } ?>

                      <?php if(isset($_SESSION['username']) && $_SESSION['user_type'] == 1){ $username = $_SESSION['username'];?>
                        <li><a href="adminAddTraining.php" >Add New Training</a></li>
                        <li><a href="adminAddNewService.php" >Add New Service</a></li>
                        <li><a href="adminBookedTrainingView.php" >Trainings Booked List</a></li>
                        <li><a href="services.php" >Add New Services</a></li>

                      <?php }?>
                    </ul> 
                  </li>
                  <?php }?>

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