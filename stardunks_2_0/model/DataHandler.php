<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 22-2-2019
 * Time: 11:32
 */

class DataHandler{
    private $host;
    private $dbdriver;
    private $dbname;
    private $username;
    private $password;

    public function __construct($host, $dbdriver, $dbname, $username, $password)
    {
        $this->host = $host;
        $this->dbdriver = $dbdriver;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;

        try {
            $this->dbh = new PDO("$this->dbdriver:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            echo "Connection with ".$this->dbdriver." failed: ".$e->getMessage();
        }
    }

    public function __destruct()
    {
        $this->dbh = null;
    }

    public function createData($sql){
        $this->query($sql);
        return $this->lastInsertId();
    }

    public function readData($sql){
        $this->query($sql);
        return $this->sth->fetch(PDO::FETCH_ASSOC);
    }

    public function readsData($sql){
        // $this->query($sql);
        return $this->dbh->query($sql,PDO::FETCH_ASSOC);
    }

    public function updateData($sql){
        $this->query($sql);
        return $this->rowCount();
    }

    public function deleteData($sql){
        $this->query($sql);
        return $this->rowCount();
    }

    public function countpages($sql){
        $item_per_page = 4;
        $results = $this->dbh->query($sql);
        $get_total_rows = $results->fetch();
        $pages = ceil($get_total_rows[0]/$item_per_page);
        return $pages;
    }




}