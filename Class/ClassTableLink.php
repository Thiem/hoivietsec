<?php
class Class_ClassTableLink
{
    public $id;
    public $name;
    public $link;
    public $state;
    public $click;
    public $search;
    public $page;
    public $start;
    public $display;
    public function Create()
    {
        $sql = "insert into tbl_link(li_name,li_link,li_state) values ('".$this->name."','".$this->link."','".$this->state."')";
        $query = mysql_query($sql);
    }
    public function Update()
    {
        $sql = "update tbl_link set li_name = '".$this->name."', li_link = '".$this->link."', li_state = '".$this->state."' where li_id = ".$this->id;
        $query = mysql_query($sql);
    }
    public function UpdateState()
    {
        $sql = "update tbl_link set li_state = '" . $this->state . "' where li_id = " . $this->id;
        $query = mysql_query($sql);
    }
    public function Delete()
    {
        $sql = "delete from tbl_link where li_id = ".$this->id;
        $query = mysql_query($sql);
    }
    public function SelectNumberLink()
    {
        $sql = "select * from tbl_link where li_state = 1";
        $query = mysql_query($sql);
        $link = array();
        while ($row = mysql_fetch_object($query)) {
            $link[]= $row;
        }
        if(count($link) > 0){
            return $link;
        } else{
            return null;
        }
    }
    public function SelectId()
    {
        $sql = "select * from tbl_link where li_id =" . $this->id;
        $query = mysql_query($sql);
        $link = array();
        while ($row = mysql_fetch_object($query)) {
            $link[] = $row;
        }
        if (count($link) > 0) {
            return $link;
        } else {
            return null;
        }
    }
    public function CountRows()
    {
        if ($this->search != "") {
            $sql = "select count(li_id) from tbl_link where li_name LIKE '%" . $this->search . "%'";
        } else {
            $sql = "select count(li_id) from tbl_link";
        }
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query, MYSQL_NUM);
        return $row[0];
    }
    public function SelectLink()
    {
        if ($this->search != "") {
            $sql = "select * from tbl_link where li_name LIKE '%" . $this->search . "%'";
        } else {
            $sql = "select * from tbl_link limit $this->start,$this->display";
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