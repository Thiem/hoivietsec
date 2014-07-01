<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/FaqsClass.php");
$use1 = new Class_ConnectDatabase();

$faq = new Class_FaqsClass();
$faq->FaqId = $_REQUEST['id'];
$faq->DelFaq();
header("location: FaqsList.php");