<?php
require_once "model/DataBase.class.php";
$db = new DataBase('forum', 'root', '');
$users = $db->queryData('SELECT * FROM users');
$res = $users->fetchAll();
if(isset($_COOKIE['lacsoftdevforum_user_id'])) {
header('Location: controller/post.php');
} else if ($res > 0) {
    header('Location: vue/public/index.php');
} else {
    header('Location: vue/public/enregistrement.php');
}

?>