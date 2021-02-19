    <?php
    require_once "../model/DataBase.class.php";
    require_once "../vue/public/adminPage.php";
    
    $db = new DataBase('forum', 'root','');
    $getUsers = $db->queryData('SELECT * FROM users');
    $getPosts = $db->queryData('SELECT * FROM posts');
    $comments = $db->queryData('SELECT * FROM comments');
?>
    <div id="userData">
        
    </div>
    
  </body>
</html>