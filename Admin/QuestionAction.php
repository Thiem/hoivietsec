<?php include_once("Class/ClassConnectDatabase.php");
include_once("Class/FaqsClass.php");
$use1 = new Class_ConnectDatabase();
$val =  $_REQUEST['data'];
$question = new Class_FaqsClass();
$question->FaqName = $val['Question']['fullname'];
$question->FaqPhone = $val['Question']['phone'];
$question->FaqEmail = $val['Question']['email'];
$question->FaqContent = $val['Question']['content'];
$question->FaqDate = $val['Question']['datetime']['year']."-".$val['Question']['datetime']['month']."-".$val['Question']['datetime']['day'];
$question->addQuestion();
//header("location: Faqs.php");


