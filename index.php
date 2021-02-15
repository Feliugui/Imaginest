<?php include './auxiliarPHP/loginDatabase.php'?>
<!DOCTYPE html>
<html>
<head>
  <title>ImaGinest</title>
  <link rel="stylesheet" type="text/css" href="./auxiliarCss/indexCSS.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="shortcut icon" href="./assets/logo.png" />
</head>
  <body>
  <div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Welcome back!</h3>
			  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
  <?php include './auxiliarPHP/mostrarErrors.php';?>
                <div class="form-label-group">
                  <input  name="username" type="text" id="inputEmail" class="form-control" placeholder="Email address or User" required autofocus>
                  <label for="inputEmail">Email address or User</label>
                </div>

                <div class="form-label-group">
                  <input  name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                </div>
                <div class="container custom-control custom-checkbox mb-3">
                    <a  href="#" data-target="#pwdModal" data-toggle="modal">Forgot password</a>
                  </div>


                  
             <!--   <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>!-->
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="login_user">Sign in</button>
              </form>
              <div  class="custom-control custom-checkbox mb-3">
                  <a href="register.php">Sign up</a></div>
            </div>


<!--Pop-up reset Password-->
<?php include './auxiliarPHP/resetPasswordSend.php'?>
                  <div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="text-center">
                            <h1 class="text-center">What's My Password?</h1>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                  <div class="panel panel-default">
                                      <div class="panel-body">
                                          <div class="text-center">
                                            <p>If you have forgotten your password you can reset it here.</p>
                                              <div class="panel-body">
                                                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                                  <?php include './auxiliarPHP/mostrarErrors.php';?>
                                                      <div class="form-group">
                                                          <input class="form-control input-lg" placeholder="E-mail or Username" name="recupEmailUser" type="text">
                                                      </div>
                                                      <input class="btn btn-lg btn-primary btn-block" value="Send My Password" type="submit" name="recuperarPass">
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                        </div>
                        <div class="modal-footer">
                            <div class="col-md-12">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        </div>
                        </div>
                    </div>
                    </div>
                  </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
