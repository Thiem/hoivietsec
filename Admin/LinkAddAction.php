<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/ClassTableLink.php");
$use1 = new Class_ConnectDatabase();
$use2 = new Class_ClassTableLink();
$use2->name = $_REQUEST['name'];
$use2->link = $_REQUEST['link'];
$use2->state = $_REQUEST['state'];
$use2->Create();
header("Location: Link.php");