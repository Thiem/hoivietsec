<?php include_once("Class/ClassConnectDatabase.php");
include_once("Class/PhotoCategoryClass.php");
$use1 = new Class_ConnectDatabase();
$val =  $_REQUEST['data'];
//echo "<pre>";
//print_r($val);
//die;
//if($_FILES['image']['name']!==null){
//    move_uploaded_file($_FILES['image']['tmp_name'], "Image/PhotoCategory/".$_FILES['image']['name']);
//}
$photoCat = new Class_PhotoCategoryClass();
$photoCat->photoCategoryId = $_REQUEST['id'];

$photoCat->photoCategoryTitle = $val['PhotoCat']['name'];
$photoCat->photoCategoryNumber = $val['PhotoCat']['number'];
$photoCat->photoCategoryStatus = $val['PhotoCat']['status'];
$oldImage = $val['PhotoCat']['oldImage'];
if (isset($val['PhotoCat']['Image']) && ($_FILES['image']['name']!=null)){

    $nameImage = "Image/PhotoCategory/".$oldImage;
   unlink($nameImage);
    move_uploaded_file($_FILES['image']['tmp_name'], "Image/PhotoCategory/".$_FILES['image']['name']);
    $photoCat->photoCategoryAvatar = $_FILES['image']['name'];
} else {
    $photoCat->photoCategoryAvatar = $oldImage;
}
$photoCat->editPhotoCategory();
header("location: PhotoCategory.php");