<?php
function existeixCorreu($email)
{
    include('connecta_db_persistent.php') ;
    $ejecutaConsulta = $db->query("SELECT * FROM users WHERE mail = '{$email}' ");

    return $ejecutaConsulta->rowCount();
}

function existeixUsername($username)
{
    include('connecta_db_persistent.php') ;
    $ejecutaConsulta = $db->query("SELECT * FROM users WHERE username = '{$username}' ");

    return $ejecutaConsulta->rowCount();
}

function insereixDatabase($email, $username, $password_hash, $firstname, $secondName)
{
    include('connecta_db_persistent.php') ;

    $active=1;
    $ejecutaConsulta= $db->query("INSERT INTO users (mail, username, passHash, userFirstName, userLastName, active) VALUES ('{$email}', '{$username}', '{$password_hash}', '{$firstname}', '{$lastname}','{$active}')");
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