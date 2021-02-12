<?php 

class DataBase {
    protected $db;
    public function __construct (string $dbname, string $username, string $password) {
        $pdo_exc = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        );
        try {
            $this->db = new PDO('mysql:host=localhost;dbname='. $dbname, $username, $password, $pdo_exc);
        } catch (PDOException $e) {
            die('ERROR: '. $e->getMessage());
        }
    }

    public function queryData($sql) {
       return $this->db->query($sql);
    }

    public function prep_request(string $prepare, array $execute) {
        $req = $this->db->prepare($prepare);
        $req->execute($execute);
        return $req;
    }

}

?>