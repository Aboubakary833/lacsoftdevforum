<?php

$search = $_GET['q'];
$user_id = $_GET['user_id'];
require_once "../../model/DataBase.class.php";
$db = new DataBase('forum', 'root', '');
$commentNumPrep = 'SELECT * FROM comments WHERE post_ID=?';
$prepare = 'SELECT * FROM posts INNER JOIN users ON authorID=userID WHERE category=? OR username=? OR image=? OR text=?';
$execute = [$search, $search, $search, $search];
$req = $db->prep_request($prepare, $execute);

if($req->rowCount() == 0) {
    ?>
    
        <div id="htmlPost">
            <h1>Aucune publication pour le terme "<?=$search;?>"</h1>
        </div>
    <?php
} else {

     while ($posts = $req->fetch()) {
                ?>
                <div class="post">
                    <div class="postheader">
                        <div class="user"><img src="../src/images/<?= $posts['avatar']; ?>" alt="<?= $posts['firstname']. ' ' .$posts['lastname'] ;?>"> <span>&nbsp;&nbsp;<?= $posts['username']; ?></span></div>
                        <div class="date"><?= $posts['date']; ?></div>
                    </div>
                    <div class="postcontent">
                        <h1><?= $posts['text'];?></h1>
                        <?php
                        if($posts['image'] != 'none') {
                            ?>
                            <div>
                              <img src="../src/images/<?= $posts['image']; ?>" alt="">
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="like_comment">
                        <div>
                                <span><?= $posts['likes']; ?> j'aime</span>
                                <?php 
                                $commentNumExec = [$posts['IDPost']];
                                $commentNumReq = $db->prep_request($commentNumPrep, $commentNumExec);

                                if($commentNumReq->rowCount() > 1) {
                                    ?>
                                <span><?= $commentNumReq->rowCount(); ?> commentaires</span>
                                    <?php
                                } else {
                                    ?>
                                    <span><?= $commentNumReq->rowCount(); ?> commentaire</span>
                                    <?php
                                }
                               ?>
                        </div>
                        <div>
                            <span>
                                <i id="<?=$posts['IDPost'];?>" class="far fa-thumbs-up likeIcon"></i>
                                <span>J'aime</span>
                            </span>
                            <a href="commentaireField.php?user_id=<?=$user_id?>&post_id=<?=$posts['IDPost'];?>">
                                <i class="far fa-comment"></i>
                                <span>Commentaires</span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
     }
}

?>