<?php include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/PhotoGalleryClass.php");
$use1 = new Class_ConnectDatabase();
$val =  $_REQUEST['data'];
if($_FILES['image']['name']!==null){
    move_uploaded_file($_FILES['image']['tmp_name'], "Image/PhotoGallery/".$_FILES['image']['name']);
}
$photoGallery = new Class_PhotoGalleryClass();
$photoGallery->photoGalleryName = $val['PhotoGallery']['name'];
$photoGallery->photoCategoryId = $val['PhotoGallery']['photoCat'];
$photoGallery->photoGalleryNumber = $val['PhotoGallery']['number'];
$photoGallery->photoGalleryStatus = $val['PhotoGallery']['status'];
$photoGallery->photoGalleryImg = $_FILES['image']['name'];
$photoGallery->addPhotoGallery();
header("location: PhotoGalleryAdd.php");
