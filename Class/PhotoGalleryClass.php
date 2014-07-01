<?php
/**
 * Created by PhpStorm.
 * User: Thanh@401
 * Date: 6/13/14
 * Time: 9:54 AM
 */
class Class_PhotoGalleryClass
{
    public $photoGalleryId;
    public $photoGalleryName;
    public $photoCategoryId;
    public $photoGalleryNumber;
    public $photoGalleryStatus;
    public $photoGalleryImg;
//    public $photoCategoryTitle;
//    public $photoCategoryAvatar;
//    public $photoCategoryNumber;
//    public $photoCategoryStatus;
    public $search;
    public $page;
    public $start;
    public $display;

    public function listPhotoGallery()
    { // ket noi 2 bang PhotoCat va Photogallery
        if ($this->search != "") {
            $sql = "select photo_id, photo_name,  photo_gallery.photo_cat_id, photo_number, photo_status, photo_img, photo_cat_title, photo_cat_number, photo_cat_avatar, photo_cat_status
        from  photo_gallery
        inner join photo_category
        on photo_gallery.photo_cat_id = photo_category.photo_cat_id
        where  photo_cat_title LIKE '%" . $this->search . "%'
        order by photo_cat_number asc";
        } else {
            $sql = "select photo_id, photo_name,  photo_gallery.photo_cat_id, photo_number, photo_status, photo_img, photo_cat_title, photo_cat_number, photo_cat_avatar, photo_cat_status
        from  photo_gallery
        inner join photo_category
        on photo_gallery.photo_cat_id = photo_category.photo_cat_id
        order by photo_cat_number asc limit " . $this->start . "," . $this->display;
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

    public function addPhotoGallery()
    {
        $sql = "insert into photo_gallery (photo_name, photo_cat_id, photo_number, photo_status, photo_img) value ('" . $this->photoGalleryName . "', '" . $this->photoCategoryId . "', '" . $this->photoGalleryNumber . "', '" . $this->photoGalleryStatus . "', '" . $this->photoGalleryImg . "')";
        $query = mysql_query($sql);
    }


    public function CountRows()
    {
        if ($this->search != "") {
            $sql = "select photo_id, photo_name,  photo_gallery.photo_cat_id, photo_number, photo_status, photo_img, photo_cat_title, photo_cat_number, photo_cat_avatar, photo_cat_status
        from  photo_gallery
        inner join photo_category
        on photo_gallery.photo_cat_id = photo_category.photo_cat_id
        where photo_cat_title LIKE '%" . $this->search . "%'
        order by photo_cat_number asc";
        } else {
            $sql = "select count(photo_id) from  photo_gallery
        inner join photo_category
        on photo_gallery.photo_cat_id = photo_category.photo_cat_id
        order by photo_cat_number asc";
        }
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query, MYSQL_NUM);
        return $row[0];
    }

    public function UpdateState()
    {
        $sql = "update photo_gallery set photo_status = '" . $this->photoGalleryStatus . "' where photo_id = " . $this->photoGalleryId;
        $query = mysql_query($sql);
    }

    public function delPhotoGallery()
    {
        $sql = "delete from photo_gallery  where photo_id = " . $this->photoGalleryId;
        $query = mysql_query($sql);
    }

    public function editPhotoGallery()
    {
        $sql = "update photo_gallery set photo_name = '" . $this->photoGalleryName . "', photo_cat_id = '" . $this->photoCategoryId . "', photo_number = '" . $this->photoGalleryNumber . "', photo_status = '" . $this->photoGalleryStatus . "', photo_img  = '" . $this->photoGalleryImg . "'  where photo_id = " . $this->photoGalleryId;
        $query = mysql_query($sql);
    }

    public function onePhotoGallery()
    {
//        $sql = "select photo_name, photo_gallery.photo_cat_id, photo_number, photo_status, photo_img, photo_cat_title
//        from photo_gallery inner join photo_category on photo_gallery.photo_cat_id = photo_category.photo_cat_id  where photo_id =" . $this->photoCategoryId;
        $sql = "SELECT photo_name, photo_gallery.photo_cat_id, photo_number, photo_status, photo_img, photo_cat_title
FROM photo_gallery
INNER JOIN photo_category ON photo_gallery.photo_cat_id = photo_category.photo_cat_id
WHERE photo_id =" . $this->photoGalleryId;
        $query = mysql_query($sql);
//        var_dump($query);
        $row = mysql_fetch_array($query);
        return $row;
    }

}
