<?php
/**
 * Created by PhpStorm.
 * User: Thanh@401
 * Date: 6/13/14
 * Time: 9:54 AM
 */
class Class_PhotoCategoryClass
{
    public $photoCategoryId;
    public $photoCategoryTitle;
    public $photoCategoryAvatar;
    public $photoCategoryNumber;
    public $photoCategoryStatus;
    public $search;
    public $page;
    public $start;
    public $display;

    public function addPhotoCategory()
    {
        $sql = "insert into photo_category (photo_cat_title, photo_cat_number, photo_cat_status, photo_cat_avatar) value ('" . $this->photoCategoryTitle . "', '" . $this->photoCategoryNumber . "', '" . $this->photoCategoryStatus . "', '" . $this->photoCategoryAvatar . "')";
//        echo $sql;
//        die;
        $query = mysql_query($sql);
    }

    public function listPhotoCategory()
    { // Hiển thị danh sach cac danh muc anh
        if ($this->search != "") {
            $sql = "select 	photo_cat_id, photo_cat_title, photo_cat_avatar, photo_cat_number, photo_cat_status from photo_category where photo_cat_title LIKE '%" . $this->search . "%' order by photo_cat_id desc";
        } else {
            $sql = "select 	photo_cat_id, photo_cat_title, photo_cat_avatar, photo_cat_number, photo_cat_status from photo_category order by photo_cat_id desc limit ".$this->start.",".$this->display."";
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
            $sql = "select count(photo_cat_id) from photo_category where photo_cat_title LIKE '%" . $this->search . "%'";
        } else {
            $sql = "select count(photo_cat_id) from photo_category";
        }
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query, MYSQL_NUM);
        return $row[0];
    }

    public function UpdateState()
    {
        $sql = "update photo_category set photo_cat_status = '" . $this->photoCategoryStatus . "' where photo_cat_id = " . $this->photoCategoryId;
        $query = mysql_query($sql);
    }

    public function delPhotoCategory()
    {
        $sql = "delete from photo_category  where photo_cat_id = " . $this->photoCategoryId;
        $query = mysql_query($sql);
    }

    public function editPhotoCategory()
    {
        $sql = "update photo_category set photo_cat_title = '" . $this->photoCategoryTitle . "', photo_cat_number = '" . $this->photoCategoryNumber . "', photo_cat_status = '" . $this->photoCategoryStatus . "', photo_cat_avatar = '" . $this->photoCategoryAvatar . "' where photo_cat_id = " . $this->photoCategoryId;
        $query = mysql_query($sql);

    }
    public function onePhotoCategory()
    {
        $sql = "select photo_cat_title, photo_cat_number, photo_cat_status, photo_cat_avatar from photo_category where 	photo_cat_id = " . $this->photoCategoryId;
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query);
        return $row;
    }

    public function getPhotoCategoryTitle(){
        $sql = "select photo_cat_id, photo_cat_title from photo_category where photo_cat_status = 1 order by photo_cat_number asc";
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
