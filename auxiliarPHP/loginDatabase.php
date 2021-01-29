<?php
session_start();

$username =""; $password=""; $usernameMail="";
$errors = array();

include('connecta_db_persistent.php') ;
include('consultasDB.php') ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login_user'])) {

        $usernameMail = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        if (existeixUserCorreu($usernameMail) > 0) {
            if (comprovaContrasenya($usernameMail, $password)) {
                if (estaActiu($usernameMail)==1)
                {
                    actualitzarlastSignIn($usernameMail);
                    $_SESSION['username'] = $usernameMail;
                    $_SESSION['success'] = "Sessio Iniciada";
                    header('Location: home.php');
                } else array_push($errors, "Error");
            }else array_push($errors, "Les dades no son correctes");
        } else array_push($errors, "No s'ha pogut iniciar sessió amb les dades introduïdes");
    }
} else {
    if (isset($_SESSION['username']) && (strrpos($_SERVER["REQUEST_URI"], "index.php"))) {
        header("Location: home.php");
    }
}