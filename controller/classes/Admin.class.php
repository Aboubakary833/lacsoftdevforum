<?php 

require_once "../../model/DataBase.class.php";
$db = new DataBase('forum', 'root', '');

class Admin {
    public static function getAllUsers() {
        global $db;
        $req = $db->queryData('SELECT * FROM users');
        return $req;
    }

    public static function getAllPosts() {
        global $db;
        $req = $db->queryData('SELECT * FROM posts INNER JOIN users ON authorID=userID');
        return $req;
    }

    public static function getAllComments() {
        global $db;
        $req = $db->queryData('SELECT * FROM comments INNER JOIN users ON IDAuthor=userID');
        return $req;
    }

    public static function deleteUser($id) {
        global $db;

        $prepare = 'DELETE FROM users WHERE userID=?';
        $execute = array($id);
        $req = $db->prep_request($prepare, $execute);
        return $req;
    }

    public static function deletePost($id) {
        global $db;

        $prepare = 'DELETE FROM posts WHERE IDPost=?';
        $execute = array($id);
        $req = $db->prep_request($prepare, $execute);
        return $req;
    }

    public static function deleteComment($id) {
        global $db;

        $prepare = 'DELETE FROM comments WHERE IDComment=?';
        $execute = array($id);
        $req = $db->prep_request($prepare, $execute);
        return $req;
    }
}

?>