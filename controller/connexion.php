<?php
require_once "../model/DataBase.class.php";

$db = new DataBase('forum', 'root', '');
$tab = ['Karim', 'Cissé', 'kc', 1234, 'none', 8965, 15,44];
$admin = $db->setData($tab, 'admin', 'firstname, lastname, username, password, image, cryptedID, totalPosts, totalComments');
?>