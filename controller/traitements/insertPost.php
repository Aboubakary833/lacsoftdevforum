<?php
require_once "../classes/Posts.class.php";
if(count($_POST) == 2) {
    $insertion = new Post;
    $req = $insertion->setPost($_POST, $_FILES['image']);
    if($req) header('Location: ../../vue/public/accueil.php?azenht4us='.$_POST['userID']);
}
?>