<?php
class Class_ClassTableView
{
    public $id;
    public $views;
    public function Create()
    {
        $sql = "insert into tbl_view(vi_views) values ('".$this->views."')";
        $query = mysql_query($sql);
    }
    public function Update()
    {
        $sql = "update tbl_view set vi_views = '".$this->views."'";
        $query = mysql_query($sql);
    }
    public function Delete()
    {
        $sql = "delete from tbl_view where no_id = ".$this->id;
        $query = mysql_query($sql);
    }
    public function SelectView()
    {
        $sql = "select * from tbl_view";
        $query = mysql_query($sql);
        $view = array();
        while ($row = mysql_fetch_object($query)) {
            $view[] = $row;
        }
        if (count($view) > 0) {
            return $view;
        } else {
            return null;
        }
    }
}