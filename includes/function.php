<?php

function setUserSession(array$data) {
    foreach ($data as $key => $value) {

        $_SESSION[$key] = $value;
    }
}

function isUserLoggedIn() {
    return (isset($_SESSION['id'])) ? true : false;
}

function isUserAdminIn() {
    return (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) ? true : false;
}

function home() {
    header('Location:?' . ACTION . '=defaut');
}

function mod_password($pseudo, $password) {
    return sha1(strtoupper($pseudo) . ':' . strtoupper($password));
}

function VerifierEmail($monemail) {
    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $monemail)) {
        return true;
    } else {
        return false;
    }
}
