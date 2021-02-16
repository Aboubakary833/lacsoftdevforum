<?php

require_once "Authentification.class.php";

$username = htmlspecialchars($_POST['username']);
$password = $_POST['password'];
$data = array();
array_push($data, $username, $password);
$connexion = new Authentification($data);
$db = new DataBase('forum', 'root', '');
if($connexion->login()) {
    $prepare = "SELECT userID FROM users WHERE username=?";
    $execute = array($username);
    $req = $db->prep_request($prepare, $execute);
    $res = $req->fetch();
    echo '../../controller/posts.php?azenht4us='. $res['userID'];
} else {
    echo 'L\'un ou les deux champs est incorrect!';
}
?>