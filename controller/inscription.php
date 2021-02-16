<?php

require_once "Authentification.class.php";

$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$password = sha1(htmlspecialchars($_POST['password']));
$confirmPassword = sha1(htmlspecialchars($_POST['passwordConfirm']));
$role = htmlspecialchars($_POST['role']);

while($password != $confirmPassword) {
    echo 'Vous avez entrer deux mots de passe différents!';
    die();
}

$data = [
    "",
    $firstname,
    $lastname,
    $username,
    $email,
    $password,
    $role
];

$db = new DataBase('forum', 'root', '');

$prepareChecking = 'SELECT * FROM users WHERE firstname=? AND lastname=? AND username=? AND email=?';
$alreayExist = $db->prep_request($prepareChecking, [$data[1], $data[2], $data[3], $data[4]]);
if ($alreayExist->rowCount() == 1) {
    echo "Ce compte existe déja!";
}else {
    $inscription = new Authentification($data);

    $req = $inscription->signup();

    if($role == "admin") {
    setcookie('lacsoftdevforum_user_id', $data[0], time() + (365 * 3) * 24*3600, null, 'http://localhost/lacsoftdevforum', false, true);
}
}


?>