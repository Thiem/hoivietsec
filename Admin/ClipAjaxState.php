<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/ClassTableClip.php");

$use1 = new Class_ConnectDatabase();
$use2 = new Class_ClassTableClip();
$use2->id = $_REQUEST['id'];
$use2->state = $_REQUEST['cl_state'];
$use2->UpdateState();
if($use2->state == 1){
    echo '<a onclick="state('.$use2->id.',1)"><img src="Image/circle_green.png"/>';
}else{
    echo '<a onclick="state('.$use2->id.',0)"><img src="Image/circle_red.png"/>';
}