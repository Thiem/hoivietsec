<?php
/**
 * Created by PhpStorm.
 * User: Thanh@401
 * Date: 6/13/14
 * Time: 9:54 AM
 */
class Class_GroupListClass
{
    public $groupListId;
    public $groupListName;
    public $groupListNumber;
    public $groupListStatus;
    public $search;
    public $page;
    public $start;
    public $display;

    public function addGroupList()
    {
        $sql = "insert into `group` (`group_name`, `group_number`, `group_status`) value ('" . $this->groupListName . "', '" . $this->groupListNumber . "', '" . $this->groupListStatus . "')";
        $query = mysql_query($sql);
    }

    public function listGroup()
    { // Hiển thị danh sach cac chi hoi
        if ($this->search != "") {
            $sql = "select 	`group_id`, `group_name`, `group_number`, `group_status` from `group` where `group_name` LIKE '%" . $this->search . "%' order by `group_id` desc";
        } else {
            $sql = "select 	`group_id`, `group_name`, `group_number`, `group_status` from `group` order by `group_id` desc limit " . $this->start . "," . $this->display . "";
        }
        $query = mysql_query($sql);
//        echo $sql;
//        die;
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
            $sql = "select count(group_id) from `group` where `group_name` LIKE '%" . $this->search . "%'";
        } else {
            $sql = "select count(group_id) from `group`";
        }
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query, MYSQL_NUM);
        return $row[0];
    }

    public function UpdateState()
    {
        $sql = "update `group` set `group_status` = '" . $this->groupListStatus . "' where `group_id` = " . $this->groupListId;
        $query = mysql_query($sql);
    }

    public function delGroupList()
    {
        $sql = "delete from `group`  where `group_id` = " . $this->groupListId;
        $query = mysql_query($sql);
    }

    public function editGroupList()
    {
        $sql = "update `group` set `group_name` = '" . $this->groupListName . "', `group_number` = '" . $this->groupListNumber . "', `group_status` = '" . $this->groupListStatus . "' where `group_id` = " . $this->groupListId;
        $query = mysql_query($sql);
//        echo $sql;
//        die;
    }

    public function oneGroupList()
    {
        $sql = "select `group_name`, `group_number`, `group_id`, `group_status` from `group` where `group_id` = " . $this->groupListId;
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query);
        return $row;
    }

    public function nameGroup()
    {
        $sql = "select `group_name`, `group_id`  from `group` order by `group_number` asc";
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
