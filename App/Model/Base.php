<?php

namespace App\Model;

class Base
{
    /**
     * データベースの定義
     */
    const DB_NAME = "menu";
    const HOST_NAME = "localhost";
    const USER = "root";
    const PASS = "";

    protected $dbh;

    /**
     * データベースと接続をする
     */
    public function __construct()
    {
        $dsn = 'mysql:dbname=' . self::DB_NAME . ';host=' . self::HOST_NAME . ';charset=utf8';
        $this->dbh = new \PDO($dsn, self::USER, self::PASS);
        $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}
