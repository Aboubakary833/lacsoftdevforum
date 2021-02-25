<?php

$userID = $_GET['user_id'];

require_once "../../model/DataBase.class.php";

$db = new DataBase('forum', 'root', '');
$prepare = 'SELECT DISTINCT notifContent, remittee FROM notifications WHERE remittee=? ORDER BY IDNotification DESC LIMIT 0, 8';
$execute = [$userID];
$req = $db->prep_request($prepare, $execute);

if($req->rowCount() > 0) {
    while ($res = $req->fetch()) {
        ?>

        <li><a href="#"><?=$res['notifContent'] ;?></a></li>

        <?php
    }
}


?>