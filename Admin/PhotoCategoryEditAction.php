<?php include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/PhotoCategoryClass.php");
$use1 = new Class_ConnectDatabase();
$val =  $_REQUEST['data'];
$photoCat = new Class_PhotoCategoryClass();
$photoCat->photoCategoryId = $_REQUEST['id'];

$photoCat->photoCategoryTitle = $val['PhotoCat']['name'];
$photoCat->photoCategoryNumber = $val['PhotoCat']['number'];
if ($val['PhotoCat']['status'] == 1) {
    $photoCat->photoCategoryStatus = 1;
} else {
    $photoCat->photoCategoryStatus = 0;
}
$oldImage = $val['PhotoCat']['oldImage'];
if (isset($val['PhotoCat']['Image'])){
    $nameImage = "Image/PhotoCategory/".$oldImage;
   unlink($nameImage);
    $photoCat->photoCategoryAvatar = "";
}
if ($_FILES['image']['name'] != null){
    $photoCat->photoCategoryAvatar = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "Image/PhotoCategory/".$_FILES['image']['name']);
}
$photoCat->editPhotoCategory();
header("location: PhotoCategory.php");