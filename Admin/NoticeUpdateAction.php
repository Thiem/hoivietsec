<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/ClassTableNotice.php");

$use1 = new Class_ConnectDatabase();
$use2 = new Class_ClassTableNotice();
$file = $_FILES['image'];
$tenFile = $file['name'];
if ($tenFile != "") {
    move_uploaded_file($file['tmp_name'], "Image/" . $tenFile);
}
$use2->image = $tenFile;
$del = $_REQUEST['delFile'];
$nameImage = $_REQUEST['nameImage'];
if($del == 1 && isset($_REQUEST['nameImage']) != null){
    unlink("Image/".$nameImage);
}
$use2->id = $_REQUEST['id'];
$use2->title = $_REQUEST['title'];
$use2->author = $_REQUEST['author'];
$use2->date = $_REQUEST['datepicker'];
$use2->description = $_REQUEST['description'];
$use2->content = $_REQUEST['content'];
$array = $_REQUEST['state'];
$dem = count($array);
if($dem == 1){
    $use2->state = 0;
}else{
    $use2->state =1;
}
$array2 = $_REQUEST['focus'];
$dem2 = count($array2);
if($dem2 == 1){
    $use2->focus = 0;
}else{
    $use2->focus = 1;
}
$use2->Update();
header("Location: Notice.php");