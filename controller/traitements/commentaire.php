<?php
require_once "../vue/public/commentaireField.php";
require_once "../model/DataBase.class.php";
$userId = $_GET['user_id'];
$postsId = $_GET['post_id'];
$db = new DataBase('forum', 'root', '');
$postPrepare = "SELECT * FROM posts INNER JOIN users ON authorID=userID WHERE IDPost=?";
$postExecute = array($postsId);
$postReq = $db->prep_request($postPrepare, $postExecute);
$posts = $postReq->fetch();
$commentprepare = "SELECT * FROM comments INNER JOIN users ON IDAuthor=userID WHERE post_ID=?";
$commentExecute = array($postsId);
$commentReq = $db->prep_request($commentprepare, $commentExecute);  
?>
        <main>
            <div id="post_comment">
                <div class="post">
                    <div class="postheader">
                        <div class="user"><img src="../vue/src/images/<?= $posts['avatar']; ?>" alt="<?= $posts['firstname']. ' ' .$posts['lastname'] ;?>"> <span>&nbsp;&nbsp;<?= $posts['username']; ?></span></div>
                        <div class="date"><?= $posts['date']; ?></div>
                    </div>
                    <div class="postcontent">
                        <h1><?= $posts['text'];?></h1>
                        <?php
                        if($posts['image'] != 'none') {
                            ?>
                            <div>
                              <img src="../vue/src/images/<?= $posts['image']; ?>" alt="">
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="like_comment">
                        <div>
                                <span><?= $posts['likes']; ?> j'aime</span>
                                <span><?= $posts['likes']; ?> Commentaire(s)</span>

                        </div>
                    </div>
                </div>
                <?php
                while ($comment = $commentReq->fetch()) {
                    ?>
                <div class="comment">
                    <div class="comment_header">
                        <img src="../vue/src/images/<?=$comment['avatar']?>" alt="<?=$comment['username']?>">
                        <span><?=$comment['username'];?></span>
                        <span class="date"><?=$comment['date']?></span>
                    </div>
                    <div class="comment_content">
                        <h2><?=$comment['content'];?></h2>
                    </div>
                </div>
                    <?php
                }
                ?>
            </div>
            <form action="addComment.php" method="post">
                <input type="text" name="userID" class="hidden" value="<?=$userId;?>">
                <input type="text" name="postID" class="hidden" value="<?=$postsId;?>">
                <input type="text" name="content" placeholder="Votre commentaire...">
                <button type="submit"><i class="fa fa-paper-plane"></i></button>
            </form>
        </main>
