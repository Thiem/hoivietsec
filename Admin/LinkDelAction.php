<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/ClassTableLink.php");

$use1 = new Class_ConnectDatabase();
$use2 = new Class_ClassTableLink();
$use2->id = $_REQUEST['id'];
$use2->Delete();
header("Location: Link.php");