<?php 

class DataBase {
    protected $dbname;
    protected $username;
    protected $password;
    protected $bridge;
    public function __construct($dbname, $username, $password) {
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        $pdo_exc = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        );
        try {
            $this->bridge = new PDO('mysql:host=localhost;dbname='. $this->dbname, $this->username, $this->password, $pdo_exc);
        } catch (PDOException $err) {
            die('ERROR: '. $err -> getMessage());
        }
    }

    public function getData($toSelect, $table, $condition = null, $limit = null) {
        if(isset($condition) && isset($limit)) {
            return $this->bridge->query('SELECT '. $toSelect .' FROM '. $table .' WHERE '. $condition .'LIMIT '. $limit);
        } else if(isset($condition) && !isset($limit)) {
            return $this->bridge->query('SELECT '. $toSelect .' FROM '. $table .' WHERE '. $condition);
        } else if(!isset($condition) && isset($limit)) {
            return $this->bridge->query('SELECT '. $toSelect .' FROM '. $table .' LIMIT '. $limit);
        } else {return $this->bridge->query('SELECT '. $toSelect .' FROM '. $table);}
    }

    public function setData($toInsert, $table, $columns, $condition = null) {
        if(isset($condition)) {
            $req = $this->bridge->prepare('INSERT INTO '. $table .'('. $columns .') VALUES('. implode(',', array_fill(0, count($toInsert), '?')) .') WHERE '. $condition);
            $req->execute($toInsert);
        } else {
            $req = $this->bridge->prepare('INSERT INTO '. $table .'('. $columns .') VALUES('. implode(',', array_fill(0, count($toInsert), '?')) .')');
            $req->execute($toInsert);
        }
    }

    public function checkData($username, $password, $table) {
        return $this->getData('*', $table, 'username='. $username .'AND password='. $password);
    }
}

?>