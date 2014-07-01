<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/GroupListClass.php");

$use1 = new Class_ConnectDatabase();
$use2 = new Class_GroupListClass();
$use2->groupListId = $_REQUEST['id'];
$use2->groupListStatus = $_REQUEST['ne_state'];
$use2->UpdateState();

if($use2->groupListStatus == 1){
    echo '<a onclick="state('.$use2->groupListId.',1)"><img src="Image/circle_green.png"/>';
}else{
    echo '<a onclick="state('.$use2->groupListId.',0)"><img src="Image/circle_red.png"/>';
}

