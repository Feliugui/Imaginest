<?php
function existeixCorreu($email)
{
    include('connecta_db_persistent.php') ;
    $ejecutaConsulta = $db->query("SELECT * FROM users WHERE mail = '{$email}' ");

    return $ejecutaConsulta->rowCount();
}
function existeixCorreuActivationCode($email,$activationCode)
{
    include('connecta_db_persistent.php') ;
    $ejecutaConsulta = $db->query("SELECT * FROM users WHERE (mail = '{$email}' or username = '{$email}' )  and resetPassCode = '{$activationCode}' ");

    $qtt = $ejecutaConsulta->rowCount();
    return $qtt;
}
function existeixCorreuResetCode($email,$activationCode)
{
    include('connecta_db_persistent.php') ;
    $ejecutaConsulta = $db->query("SELECT * FROM users WHERE (mail = '{$email}' or username = '{$email}')  and activationCode = '{$activationCode}' ");

    $qtt = $ejecutaConsulta->rowCount();
    return $qtt;
}
function existeixUsername($username)
{
    include('connecta_db_persistent.php') ;
    $ejecutaConsulta = $db->query("SELECT * FROM users WHERE username = '{$username}' ");

    return $ejecutaConsulta->rowCount();
}

function insereixDatabase($email, $username, $password_hash, $firstname, $secondName,$activationCode)
{
    include('connecta_db_persistent.php') ;
    $active=0;
    $ejecutaConsulta= $db->query("INSERT INTO users (mail, username, passHash, userFirstName, userLastName, active, activationCode) VALUES ('{$email}', '{$username}', '{$password_hash}', '{$firstname}', '{$secondName}','{$active}','{$activationCode}')");
    $ejecutaConsulta = $db->query("UPDATE users SET creationDate = current_timestamp WHERE (username = '{$username}' or mail = '{$email}')");
    
    
}

function existeixUserCorreu($email)
{
    include('connecta_db_persistent.php') ;
    $ejecutaConsulta = $db->query("SELECT * FROM users WHERE (username = '{$email}' or mail = '{$email}')");
    return $ejecutaConsulta->rowCount();
}

function comprovaContrasenya($email, $password)
{
    include('connecta_db_persistent.php') ;
    $ejecutaConsulta = $db->query("SELECT passHash FROM users WHERE (username = '{$email}' or mail = '{$email}')");
    $pass = $ejecutaConsulta->fetchColumn();

    return password_verify($password, $pass);
}

function actualitzarlastSignIn($email)
{
    include('connecta_db_persistent.php') ;
    $ejecutaConsulta = $db->query("UPDATE users SET lastSignIn = current_timestamp WHERE (username = '{$email}' or mail = '{$email}')");
}
function estaActiu($email)
{
    include('connecta_db_persistent.php') ;
    $ejecutaConsulta = $db->query("SELECT active FROM users WHERE (username = '{$email}' or mail = '{$email}')");
    $estaActiu = $ejecutaConsulta->fetchColumn();

    return $estaActiu;
}
function estaResetPassword($email)
{
    include('connecta_db_persistent.php') ;
    $ejecutaConsulta = $db->query("SELECT resetPass FROM users WHERE (username = '{$email}' or mail = '{$email}')");
    $estaActiu = $ejecutaConsulta->fetchColumn();

    return $estaActiu;
}
function resetPassword($email,$resetPassCode)
{
    include('connecta_db_persistent.php') ;
    $limitTemps=strtotime("+1800 seconds");
    $fecha=date("Y-m-d h:i:sa",$limitTemps);
    $ejecutaConsulta = $db->query("UPDATE users SET  resetPass = 1 , resetPassCode ='{$resetPassCode}', resetPassExpiry= '{$fecha}'   WHERE (username = '{$email}' or mail = '{$email}')");
}
function inserirNovaPassword($email,$password)
{
    include('connecta_db_persistent.php') ;
    $ejecutaConsulta = $db->query("UPDATE users SET passHash='{$password}', resetPass=0, resetPassCode = null, resetPassExpiry= null   WHERE (username = '{$email}' or mail = '{$email}')");
}
function activarnouUsuari($email)
{
    include('connecta_db_persistent.php') ;
    $active = 1;
    $ejecutaConsulta = $db->query("UPDATE users SET active = $active WHERE mail = '{$email}'");
    $ejecutaConsulta = $db->query("UPDATE users SET activationCode = null WHERE mail = '{$email}'");
}
function tempsLimit($email)
{
    include('connecta_db_persistent.php') ;
    $ejecutaConsulta = $db->query("SELECT resetPassExpiry FROM users WHERE (username = '{$email}' or mail = '{$email}')");
    $dataExpiry = $ejecutaConsulta->fetchColumn();
    $fecha=date("Y-m-d h:i:sa",);
    if ($dataExpiry>$fecha)
    {
        $qtt = 0;
    }
    else $qtt = 1;
    return $qtt;
}
function recuperarCorreu($username)
{
    include('connecta_db_persistent.php') ;
    $ejecutaConsulta = $db->query("SELECT mail FROM users WHERE (username = '{$username}' or mail = '{$username}')");
    $email = $ejecutaConsulta->fetchColumn();
    return $email;
}