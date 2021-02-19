<?php
require_once "model/DataBase.class.php";
$db = new DataBase('forum', 'root', '');
$users = $db->queryData('SELECT * FROM users');
$res = $users->rowCount();
if(isset($_COOKIE['lacsoftdevforum_user_id'])) {
header('Location: controller/posts.php');
} else if ($res > 0) {
    header('Location: vue/public');
} else {
    header('Location: vue/public/enregistrement.php');
}

?>