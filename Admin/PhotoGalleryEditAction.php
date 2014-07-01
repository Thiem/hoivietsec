<?php include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/PhotoGalleryClass.php");
$use1 = new Class_ConnectDatabase();
$val =  $_REQUEST['data'];
$photoGallery = new Class_PhotoGalleryClass();
$photoGallery->photoGalleryId = $_REQUEST['id'];

$photoGallery->photoGalleryName = $val['PhotoGallery']['name'];
$photoGallery->photoCategoryId = $val['PhotoGallery']['group'];
$photoGallery->photoGalleryNumber = $val['PhotoGallery']['number'];
$photoGallery->photoGalleryStatus = $val['PhotoGallery']['status'];
$oldImage = $val['PhotoGallery']['oldImage'];
if (isset($val['PhotoGallery']['Image']) && ($_FILES['image']['name']!=null)){

    $nameImage = "Image/PhotoGallery/".$oldImage;
    unlink($nameImage);
    move_uploaded_file($_FILES['image']['tmp_name'], "Image/PhotoGallery/".$_FILES['image']['name']);
    $photoGallery->photoGalleryImg = $_FILES['image']['name'];
} else {
    $photoGallery->photoGalleryImg = $oldImage;
}
$photoGallery->editPhotoGallery();
header("location: PhotoGallery.php");