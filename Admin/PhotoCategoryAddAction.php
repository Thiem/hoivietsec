<?php include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/PhotoCategoryClass.php");
$use1 = new Class_ConnectDatabase();
$val =  $_REQUEST['data'];
if($_FILES['image']['name']!= null){
    move_uploaded_file($_FILES['image']['tmp_name'], "Image/PhotoCategory/".$_FILES['image']['name']);
//    $today =  getdate();
//    $name1 = "Image/PhotoCategory/".$_FILES['image']['name'];
//    $name2 = $today[0].rand(0,99999999);
//    rename("$name1", "Image/PhotoCategory/$name2.jpg");
    $photoCat->photoCategoryAvatar = $_FILES['image']['name'];
} else {
    $photoCat->photoCategoryAvatar = "";
}
$photoCat = new Class_PhotoCategoryClass();
$photoCat->photoCategoryId = $_REQUEST['id'];
$photoCat->photoCategoryTitle = $val['PhotoCat']['name'];
$photoCat->photoCategoryNumber = $val['PhotoCat']['number'];
$photoCat->photoCategoryStatus = $val['PhotoCat']['status'];

$photoCat->addPhotoCategory();
header("location: PhotoCategory.php");
