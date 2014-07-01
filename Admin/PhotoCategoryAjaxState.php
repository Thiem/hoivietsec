<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/PhotoCategoryClass.php");

$use1 = new Class_ConnectDatabase();
$use2 = new Class_PhotoCategoryClass();
$use2->photoCategoryId = $_REQUEST['id'];
$use2->photoCategoryStatus = $_REQUEST['ne_state'];
$use2->UpdateState();

if($use2->photoCategoryStatus == 1){
    echo '<a onclick="state('.$use2->photoCategoryId.',1)"><img src="Image/circle_green.png"/>';
}else{
    echo '<a onclick="state('.$use2->photoCategoryId.',0)"><img src="Image/circle_red.png"/>';
}