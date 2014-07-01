<?php
class Class_ClassTableNotice
{
    public $id;
    public $title;
    public $date;
    public $content;
    public $author;
    public $state;
    public $focus;
    public $description;
    public $image;
    public $numberNotice;
    public $search;
    public $page;
    public $start;
    public $display;
    public function Create()
    {
        $sql = "insert into tbl_notice (no_title,no_date,no_destion,no_content,no_image,no_author,no_state,no_focus) values ('" . $this->title . "','" . $this->date . "','" . $this->description . "','" . $this->content . "','" . $this->image . "','" . $this->author . "','" . $this->state . "','" . $this->focus . "')";
        $query = mysql_query($sql);
    }
    public function Update()
    {
        if($this->image != ""){
        $sql = "update tbl_notice set no_title = '".$this->title."',no_image = '".$this->image."', no_date = '" . $this->date . "', no_destion = '" . $this->description . "', no_content = '" . $this->content . "', no_author = '" . $this->author . "', no_state = '" . $this->state . "', no_focus = '" . $this->focus . "' where no_id = ".$this->id;
        }else{
            $sql = "update tbl_notice set no_title = '".$this->title."', no_date = '" . $this->date . "', no_destion = '" . $this->description . "', no_content = '" . $this->content . "', no_author = '" . $this->author . "', no_state = '" . $this->state . "', no_focus = '" . $this->focus . "' where no_id = ".$this->id;
        }
        $query = mysql_query($sql);
        $notice = array();
        while ($row = mysql_fetch_object($query)) {
            $notice[] = $row;
        }
        if (count($notice) > 0) {
            return $notice;
        } else {
            return null;
        }
    }
    public function UpdateState()
    {
        $sql = "update tbl_notice set no_state = '" . $this->state . "' where no_id = " . $this->id;
        $query = mysql_query($sql);
    }
    public function Delete()
    {
        $sql = "delete from tbl_notice where no_id = ".$this->id;
        $query = mysql_query($sql);
    }
    public function SelectId()
    {
        $sql = "select * from tbl_notice where no_id =" . $this->id;
        $query = mysql_query($sql);
        $notice = array();
        while ($row = mysql_fetch_object($query)) {
            $notice[] = $row;
        }
        if (count($notice) > 0) {
            return $notice;
        } else {
            return null;
        }
    }
    public function SelectNumberNotice()
    {
        if($this->numberNotice == 1){
        $sql = "select * from tbl_notice where no_state = 1 and no_focus = 1 order by no_date DESC limit 0,".$this->numberNotice;
        }else{
        $sql = "select * from tbl_notice where no_state = 1 and no_focus = 0 order by no_date DESC limit 0,".$this->numberNotice;
        }
            $query = mysql_query($sql);
        $notice = array();
        while ($row = mysql_fetch_object($query)) {
            $notice[]= $row;
        }
        if(count($notice) > 0){
            return $notice;
        }else{
            return null;
        }
    }
    public function CountRows()
    {
        if ($this->search != "") {
            $sql = "select count(no_id) from tbl_notice where no_title LIKE '%" . $this->search . "%'";
        } else {
            $sql = "select count(no_id) from tbl_notice";
        }
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query, MYSQL_NUM);
        return $row[0];
    }
    public function SelectNotice()
    {
        if ($this->search != "") {
            $sql = "select * from tbl_notice where no_title LIKE '%" . $this->search . "%'";
        } else {
            $sql = "select * from tbl_notice limit $this->start,$this->display";
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