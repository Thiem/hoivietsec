<?php
class Class_ClassTableNews
{
    public $id;
    public $title;
    public $date;
    public $description;
    public $content;
    public $image;
    public $catalogId;
    public $special;
    public $author;
    public $state;
    public $focus;
    public $numberNews;
    public $search;
    public $page;
    public $start;
    public $display;
    public function Create()
    {
        $sql = "insert into tbl_news(ne_title,ne_date,ne_destion,ne_content,ne_image,catalogid,ne_author,ne_state,ne_focus,ne_special) values ('" . $this->title . "','" . $this->date . "','" . $this->description . "','" . $this->content . "','" . $this->image . "','" . $this->catalogId . "','" . $this->author . "','" . $this->state . "','" . $this->focus . "','" . $this->special . "')";
        $query = mysql_query($sql);
    }

    public function UpdateState()
    {
        $sql = "update tbl_news set ne_state = '" . $this->state . "' where ne_id = " . $this->id;
        $query = mysql_query($sql);
    }

    public function Update()
    {
        if($this->image != ""){
            $sql = "update tbl_news set ne_title = '" . $this->title . "',ne_image = '".$this->image."', ne_date = '" . $this->date . "', ne_destion = '" . $this->description . "', ne_content = '" . $this->content . "', catalogid = '" . $this->catalogId . "', ne_author = '" . $this->author . "', ne_state = '" . $this->state . "', ne_focus = '" . $this->focus . "', ne_special = '" . $this->special . "' where ne_id = " . $this->id;
        }else{
            $sql = "update tbl_news set ne_title = '" . $this->title . "', ne_date = '" . $this->date . "', ne_destion = '" . $this->description . "', ne_content = '" . $this->content . "', catalogid = '" . $this->catalogId . "', ne_author = '" . $this->author . "', ne_state = '" . $this->state . "', ne_focus = '" . $this->focus . "', ne_special = '" . $this->special . "' where ne_id = " . $this->id;
        }
        $query = mysql_query($sql);
    }
    public function Delete()
    {
        $sql = "delete from tbl_news where ne_id = " . $this->id;
        $query = mysql_query($sql);
    }
    public function SelectId()
    {
        $sql = "select * from tbl_news where ne_id =" . $this->id;
        $query = mysql_query($sql);
        $news = array();
        while ($row = mysql_fetch_object($query)) {
            $news[] = $row;
        }
        if (count($news) > 0) {
            return $news;
        } else {
            return null;
        }

    }
    public function CountRows()
    {
        if ($this->search != "") {
            $sql = "select count(ne_id) from tbl_news where ne_title LIKE '%" . $this->search . "%'";
        } else {
            $sql = "select count(ne_id) from tbl_news";
        }
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query, MYSQL_NUM);
        return $row[0];
    }
    public function SelectNewCatalog()
    {
        if($this->numberNews == 1){
            $sql = "select * from tbl_news where ne_state = 1 and ne_focus = 1 and catalogid = '".$this->catalogId."' order by ne_date DESC limit 0,".$this->numberNews;
        }else{
            $sql = "select * from tbl_news where ne_state = 1 and ne_focus = 0 and catalogid = '".$this->catalogId."' order by ne_date DESC limit 0,".$this->numberNews;
        }
        $query = mysql_query($sql);
        $news = array();
        while ($row = mysql_fetch_object($query)) {
            $news[] = $row;
        }
        if (count($news) > 0) {
            return $news;
        } else {
            return null;
        }

    }
    public function SelectNumberNews()
    {
        $sql = "select * from tbl_news where ne_state = 1 and ne_focus = 1 order by ne_date DESC limit 0," . $this->numberNews;
        $query = mysql_query($sql);
        $news = array();
        while ($row = mysql_fetch_object($query)) {
            $news[] = $row;
        }
        if (count($news) > 0) {
            return $news;
        } else {
            return null;
        }
    }
    public function SelectNewsSpecial()
    {
        $sql = "select * from tbl_news where ne_state = 1 and ne_special = 1 limit 0," . $this->numberNews;
        $query = mysql_query($sql);
        $news = array();
        while ($row = mysql_fetch_object($query)) {
            $news[] = $row;
        }
        if (count($news) > 0) {
            return $news;
        } else {
            return null;
        }
    }
    public function SelectTwoTable()
    {
        if ($this->search != "") {
            $sql = "select ne_id,ne_title,ne_date,catalogid,ne_state,ca_name,ca_id from tbl_news inner join tbl_catalog on tbl_news.catalogid = tbl_catalog.ca_id where ne_title LIKE '%" . $this->search . "%' limit $this->start,$this->display ";
        } else {
            $sql = "select ne_id,ne_title,ne_date,catalogid,ne_state,ca_name,ca_id from tbl_news inner join tbl_catalog on tbl_news.catalogid = tbl_catalog.ca_id limit $this->start,$this->display";
        }
        $query = mysql_query($sql);
        $select = array();
        while ($row = mysql_fetch_object($query)) {
            $select[] = $row;
        }

        if (count($select)>0){
            return $select;
        } else {
            return null;
        }
    }
    public function CountEntries()
    {
        if ($this->search != "") {
            $sql = "select * from tbl_news where ne_title LIKE '%" . $this->search . "%'";
        } else {
            $sql = "select * from tbl_news";
        }
        $query = mysql_query($sql);
        $dem = mysql_num_rows($query);
        return $dem;
    }
}