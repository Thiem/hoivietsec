<?php include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/GroupListClass.php");
$use1 = new Class_ConnectDatabase();
$val =  $_REQUEST['data'];
$group = new Class_GroupListClass();
$group->groupListId = $_REQUEST['id'];
$group->groupListName = $val['Group']['name'];
$group->groupListNumber = $val['Group']['number'];
$group->groupListStatus = $val['Group']['status'];
$group->editGroupList();
header("location: GroupList.php");
