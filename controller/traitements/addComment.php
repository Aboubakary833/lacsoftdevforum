<?php
require_once "../../model/DataBase.class.php";
$user_id = $_POST['userID'];
$post_id = $_POST['postID'];
$content = $_POST['content'];
$day = date('d');
$month = date('m');
$year = date('Y');
$hours = date('H');
$minutes = date('i');
$secondes = date('s');
$date = $year .'-'. $month .'-'. $day .' '.$hours.':'.$minutes.':'.$secondes;
$db = new DataBase('forum', 'root', '');
$prepareInsertion = "INSERT INTO comments(IDComment, content, post_ID, IDAuthor, date) VALUES(?, ?, ?, ?, ?)";
$executeInsertion = array('', $content, $post_id, $user_id, $date);
$req = $db->prep_request($prepareInsertion, $executeInsertion);

$userReq = 'SELECT username FROM users WHERE userID=' . $user_id;
$userRes = $db->queryData($userReq);
$user = $userRes->fetch();

$postReq = 'SELECT category, authorID FROM posts WHERE IDPost=' . $post_id;
$postRes = $db->queryData($postReq);
$postData  = $postRes->fetch();
$category = $postData['category'];
$remittee = $postData['authorID'];

$notifContent = $user['username'] . ' a commenté votre publication sur ' . $category;

$notifInsertPrep = 'INSERT INTO notifications(IDNotification, notifContent, remittee, idPost) VALUES(?, ?, ?, ?)';
$notifInsertExec = ['', $notifContent, $remittee, $_POST['postID']];
$db->prep_request($notifInsertPrep, $notifInsertExec);

if($req) {
    header('Location: ../../vue/public/commentaireField.php?user_id='.$user_id.'&post_id='.$post_id);
}
?>