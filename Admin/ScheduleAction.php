<?php include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/ScheduleClass.php");
$use1 = new Class_ConnectDatabase();

$schedule = new Class_ScheduleClass();
if ($_REQUEST['status'] == 1) {
    $schedule->ScheduleStatus= 1;
} else {
    $schedule->ScheduleStatus= 0;
}
$schedule->ScheduleText= $_REQUEST['content'];
$schedule->editSchedule();
header("location: Schedule.php");
