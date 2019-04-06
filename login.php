<?php 

include_once('template/header.php'); 
include_once('template/nav.php'); 

?>
<!-- Start  login -->
          <div class="container login_form">
      <div class="row">
         <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
               <div class="panel-heading">
                  <a href="login.php" class="active" id="login-form-link">Login</a>
                  <hr>
               </div>
               <div class="panel-body">
                  <div class="row">
                     <div class="col-lg-12">
                        <form id="login-form" action="" method="post" role="form" style="display: block;">
                           <div class="form-group">
                              <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                           </div>
                           <div class="form-group">
                              <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                           </div>
                           <div class="form-group text-center">
                              <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                              <label for="remember"> Remember Me</label>
                           </div>
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-sm-6 col-sm-offset-3">
                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="text-center">
                                       <a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="text-center">
                                       Not Registred?
                                       <a href="registration.php" tabindex="5" class="forgot-password">Sign Up</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                       
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
          <!--End login -->
 <?php include_once('template/footer.php');