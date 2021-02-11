<?php
class Authentification {
    protected $data;
    protected $db;
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
        $image = '';
        $cryptedID = round(random_int(3, 5) * 10 + strlen($username));
        $totalPosts = 0;
        $totalComments = 0;
        
    }
}
?>