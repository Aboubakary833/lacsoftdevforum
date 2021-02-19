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
        $this->postID = $data['postID'];
        $this->text = $data['content'];
        $this->category = $data['category'];
        isset($file) ? $this->img = $file : 'none';

        $day = date('d');
        $month = date('m');
        $year = date('Y');
        $hours = date('H');
        $minutes = date('i');
        $secondes = date('s');

        $this->date = $year .'-'. $month .'-'. $day .' '.$hours.':'.$minutes.':'.$secondes;
        if ($this->img) {
            $imgName = $this->img['name'];
            $filepath = 'vue/src/images';
            move_uploaded_file($imgName, $filepath);
        }
        if($this->text != NULL) {
            $prepare = "INSERT INTO posts(IDPost, category, text, image, authorID, likes, date) VALUES(?,?,?,?,?,?,?)";
            $execute = ['', $this->category, $this->text,$imgName, $this->userID, 0, $this->date];
            $req = $this->db->prep_request($prepare, $execute);
            return $req;
        }
    }
}

?>