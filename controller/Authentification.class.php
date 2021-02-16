<?php

require_once "../model/DataBase.class.php";

class Authentification {
    protected $username = null;
    protected $password = null;
    protected $signupData;
    protected $db;

    public function __construct($data) {
        $this->db = new DataBase('forum', 'root', '');
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
        if($req->rowCount() == 1) return true;
        else {
            return false;
        }
    }

    public function signup() {
            $prepareInsertion = 'INSERT INTO users(userID, firstname, lastname, username, email, password, role) VALUES(?, ?, ?, ?, ?, ?, ?)';
            $executeInsertion = $this->signupData;
            $req = $this->db->prep_request($prepareInsertion, $executeInsertion);
            return $req ? true : false;
    }
}

?>