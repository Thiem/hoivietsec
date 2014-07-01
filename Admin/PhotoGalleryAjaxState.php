<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/PhotoGalleryClass.php");

$use1 = new Class_ConnectDatabase();
$use2 = new Class_PhotoGalleryClass();
$use2->photoGalleryId = $_REQUEST['id'];
$use2->photoGalleryStatus = $_REQUEST['ne_state'];
$use2->UpdateState();

if($use2->photoGalleryStatus == 1){
    echo '<a onclick="state('.$use2->photoGalleryId.',1)"><img src="Image/circle_green.png"/>';
}else{
    echo '<a onclick="state('.$use2->photoGalleryId.',0)"><img src="Image/circle_red.png"/>';
}