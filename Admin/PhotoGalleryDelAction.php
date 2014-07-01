<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/PhotoGalleryClass.php");
$use1 = new Class_ConnectDatabase();

$photoGallery = new Class_PhotoGalleryClass();
$photoGallery->photoGalleryId = $_REQUEST['id'];
$photoGallery->delPhotoGallery();
header("location: PhotoGallery.php");