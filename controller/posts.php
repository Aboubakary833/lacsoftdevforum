<?php
$user_id = $_GET['azenht4us'];

require_once "../model/DataBase.class.php";
require_once "../vue/public/accueil.php";

$db = new DataBase('forum', 'root', '');
$postSql = 'SELECT * FROM posts INNER JOIN users ON authorID=userID ORDER BY date DESC';
$req = $db->queryData($postSql);
?>

    <main>

        <div class="postField">
                <?php
               while ($posts = $req->fetch()) {
                ?>
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

                        </div>
                        <div>
                            <a href="#">
                                <i class="far fa-thumbs-up"></i>
                                <span>J'aime</span>
                            </a>
                            <a href="commentaire.php?user_id=<?=$user_id?>&post_id=<?=$posts['IDPost'];?>">
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
                <a href="#">
                    <img src="../vue/src/fonts/html.png" alt="Logo HTML5">
                    <img src="../vue/src/fonts/css.png" alt="Logo CSS3">
                    <span>HTML & CSS</span>
                </a>
            </div>
            <div>
                <a href="#">
                    <img src="../vue/src/fonts/javascript.png" alt="Logo JavaScript">
                    <img src="../vue/src/fonts/node.png" alt="Logo NodeJS">
                    <span>JavaScript</span>
                </a>
            </div>
            <div>
                <a href="#">
                    <img src="../vue/src/fonts/php.png" alt="Logo PHP">
                    <img src="../vue/src/fonts/database.png" alt="Logo SQL database">
                    <span>PHP & MySQL</span>
                </a>
            </div>
        </div>

    </main>

    <script src="../vue/src/scripts/accueil.js" type="text/javascript"></script>
</body>
</html>