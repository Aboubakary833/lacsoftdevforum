<?php

require_once "../../model/DataBase.class.php";

class Authentification {
    protected $username = null;
    protected $password = null;
    protected $signupData;
    protected $db;

    public function __construct($userData){
        $this->setData($userData);
    }

    public function setData(array $data) {
        $this->db = new DataBase('forum', 'root', '');
        if(count($data) == 8) {
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
        if($req->rowCount() != 1) {
            return "L'un ou les deux champs sont incorrects!";
            die();
        }
        $prepare = "SELECT userID FROM users WHERE username=?";
        $execute = array($this->username);
        $req = $this->db->prep_request($prepare, $execute);
        $res = $req->fetch();
        return 'accueil.php?azenht4us='.$res['userID'];
    }

    public function userExist($firstname, $lastname, $username) {
        $prepareChecking = 'SELECT * FROM users WHERE firstname=? AND lastname=? AND username=?';
        $alreayExist = $this->db->prep_request($prepareChecking, [$firstname, $lastname, $username]);
        $res = $alreayExist->rowCount();
        if ($res) {
            echo "Ce compte existe déjà!";
            die();
        }
    }

    public function extractData($data) {
        if($data[5] != $data[6]) {
            echo "Confirmation mots de passe incorrect!";
            die();
        } else if($data[3] != $data[4]) {
            echo "Confirmation email incorrect!";
            die();
        }
        $firstname = isset($data[0]) ? $data[0] : null;
        $lastname = isset($data[1]) ? $data[1] : null;
        $username = isset($data[2]) ? $data[2] : null;
        $email = isset($data[3]) ? $data[3] : null;
        $password = isset($data[5]) ? sha1($data[5]) : null;
        $role = isset($data[7]) ? $data[7] : null;
        $avatar = "default-avatar.png";
        return [$firstname, $lastname, $username, $email, $password, $role, $avatar];
    }

    public function signup() {
        $data_extracted = $this->extractData($this->signupData);
        $this->userExist($data_extracted[0], $data_extracted[1], $data_extracted[2]);
        if(is_array($data_extracted)) {
            $prepare = "INSERT INTO users (firstname, lastname, username, email, password, role, avatar) VALUES(?, ?, ?, ?, ?, ?, ?)";
            $req = $this->db->prep_request($prepare, $data_extracted);
            if($req && $data_extracted[6] == "admin") {
                setcookie('lacsoftdevforum_user_id', $this->signupData[0], time() + (365 * 3) * 24*3600, null, 'http://localhost/lacsoftdevforum', false, true);
            }
        }
    }
}

?>