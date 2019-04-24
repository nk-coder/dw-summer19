<?php 
include_once("db_config/config.php"); 
include_once('template/header.php'); 
include_once('template/nav.php'); 


if(isset($_SESSION['username'])){
      header("Location: index.php");
   }
?>
<?php
   $err_collect = array();
   $_SESSION['login_fail'];
   //$counter;

//block user for 3 minutes if 3 wrong login attemps
   if (isset($_SESSION['login_fail']) && $_SESSION['login_fail']>2) {
      if ((time() - $_SESSION['last_login_time'])<3*60) {
         array_push($err_collect, "You Already tried 3 times, Please try again after 3 minute later");
      }else{
         $_SESSION['login_fail'] = 0;
         if (($key = array_search('You Already tried 3 times, Please try again after 3 minute later', $err_collect)) !== false) {
             unset($err_collect[$key]);
         }
      }
   }


   if(isset($_POST["login-submit"])){
      $username = mysqli_real_escape_string($con,$_POST["username"]);
      $password = md5($_POST['password']);

      if(empty($username) || empty($password)){
         array_push($err_collect, "All Field must be filled out");
      }
      if (empty($err_collect) && !empty($username) && !empty($password)) {
         $check_user = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$password'");
         $user_query = mysqli_num_rows($check_user);

         if ($user_query == 1) {
            $row = mysqli_fetch_array($check_user);
            $userId = $row['id'];
            $username = $row['username'];
            $usertype = $row['user_type'];

            $_SESSION['id'] = $userId;
            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = $usertype;
            header("location: index.php");
         }else{
            $_SESSION['login_fail'] ++;
            //$counter++;
            //echo $counter;
            //echo $_SESSION['login_fail'];
            $_SESSION['last_login_time'] = time();
            array_push($err_collect,"Email or password was incorrect");
            
         }
      }

   }
?>

<!-- Start  login -->
          <div class="container login_form">
      <div class="row">
         <div class="col-md-6 col-md-offset-3">
            <div>
               <?php if(in_array("All Field must be filled out", $err_collect)) echo "<h3><span style='color: #e74c3c; text-align:center'>All Field must be filled out *</span></h3><br />";?>
               <?php if(in_array("You Already tried 3 times, Please try again after 3 minute later", $err_collect)) echo "<h3><span style='color: #e74c3c; text-align:center'>You Already tried 3 times, Please try again after 3 minute later</span></h3><br />";?>
               <?php if(in_array("Email or password was incorrect", $err_collect)) echo "<h3><span style='color: #e74c3c; text-align:center'>Email or password was incorrect</span></h3><br />";?>
            </div>
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