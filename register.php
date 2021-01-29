<?php include './auxiliarPHP/registerDatabase.php'?>
<!DOCTYPE html>
<html>
<head>
  <title>ImaGinest</title>
  <link rel="stylesheet" type="text/css" href="./auxiliarCss/registerCSS.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="shortcut icon" href="./assets/logo.png" />
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Register</h5>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
      <?php include './auxiliarPHP/mostrarErrors.php';?>

              <div class="form-label-group">
                <input name="username" value="<?php echo $username; ?>" type="text" id="inputUserame" class="form-control" placeholder="Username" required autofocus>
                <label for="inputUserame">Username</label>
              </div>

              <div class="form-label-group">
                <input name="email" value="<?php echo $email; ?>" type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                <label for="inputEmail">Email address</label>
              </div>

              <hr>

              <div class="form-label-group">
                <input name="firstname" value="<?php echo $firstname; ?>" type="text" id="inputFirstName" class="form-control" placeholder="First Name" required>
                <label for="inputFirstName">First Name</label>
              </div>

              <div class="form-label-group">
                <input  type="text" name="lastName" type="text" id="inputLastName" class="form-control" placeholder="Last Name" required>
                <label for="inputLastName">Last Name</label>
              </div>

              <hr>

              <div class="form-label-group">
                <input name="password_1"  type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="form-label-group">
                <input  name="password_2" type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
                <label for="inputConfirmPassword">Confirm password</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="reg_user">Register</button>
              <a class="d-block text-center mt-2 small" href="index.php">Sign In</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>