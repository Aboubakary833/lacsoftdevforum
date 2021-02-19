<?php
require_once "../classes/Posts.class.php";

if(count($_POST) == 4) {
    $insertion = new Post;
    $req = $insertion->setPost($_POST, $_FILES['image']);
    if($req) header('Location: posts.php');
}
?>