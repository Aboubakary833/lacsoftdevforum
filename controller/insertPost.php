<?php
require_once "../model/DataBase.class.php";
$text = isset($_POST['posText']) ? htmlspecialchars($_POST['posText']) : NULL;
$img = $_FILES['image'];
$imgName = $img['name'] || 'none';
$category = isset($_POST['category']) ? $_POST['category'] : 'general';
$userID = 1;
$day = date('d');
$month = date('m');
$year = date('Y');
$hours = date('H');
$minutes = date('i');
$secondes = date('s');
$date = $year .'-'. $month .'-'. $day .' '.$hours.':'.$minutes.':'.$secondes;
$insertion = new DataBase('forum', 'root', '');

if (isset($img) && $img['error'] === 0) {
    $imgName = $img['name'];
    $filepath = $img['tmp_name'];
    if(move_uploaded_file($imgName, $filepath)) {
        echo 'Ca marche!';
    } else {
        echo '<i class="fa fa-exclamation-circle"></i>Erreur avec l\'envoi de l\'image!';
    }
}

if($text != NULL) {
    $prepare = "INSERT INTO posts(IDPost, category, text, image, authorID, likes, date) VALUES(?,?,?,?,?,?,?)";
    $execute = ['', $category, $text,$imgName, $userID, 0, $date];
    $req = $insertion->prep_request($prepare, $execute);
    header('Location: posts.php');
}
?>