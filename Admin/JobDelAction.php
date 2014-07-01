<?php
include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/JobClass.php");
$use1 = new Class_ConnectDatabase();

$job = new Class_JobClass();
$job->jobId = $_REQUEST['id'];
$job->delJob();
header("location: Job.php");