<?php include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/JobClass.php");
$use1 = new Class_ConnectDatabase();
$val =  $_REQUEST['data'];
$job = new Class_JobClass();
$job->jobName = $val['Job']['name'];
$job->jobNumber = $val['Job']['number'];
if ($val['Job']['status'] == 1) {
    $job->jobStatus = 1;
} else {
    $job->jobStatus = 0;
}
$job->addJob();
header("location: Job.php");
