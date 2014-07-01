<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/GroupListClass.php");
$use1 = new Class_ConnectDatabase();

$groupList = new Class_GroupListClass();
$groupList->groupListId = $_REQUEST['id'];
$groupList->delGroupList();
header("location: GroupList.php");