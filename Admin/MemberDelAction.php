<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/MemberClass.php");
$use1 = new Class_ConnectDatabase();

$member = new Class_MemberClass();
$member->memberId = $_REQUEST['id'];
$member->delMember();
header("location: Member.php");