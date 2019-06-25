<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 14.05.2019
 * Time: 15:32
 */

class Controller
{
    /*const DB_CONNECTION_DB = 'testDB';
    const DB_CONNECTION_USER = 'root';
    const DB_CONNECTION_PASS = '';*/
const host = '127.0.0.1';
const db   = 'Aquapark';
const user = 'root';
const pass = '';
const charset = 'utf8';

public $dsn = "mysql:host=host;dbname=db;charset=charset";
const opt = [
PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES   => false,];

    public $pdo;

    /**
     * Controller constructor.
     * @param $dbh
     */
    public function __construct()
    {
//        $this->pdo = new PDO('mysql:host=localhost;dbname=' . DB_CONNECTION_DB, DB_CONNECTION_USER, DB_CONNECTION_PASS);
        $this->pdo = new PDO($this->dsn, user, pass);
    }

    public function insertInDB()
    {

    }

    public function edit()
    {

    }

    public function delete($table, $name_param, $value_param)
    {
        //        $query="DELETE FROM $table WHERE $name_param='$value_param'";
        $query = 'DELETE FROM $table ';
        $sth = $this->dbh->query($query);
    }

    public function select()
    {

    }
}