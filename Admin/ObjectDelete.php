<?php
include_once("../Class/ClassConnectDatabase.php");
$use1 = new Class_ConnectDatabase();
$page = $_REQUEST['page'];
$objectId = $_REQUEST['id'];
$tableId = $_REQUEST['table_id'];
$table = $_REQUEST['table'];
$sql = "delete from `".$table."`  where `".$tableId."` = " . $objectId;
//echo $sql;
//die;
$query = mysql_query($sql);
header("location: $page");