<?php
/**
 * Created by PhpStorm.
 * User: Thanh@401
 * Date: 6/6/14
 * Time: 5:01 PM
 */
Class Class_ConnectionClass
{
    public $host;
    public $dbUser;
    public $dbName;
    public $dbPass;
    public function __construct()
    {
        $this->host = 'localhost';
        $this->dbUser = 'root';
        $this->dbPass = '';
        $this->dbName = 'hoivietsec';
    }
    public function connectDataBase()
    {
        $link = mysql_connect($this->host, $this->dbUser, $this->dbPass) or die('Error');
        mysql_selectdb($this->dbName);
    }
}