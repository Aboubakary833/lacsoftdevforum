<?php 

class DataBase {
    protected $dbname;
    protected $username;
    protected $password;
    public function __construct($dbname, $username, $password) {
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    public function bridge() {
        $pdo_exc = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        try {
            return new PDO('mysql:host=localhost;dbname='. $this->dbname, $this->username, $this->password, $pdo_exc);
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
            $this->bridge->prepare('INSERT INTO '. $table .'('. $columns .') VALUES('. implode(',', array_fill(0, count($toInsert), '?')) .') WHERE '. $condition);
            $this->bridge->execute($toInsert);
        } else {
            $this->bridge->prepare('INSERT INTO '. $table .'('. $columns .') VALUES('. implode(',', array_fill(0, count($toInsert), '?')) .')');
            $this->bridge->execute($toInsert);
        }
    }

    public function checkData($username, $password, $table) {
        return $this->getData('*', $table, 'username='. $username .'AND password='. $password);
    }
}

?>