<?php
include_once("../Class/ClassConnectDatabase.php");
$use1 = new Class_ConnectDatabase();
$table = $_REQUEST['table'];
$table_status = $_REQUEST['table_status'];
$tableid = $_REQUEST['tableid'];
$objectId = $_REQUEST['id'];
$status = $_REQUEST['ne_state'];
$sql = "update `" . $table . "` set `" . $table_status . "` = '" . $status . "' where `" . $tableid . "` = " . $objectId;
//echo $sql;
//die;
$query = mysql_query($sql);
if ($status == 1) {
    echo '<a onclick="state(' . $objectId . ',1)"><img src="Image/circle_green.png"/>';
} else {
    echo '<a onclick="state(' . $objectId . ',0)"><img src="Image/circle_red.png"/>';
}