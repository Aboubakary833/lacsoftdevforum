<?php

require_once "../classes/Authentification.class.php";
$username = htmlspecialchars($_POST['username']);
$password = sha1(htmlspecialchars($_POST['password']));
$data = array();
array_push($data, $username, $password);
$connexion = new Authentification($data);
$home = $connexion->login();
echo $home;
?>