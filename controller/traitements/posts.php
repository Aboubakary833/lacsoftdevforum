<?php

require_once "../../model/DataBase.class.php";

$db = new DataBase('forum', 'root', '');
$postSql = 'SELECT * FROM posts INNER JOIN users ON authorID=userID ORDER BY date DESC';
$commentNumPrep = 'SELECT * FROM comments WHERE post_ID=?';
$req = $db->queryData($postSql);
?>

    <main>

        <div class="postField">
                <?php
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
        
        ?>
            
        </div>
        <div id="categories">
            <h1>Des discussion sur: </h1>
            <div>
                <a href="../../controller/traitements/category.php?cat=htmlcss" id="htmlCssPosts">
                    <img src="../src/fonts/html.png" alt="Logo HTML5">
                    <img src="../src/fonts/css.png" alt="Logo CSS3">
                    <span>HTML & CSS</span>
                </a>
            </div>
            <div>
                <a href="../../controller/traitements/category.php?cat=jsnode" id="jsNodePosts">
                    <img src="../src/fonts/javascript.png" alt="Logo JavaScript">
                    <img src="../src/fonts/node.png" alt="Logo NodeJS">
                    <span>JavaScript</span>
                </a>
            </div>
            <div>
                <a href="../../controller/traitements/category.php?cat=phpmysql" id="phpMysqlPosts">
                    <img src="../src/fonts/php.png" alt="Logo PHP">
                    <img src="../src/fonts/database.png" alt="Logo SQL database">
                    <span>PHP & MySQL</span>
                </a>
            </div>
        </div>

    </main>

    <script src="../src/scripts/accueil.js" type="text/javascript"></script>
</body>
</html>