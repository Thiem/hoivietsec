<?php
class Class_ClassTableCatalog
{
    public $id;
    public $name;
    public $catalogID;
    public $search;
    public $page;
    public $start;
    public $display;
    public function Create()
    {
        $sql = "insert into tbl_catalog(ca_name,catalogid) values ('".$this->name."','".$this->catalogID."')";
        $query = mysql_query($sql);
    }
    public function Update()
    {
        $sql = "update tbl_catalog set ca_name = '".$this->name."', catalogid = '".$this->catalogID."' where ca_id = ".$this->id;
        $query = mysql_query($sql);
    }
    public function Delete()
    {
        $sql = "delete from tbl_catalog where ca_id = ".$this->id;
        $query = mysql_query($sql);
    }
    public function SelectCatalogName()
    {
        $sql = "select * from tbl_catalog";
        $query = mysql_query($sql);
        $catalog = array();
        while ($row = mysql_fetch_object($query)) {
            $catalog[]= $row;
        }
        if(count($catalog) > 0){
            return $catalog;
        } else{
            return null;
        }
    }
    public function SelectId()
    {
        $sql = "select * from tbl_catalog where ca_id =" . $this->id;
        $query = mysql_query($sql);
        $catalog = array();
        while ($row = mysql_fetch_object($query)) {
            $catalog[] = $row;
        }
        if (count($catalog) > 0) {
            return $catalog;
        } else {
            return null;
        }
    }
    public function CountRows()
    {
        if ($this->search != "") {
            $sql = "select count(ca_id) from tbl_catalog where ca_name LIKE '%" . $this->search . "%'";
        } else {
            $sql = "select count(ca_id) from tbl_catalog";
        }
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query, MYSQL_NUM);
        return $row[0];
    }
    public function SelectCatalog()
    {
        if ($this->search != "") {
            $sql = "select * from tbl_catalog where ca_name LIKE '%" . $this->search . "%'";
        } else {
            $sql = "select * from tbl_catalog limit $this->start,$this->display";
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