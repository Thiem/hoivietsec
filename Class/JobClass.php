<?php
/**
 * Created by PhpStorm.
 * User: Thanh@401
 * Date: 6/13/14
 * Time: 9:54 AM
 */
class Class_JobClass
{
    public $jobId;
    public $jobName;
    public $jobNumber;
    public $jobStatus;
    public $search;
    public $page;
    public $start;
    public $display;

    public function addJob()
    {
        $sql = "insert into job (job_name, job_number, job_status) value ('" . $this->jobName . "', '" . $this->jobNumber . "', '" . $this->jobStatus . "')";
        $query = mysql_query($sql);
    }

    public function listJob()
    {
        if ($this->search != "") {
            $sql = "select 	job_id, job_name, job_number, job_status from job where job_name LIKE '%" . $this->search . "%' order by job_number asc";
        } else {
            $sql = "select 	job_id, job_name, job_number, job_status from job order by job_number asc limit ".$this->start.",".$this->display."";
        }
        $query = mysql_query($sql);
        $select = array();
        while ($row = mysql_fetch_object($query)) {
            $select[] = $row;
        }
        if (count($select) > 0) {
            return $select;
        } else {
            return null;
        }

    }

    public function CountRows()
    {
        if ($this->search != "") {
            $sql = "select count(job_id) from job where job_name LIKE '%" . $this->search . "%'";
        } else {
            $sql = "select count(job_id) from job";
        }
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query, MYSQL_NUM);
        return $row[0];
    }

    public function UpdateState()
    {
        $sql = "update job set job_status = '" . $this->jobStatus . "' where job_id = " . $this->jobId;
        $query = mysql_query($sql);
    }

    public function delJob()
    {
        $sql = "delete from job  where job_id = " . $this->jobId;
        $query = mysql_query($sql);
    }

    public function editGroupList()
    {
        $sql = "update job set job_name = '" . $this->jobName . "', job_number = '" . $this->jobNumber . "', job_status = '" . $this->jobStatus . "' where job_id = " . $this->jobId;
        $query = mysql_query($sql);
    }
    public function oneJob()
    {
        $sql = "select job_name, job_number, job_id, job_status from job where job_id = " . $this->jobId;
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query);
        return $row;
    }

    public function getJob(){
        $sql = "select job_name, job_id from job where  job_status = 1";
        $query = mysql_query($sql);
        $select = array();
        while ($row = mysql_fetch_object($query)) {
            $select[] = $row;
        }
        if (count($select) > 0) {
            return $select;
        } else {
            return null;
        }
    }

}
