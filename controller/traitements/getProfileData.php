<?php

require_once "../../model/DataBase.class.php";
$db = new DataBase('forum', 'root', '');

$userID = $_GET['id'];
$req = $db->prep_request('SELECT * FROM users WHERE userID=?', [$userID]);
$data = $req->fetch();
echo $data['username'] . ',' . $data['email'] . ',' . $data['avatar'];
?>