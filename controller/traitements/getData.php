<?php

require_once "../../controller/classes/Admin.class.php";
$users = Admin::getAllUsers();
$posts = Admin::getAllPosts();
$comments = Admin::getAllComments();
?>

<div class="panel">
        <div class="panelHead">
            <div class="users active" clickable="true">Utilisateurs</div>
            <div class="posts">Publications</div>
            <div class="comments">Commentaires</div>
        </div>
        <div class="panelList">
        <div class="usersData show">
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Nom d'utilisateur</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    while ($user = $users->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                    <tr>
                        <td><?=$user['lastname'];?></td>
                        <td><?=$user['firstname'];?></td>
                        <td><?=$user['username'];?></td>
                        <td><?=$user['email'];?></td>
                        <td><?=$user['role'];?></td>
                        <?php 
                        if ($user['userID'] != 1) {
                            ?>
                            <td><a href="../../controller/traitements/deleteData.php?user=<?=$user['userID'];?>" class="del">Supprimer</a></td>
                            <?php
                        }
                        ?>
                        
                    </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="postsData">
            <table>
                <thead>
                    <tr>
                        <th>Catégorie</th>
                        <th>Texte</th>
                        <th>Auteur</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($post = $posts->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                        <td><?=$post['category'];?></td>
                        <td><?=$post['text'];?></td>
                        <td><?=$post['authorID'];?></td>
                        <td><?=$post['date'];?></td>
                        <td><a href="../../controller/traitements/deleteData.php?post=<?=$post['IDPost'];?>" class="del">Supprimer</a></td>
                    </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="commentsData">
            <table>
                <thead>
                    <tr>
                        <th>ID du post</th>
                        <th>Texte</th>
                        <th>Auteur</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    while ($comment = $comments->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                    <tr>
                        <td><?=$comment['post_ID'];?></td>
                        <td><?=$comment['content'];?></td>
                        <td><?=$comment['IDAuthor'];?></td>
                        <td><?=$comment['date'];?></td>
                        <td><a href="../../controller/traitements/deleteData.php?comment=<?=$comment['IDComment'];?>" class="del">Supprimer</a></td>
                    </tr>
                        <?php
                    }
                    
                    ?>
                    
                </tbody>
                </table>
        </div>
        </div>
    </div>