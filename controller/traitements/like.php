<?php

require_once "../classes/Posts.class.php";
$post = new Post;
if($_POST['type'] == 'like') {
$post->setLike($_POST['postID'], $_POST['authorID']);
//Notification
$db = new DataBase('forum', 'root', '');
$userReq = 'SELECT username FROM users WHERE userID=' . $_POST['authorID'];
$userRes = $db->queryData($userReq);
$user = $userRes->fetch();

$postReq = 'SELECT category, authorID FROM posts WHERE IDPost=' . $_POST['postID'];
$postRes = $db->queryData($postReq);
$postData  = $postRes->fetch();
$category = $postData['category'];
$remittee = $postData['authorID'];

$notifContent = $user['username'] . ' a liké votre publication sur ' . $category;

$notifInsertPrep = 'INSERT INTO notifications(IDNotification, notifContent, remittee, idPost) VALUES(?, ?, ?, ?)';
$notifInsertExec = ['', $notifContent, $remittee, $_POST['postID']];
$db->prep_request($notifInsertPrep, $notifInsertExec);

} else if($_POST['type'] == 'dislike') {
    $post->removeLike($_POST['postID'], $_POST['authorID']);
}
?>