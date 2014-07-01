<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/ClassTableClip.php");
$use1 = new Class_ConnectDatabase();
$use2 = new Class_ClassTableClip();
$use2->name = $_REQUEST['name'];
$use2->url = $_REQUEST['url'];
$use2->state = $_REQUEST['state'];
$use2->Create();
header("Location: Clip.php");