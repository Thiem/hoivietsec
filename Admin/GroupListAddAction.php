<?php include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/GroupListClass.php");
$use1 = new Class_ConnectDatabase();
$val =  $_REQUEST['data'];
$group = new Class_GroupListClass();
$group->groupListId = $_REQUEST['id'];
$group->groupListName = $val['Group']['name'];
$group->groupListNumber = $val['Group']['number'];
if ($val['Group']['status'] == 1) {
    $group->groupListStatus = 1;
} else {
    $group->groupListStatus = 0;
}
$group->addGroupList();
header("location: GroupList.php");
