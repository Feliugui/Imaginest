<?php
session_start();

$username  = "";$firstname = "";$secondName =""; $password =""; $verifypass  =""; $password_hash = ""; $email="";
$errors = array();

include('connecta_db_persistent.php') ;
include('consultasDB.php') ;
include('correu.php') ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['reg_user'])) {
        $username = filter_input(INPUT_POST, 'username');
        $email = filter_input(INPUT_POST, 'email');
        $firstname = filter_input(INPUT_POST, 'firstname');
        $secondName = filter_input(INPUT_POST, 'secondName');
        $password = filter_input(INPUT_POST, 'password_1');
        $verifypass = filter_input(INPUT_POST, 'password_2');

        if (!preg_match("/^[a-zA-Z0-9]{6,20}$/", $password)) {
            array_unshift($errors, "La contrasenya ha de tenir entre 6 i 20.");
        }
        if ($password != $verifypass) {
            array_unshift($errors, "No son la mateixa contrasenya");
        }

        if (!preg_match("/^[a-zA-Z ]*$/", $secondName)) {
            array_unshift($errors, "Els congnoms ha de tenir nomes lletras");
        }

        if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
            array_unshift($errors, "El nom nomes ha de tenir nomes lletras");
        }

        if (!preg_match("/^[a-zA-Z0-9]{6,10}$/", $username)) {
            array_unshift($errors, "El nom usuari nomes permet entre 6 i 10 lletras");
        }
        if (existeixCorreu($email) > 0) {
            array_unshift($errors,"Usuari amb aquest correu ja existeix");
        }

        if (existeixUsername($username) > 0) {
            array_unshift($errors,"El nom d'usuari introduit ja existeix");
        }

 
        if (count($errors) == 0) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $activationCode = hash('sha256',rand());
            $text = 'Hola Benvingut a Imaginest, <br/> <br/> Hem d’assegurar-nos que sou humans. Verifiqueu el vostre correu electrònic i comenceu a utilitzar el vostre compte.<br/> <br/><a href=http://localhost/ExercicisPHP/Practica3/mailCheckAccount.php?code=' . $activationCode . '&mail=' . $email . '>Click me!</a>';
            insereixDatabase($email, $username, $password_hash, $firstname, $secondName,$activationCode);
            $_SESSION['success'] = "S'ha registrar el nou usuari";
            enviarCorreu($email, $text);
            
            exit;
        }
    }


}
