<?php

require_once "../classes/Posts.class.php";
$post = new Post;
$likes = $post->liked($_GET['user_id']);
foreach ($likes as $value) {
    echo $value .",";
}
?>