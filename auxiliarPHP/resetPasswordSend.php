<?php

$usernameMail=""; 
$correu="";
$errors = array();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['recuperarPass'])) {

        include('consultasDB.php') ;
        include('correu.php') ;

        $usernameMail = filter_input(INPUT_POST, 'recupEmailUser');

        if (existeixUserCorreu($usernameMail) > 0) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $activationCode = hash('sha256',rand());
            $correu=recuperarCorreu($usernameMail);
            resetPassword($usernameMail, $activationCode);
            $text = 'Hola Benvingut a Imaginest, <br/> <br/> Aquest és el correu de restablir la contrasenya, clic a l enllaç per restablir-la<br/> <br/><a href=http://localhost/ExercicisPHP/Practica3/resetPassword.php?code=' . $activationCode . '&mail=' . $correu . '>Click me!</a>';

            enviarCorreu($correu,$text);
        } else array_push($errors, "No hi ha ningun compte associada aquest correu o usuari");
    }
} else {
    if (isset($_SESSION['recupEmailUser']) && (strrpos($_SERVER["REQUEST_URI"], "index.php"))) {
        header("Location: home.php");
    }
}