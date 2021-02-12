<?php

require_once "../model/DataBase.class.php";

class Authentification {
    protected $username = null;
    protected $password = null;
    protected $signupData = null;
    protected $db;

    public function __construct($data) {
        $this->db =  new DataBase('forum', 'root', '');
        if(count($data) == 7) {
            $this->signupData = $data;
        } else {
            $this->username = $data[0];
            $this->password = $data[1];
        }
    }

    public function login() {
        $prepare = 'SELECT * FROM users WHERE username=? AND password=?';
        $execute = array($this->username, $this->password);
        $req = $this->db->prep_request($prepare, $execute);
        $res = $req->fetch();
        if($req->rowCount() == 1) return true;
        else {
            return false;
        }
    }

    public function signup() {
        $prepare = 'SELECT * FROM users WHERE firstname=? AND lastname=? AND username=? AND email=? AND '
    }
}

?>