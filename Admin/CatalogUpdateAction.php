<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/ClassTableCatalog.php");
$use1 = new Class_ConnectDatabase();
$use2 = new Class_ClassTableCatalog();
$use2->id = $_REQUEST['id'];
$use2->name = $_REQUEST['name'];
$use2->catalogID = $_REQUEST['catalogID'];
$use2->Update();
header("Location: Catalog.php");