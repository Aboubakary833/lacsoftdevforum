<?php
class Authentification {
    protected $data;
    protected $db;
    protected $error;
    public function __construct($data, $db) {
        $this->data = $data;
        $this->db = $db;
        $this->error = null;
    }

    public function login() {
        $username = $this->data['username'];
        $password = $this->data['password'];
        
    }

    public function signin() {
        $firstname = $this->data['firstname'];
        $lastname = $this->data['lastname'];
        $username = $this->data['username'];
        $password = $this->data['password'];

    }

    public function match($type, $dataToCheck) {
        if($type === "login") {
            return $dataToCheck[0] === $dataToCheck[1] && $dataToCheck[2] === $dataToCheck[3];
        } else if($type === "signin") {
            return $dataToCheck[0] === $dataToCheck[1];
        }
    }
}
?>