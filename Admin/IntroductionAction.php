<?php include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/IntroductionClass.php");
$use1 = new Class_ConnectDatabase();
$intro = new Class_IntroductionClass();
if ($_REQUEST['status'] == 1) {
$intro->introStatus = 1;
} else {
    $intro->introStatus = 0;
}
$intro->introText= $_REQUEST['content'];
$intro->editIntroduction();
header("location: Introduction.php");
?>