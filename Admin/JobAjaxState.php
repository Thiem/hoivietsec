<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/JobClass.php");

$use1 = new Class_ConnectDatabase();
$use2 = new Class_JobClass();
$use2->jobId = $_REQUEST['id'];
$use2->jobStatus = $_REQUEST['ne_state'];
$use2->UpdateState();

if($use2->jobStatus == 1){
    echo '<a onclick="state('.$use2->jobId.',1)"><img src="Image/circle_green.png"/>';
}else{
    echo '<a onclick="state('.$use2->jobId.',0)"><img src="Image/circle_red.png"/>';
}

