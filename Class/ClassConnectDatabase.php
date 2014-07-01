<?php
class Class_ConnectDatabase
{
public $localhost;
public $user;
public $pass;
public $nameDb;
public function __construct()
{
$this->getValues();
$sql = mysql_connect($this->localhost, $this->user, $this->pass);
mysql_select_db($this->nameDb,$sql);
}
public function getValues()
{
$this->localhost = 'localhost';
$this->user = 'root';
$this->pass = '';
$this->nameDb = 'hoivietsec';
}
}