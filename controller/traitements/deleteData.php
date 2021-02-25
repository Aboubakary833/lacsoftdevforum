<?php

require_once "../classes/Admin.class.php";
$delete = new Admin;

if($_GET['user']) {
    $delete->deleteUser($_GET['user']);
} else if($_GET['post']) {
    $delete->deletePost($_GET['post']);
} else if($_GET['comment']) {
    $delete->deleteComment($_GET['comment']);
}

 header('Location: ../../vue/public/adminPanel.php?user_id=1');

?>