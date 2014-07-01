<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/ClassTableNotice.php");

$use1 = new Class_ConnectDatabase();
$use2 = new Class_ClassTableNotice();
$use2->id = $_REQUEST['id'];
$use2->Delete();
header("Location: Notice.php");