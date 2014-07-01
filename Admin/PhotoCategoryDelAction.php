<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/PhotoCategoryClass.php");
$use1 = new Class_ConnectDatabase();

$photoCategory = new Class_PhotoCategoryClass();
$photoCategory->photoCategoryId = $_REQUEST['id'];
$photoCategory->delPhotoCategory();
header("location: PhotoCategory.php");