<?php
class Class_ClassTableAdvert
{
    public $id;
    public $name;
    public $link;
    public $date;
    public $image;
    public $state;
    public $numberAdvert;
    public $search;
    public $page;
    public $start;
    public $display;
    public function Create()
    {
        $sql = "insert into tbl_advert(ad_link,ad_name,ad_image,ad_state) values ('".$this->link."','".$this->name."','".$this->image."','".$this->state."')";
        $query = mysql_query($sql);
    }
    public function Update()
    {
        $sql = "update tbl_advert set ad_link = '".$this->link."', ad_name = '".$this->name."',ad_state = '".$this->state."' where ad_id = ".$this->id;
        $query = mysql_query($sql);
    }
    public function UpdateState()
    {
        $sql = "update tbl_advert set ad_state = '" . $this->state . "' where ad_id = " . $this->id;
        $query = mysql_query($sql);
    }
    public function Delete()
    {
        $sql = "delete from tbl_advert where ad_id = ".$this->id;
        $query = mysql_query($sql);
    }
    public function SelectId()
    {
        $sql = "select * from tbl_advert where ad_id =" . $this->id;
        $query = mysql_query($sql);
        $advert = array();
        while ($row = mysql_fetch_object($query)) {
            $advert[] = $row;
        }
        if (count($advert) > 0) {
            return $advert;
        } else {
            return null;
        }

    }
    public function SelectNumberAdvert()
    {
        $sql = "select * from tbl_advert where ad_state = 1 limit 0,".$this->numberAdvert;
        $query = mysql_query($sql);
        $advert = array();
        while ($row = mysql_fetch_object($query)){
            $advert[]= $row;
        }
        if (count($advert) > 0) {
            return $advert;
        } else {
            return null;
        }
    }
    public function CountRows()
    {
        if ($this->search != "") {
            $sql = "select count(ad_id) from tbl_news where ad_name LIKE '%" . $this->search . "%'";
        } else {
            $sql = "select count(ad_id) from tbl_advert";
        }
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query, MYSQL_NUM);
        return $row[0];
    }
    public function SelectAdvert()
    {
        if ($this->search != "") {
            $sql = "select * from tbl_advert where ad_name LIKE '%" . $this->search . "%'";
        } else {
            $sql = "select * from tbl_advert limit $this->start,$this->display";
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