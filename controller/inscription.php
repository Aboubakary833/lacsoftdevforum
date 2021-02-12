<?php

require_once "Authentification.class.php";

$username = htmlspecialchars($_POST['username']);
$password = $_POST['password'];
$data = array();
array_push($data, $username, $password);
$connexion = new Authentification($data);

if($connexion->login()) {
    echo 'accueil.php';
} else {
    echo 'L\'un ou les deux champs est incorrect!';
}
?>