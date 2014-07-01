<?php
class Class_ClassTableClip
{
    public $id;
    public $name;
    public $url;
    public $state;
    public $numberClip;
    public $search;
    public $page;
    public $start;
    public $display;
    public function Create()
    {
        $sql = "insert into tbl_clip(cl_name,cl_url,cl_state) values ('".$this->name."','".$this->url."','".$this->state."')";
        $query = mysql_query($sql);
    }
    public function Update()
    {
        $sql = "update tbl_clip set cl_name = '".$this->name."', cl_url = '".$this->url."',cl_state = '".$this->state."' where cl_id = ".$this->id;
        $query = mysql_query($sql);
    }
    public function UpdateState()
    {
        $sql = "update tbl_clip set cl_state = '" . $this->state . "' where cl_id = " . $this->id;
        $query = mysql_query($sql);
    }
    public function Delete()
    {
        $sql = "delete from tbl_clip where cl_id = ".$this->id;
        $query = mysql_query($sql);
    }
    public function SelectNumberClip()
    {
        $sql = "select * from tbl_clip where cl_state = 1 limit 0,".$this->numberClip;
        $query = mysql_query($sql);
        $clip = array();
        while ($row = mysql_fetch_object($query)) {
            $clip[]= $row;
        }
        if(count($clip) > 0){
            return $clip;
        } else{
            return null;
        }
    }
    public function SelectId()
    {
        $sql = "select * from tbl_clip where cl_id =" . $this->id;
        $query = mysql_query($sql);
        $clip = array();
        while ($row = mysql_fetch_object($query)) {
            $clip[] = $row;
        }
        if (count($clip) > 0) {
            return $clip;
        } else {
            return null;
        }
    }
    public function CountRows()
    {
        if ($this->search != "") {
            $sql = "select count(cl_id) from tbl_news where cl_name LIKE '%" . $this->search . "%'";
        } else {
            $sql = "select count(cl_id) from tbl_clip";
        }
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query, MYSQL_NUM);
        return $row[0];
    }
    public function SelectClip()
    {
        if ($this->search != "") {
            $sql = "select * from tbl_clip where cl_name LIKE '%" . $this->search . "%'";
        } else {
            $sql = "select * from tbl_clip limit $this->start,$this->display";
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
}