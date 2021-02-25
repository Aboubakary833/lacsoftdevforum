<?php

require_once "../../model/DataBase.class.php";
$db = new DataBase('forum', 'root', '');

$username = $_POST['username'];
$userID = $_POST['userID'];
$image = $_FILES['image'];
    if(isset($username) && isset($image) && isset($userID)) {
        if($image['error'] === 0) {
            $imgName = $image['tmp_name'];
            $baseName = basename($image['name']);
            $filepath = '../../vue/src/images/' . $baseName;
            if(move_uploaded_file($imgName, $filepath)) {
                $prepare = 'UPDATE users SET username=?, avatar=?';
                $execute = array($username, $baseName);
                $db->prep_request($prepare, $execute);
                header('Location: ../../vue/public/profile.php?user_id='.$userID);
            } else if(isset($username) && isset($userID)) {
                $prepare = 'UPDATE users SET username=? WHERE userID=?';
                $execute = array($username, $userID);
                $db->prep_request($prepare, $execute);
                header('Location: ../../vue/public/profile.php?user_id='.$userID);
            }

        }
    }
?>