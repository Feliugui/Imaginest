<?php
include'./auxiliarPHP/connecta_db_persistent.php';
include './auxiliarPHP/consultasDB.php';
include('./auxiliarPHP/correu.php') ;

$errors = array();
if (!empty($_GET['code']) && isset($_GET['code']) && !empty($_GET['mail']) && isset($_GET['mail'])) {

    $email = ($_GET['mail']);
    $activationCode = ($_GET['code']);

    if (existeixCorreuActivationCode($email, $activationCode) > 0) {
        if (estaResetPassword($email) == 1) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['recuperar_pass'])) {
                    $password = filter_input(INPUT_POST, 'password_1');
                    $verifypass = filter_input(INPUT_POST, 'password_2');
                    if ($password != $verifypass) {
                        array_unshift($errors, "No son la mateixa contrasenya");
                    }
                    else if (tempsLimit($email)== 0)
                    {
                      $password_hash = password_hash($password, PASSWORD_DEFAULT);
                      inserirNovaPassword($email,$password_hash);
                      $text = 'Hola Benvingut a Imaginest, <br/> <br/> Hem modificat la vostra constrasenya<br/> <br/>';
                      enviarCorreu($email,$text);
                      header("Location: index.php");
                    }
                }
            }
        } 
    } 
}
?>
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
			<form method="post" >
      <?php include './auxiliarPHP/mostrarErrors.php';?>
              <div class="form-label-group">
                <input name="password_1"  type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="form-label-group">
                <input  name="password_2" type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
                <label for="inputConfirmPassword">Confirm password</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="recuperar_pass">Change Password</button>
              <a class="d-block text-center mt-2 small" href="index.php">Cancel</a>
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