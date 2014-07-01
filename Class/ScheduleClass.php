<?php
class Class_ScheduleClass
{
    public $ScheduleId;
    public $ScheduleText;
    public $ScheduleStatus;


    public function getSchedule()
    {
        $sql = "select schedule_text, schedule_status from schedule";
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            return $row;
        }
    }

    public function showSchedule()
    {
        $sql = "select schedule_text, schedule_status from schedule where schedule_status = 1";
        $query = mysql_query($sql);
        while($row = mysql_fetch_array($query)){
            return $row;
        }
    }
    public function editSchedule()
    {
        $sql = "update schedule set schedule_text='".$this->ScheduleText."', schedule_status = '".$this->ScheduleStatus."'";
        $query = mysql_query($sql);
    }

}
