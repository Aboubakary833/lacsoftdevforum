<?php

require_once "../../model/DataBase.class.php";

class Post {
    protected $db;
    protected $userID;
    protected $postID;
    protected $text;
    protected $img;
    protected $date;
    protected $category;

    public function __construct()
    {
        $this->db = new DataBase('forum', 'root', '');
    }

    public function getPosts() {
        $postSql = 'SELECT * FROM posts INNER JOIN users ON authorID=userID ORDER BY date DESC';
        $req = $this->db->queryData($postSql);
        return $req;
    }

    public function setPost(array $data, $file) {
        $this->userID = $data['userID'];
        $this->text = $data['text'];
        $this->category = isset($data['category']) ? $data['category'] : '';
        isset($file) ? $this->img = $file : 'none';

        $day = date('d');
        $month = date('m');
        $year = date('Y');
        $hours = date('H');
        $minutes = date('i');
        $secondes = date('s');

        $this->date = $year .'-'. $month .'-'. $day .' '.$hours.':'.$minutes.':'.$secondes;
        if ($this->img) {
            $imgTmpName = $this->img['tmp_name'];
            $imgName = basename($this->img['name']);
            $filepath = '../../vue/src/images/'.$imgName;
            move_uploaded_file($imgTmpName, $filepath);
        }
        if($this->text != NULL) {
            $prepare = "INSERT INTO posts(IDPost, category, text, image, authorID, likes, date) VALUES(?,?,?,?,?,?,?)";
            $execute = ['', $this->category, $this->text,$imgName, $this->userID, 0, $this->date];
            $req = $this->db->prep_request($prepare, $execute);
            return true;
        }
    }
    public function setLike($postID, $authorID) {
        $userCanLikePrep = 'SELECT * FROM likes WHERE post_id=? AND author_id=?';
        $userCanLikeExec = [$postID, $authorID];
        $userCanLikeRes = $this->db->prep_request($userCanLikePrep, $userCanLikeExec);
        if ($userCanLikeRes->rowCount() > 0) {
            return false;
        } else {
            $postLikesNumPrep = 'SELECT likes FROM posts WHERE IDPost=?';
            $postLikesNumExec = [$postID];
            $postLikesNumReq = $this->db->prep_request($postLikesNumPrep, $postLikesNumExec);
            $postLikesNumRes = $postLikesNumReq->fetch();
            $postLikeNum = $postLikesNumRes['likes'] + 1;
            $likePrep = 'INSERT INTO likes(IDLike, post_id, author_id) VALUES(?, ?, ?)';
            $likeExec = ['', $postID, $authorID];
            $this->db->prep_request($likePrep, $likeExec);
            $postLikePrep = 'UPDATE posts SET likes=? WHERE IDPost=?';
            $postLikeExec = [$postLikeNum, $postID];
            $this->db->prep_request($postLikePrep, $postLikeExec);
        }
    }
    
    public function removeLike($postID, $authorID) {
        $userCanDisLikePrep = 'SELECT * FROM likes WHERE post_id=? AND author_id=?';
        $userCanDisLikeExec = [$postID, $authorID];
        $userCanDisLikeRes = $this->db->prep_request($userCanDisLikePrep, $userCanDisLikeExec);

        if ($userCanDisLikeRes->rowCount() > 0) {
            $postLikesNumPrep = 'SELECT likes FROM posts WHERE IDPost=?';
            $postLikesNumExec = [$postID];
            $postLikesNumReq = $this->db->prep_request($postLikesNumPrep, $postLikesNumExec);
            $postLikesNumRes = $postLikesNumReq->fetch();
            $postLikeNum = $postLikesNumRes['likes'] - 1;
            $disLikePrep = 'DELETE FROM likes WHERE post_id=? AND author_id=?';
            $disLikeExec = [$postID, $authorID];
            $this->db->prep_request($disLikePrep, $disLikeExec);
            $postDisLikePrep = 'UPDATE posts SET likes=? WHERE IDPost=?';
            $postDisLikeExec = [$postLikeNum, $postID];
            $this->db->prep_request($postDisLikePrep, $postDisLikeExec);
        } else return false;
    }

    public function liked($authorID) {
        $userDidLikePrep = 'SELECT * FROM likes WHERE author_id=?';
        $userDidLikeExec = [$authorID];
        $userDidLikeRes = $this->db->prep_request($userDidLikePrep, $userDidLikeExec);
        $likedPosts = [];
        while ($userLikes = $userDidLikeRes->fetch()) {
            array_push($likedPosts, $userLikes['post_id']);
        }
        
        return $likedPosts;
    }
    
}

?>