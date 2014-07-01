<?php include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/IntroductionClass.php");
$use1 = new Class_ConnectDatabase();

$intro = new Class_IntroductionClass();
$intro->introStatus = $_REQUEST['status'];
$intro->introText= $_REQUEST['content'];
$intro->editIntroduction();
header("location: Introduction.php");
?>