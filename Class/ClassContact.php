<?php
/**
 * Created by PhpStorm.
 * User: Thanh@401
 * Date: 6/13/14
 * Time: 9:54 AM
 */
class Class_ContactClass
{
    public $contactId;
    public $contactName;
    public $contactPhone;
    public $contactAddress;
    public $contactContent;
    public $contactImage;
    public $search;
    public $page;
    public $start;
    public $display;

    public function addContact(){
        $sql = "insert into contact (contact_fullname, contact_phone, contact_address, contact_content, contact_img) value ('".$this->contactName."', '".$this->contactPhone."', '".$this->contactAddress."', '".$this->contactContent."', '".$this->contactImage."')";
        $query = mysql_query($sql);
    }

    public function listFaqs(){ // Hiển thị contact trong phàn admin
        if ($this->search != "") {
            $sql = "select faq_content, faq_answer, faq_date, faq_status, faq_id from faq where faq_content LIKE '%" . $this->search . "%' order by faq_id desc";
        } else {
            $sql = "select faq_content, faq_answer, faq_date, faq_status, faq_id from faq order by faq_id desc limit $this->start,$this->display";
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
    public function CountRows()
    {
        if ($this->search != "") {
            $sql = "select count(faq_id) from faq where faq_content LIKE '%" . $this->search . "%'";
        } else {
            $sql = "select count(faq_id) from faq";
        }
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query, MYSQL_NUM);
        return $row[0];
    }
    public function UpdateState()
    {
        $sql = "update faq set faq_status = '" . $this->FaqStatus . "' where faq_id = " . $this->FaqId;
        $query = mysql_query($sql);
    }

    public function DelFaq()
    {
        $sql = "delete from faq  where faq_id = " . $this->FaqId;
        $query = mysql_query($sql);
    }

}
