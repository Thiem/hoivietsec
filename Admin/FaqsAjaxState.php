<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/FaqsClass.php");

$use1 = new Class_ConnectDatabase();
$use2 = new Class_FaqsClass();
$use2->FaqId = $_REQUEST['id'];
$use2->FaqStatus = $_REQUEST['ne_state'];
$use2->UpdateState();

if($use2->FaqStatus == 1){
    echo '<a onclick="state('.$use2->FaqId.',1)"><img src="Image/circle_green.png"/>';
}else{
    echo '<a onclick="state('.$use2->FaqId.',0)"><img src="Image/circle_red.png"/>';
}