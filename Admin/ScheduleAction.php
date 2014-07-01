<?php include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/ScheduleClass.php");
$use1 = new Class_ConnectDatabase();

$schedule = new Class_ScheduleClass();
$schedule->ScheduleStatus = $_REQUEST['status'];
$schedule->ScheduleText= $_REQUEST['content'];
$schedule->editSchedule();
header("location: Schedule.php");
