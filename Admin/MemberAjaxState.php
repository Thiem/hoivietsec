<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/MemberClass.php");

$use1 = new Class_ConnectDatabase();
$use2 = new Class_MemberClass();
$use2->memberId = $_REQUEST['id'];
$use2->memberStatus = $_REQUEST['ne_state'];
$use2->UpdateState();

if($use2->memberStatus == 1){
    echo '<a onclick="state('.$use2->memberId.',1)"><img src="Image/circle_green.png"/>';
}else{
    echo '<a onclick="state('.$use2->memberId.',0)"><img src="Image/circle_red.png"/>';
}