<?php
/**
 * Created by PhpStorm.
 * User: Thanh@401
 * Date: 6/13/14
 * Time: 9:54 AM
 */
class Class_FaqsClass
{
    public $FaqId;
    public $FaqName;
    public $FaqPhone;
    public $FaqEmail;
    public $FaqContent;
    public $FaqAnswer;
    public $FaqDate;
    public $FaqAnswerPeople;
    public $FaqStatus;
    public $search;
    public $page;
    public $start;
    public $display;

    public function addQuestion(){
       $sql = "insert into faq (faq_name, faq_phone, faq_email, faq_content, faq_date, faq_status) value ('".$this->FaqName."', '".$this->FaqPhone."', '".$this->FaqEmail."', '".$this->FaqContent."', '".$this->FaqDate."', '".$this->FaqStatus."')";
        $query = mysql_query($sql);
    }

    public function listFaqs(){ // Hiển thị câu hỏi - cau trả lời trong phàn admin
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

    public function editFaq()
    {
        $sql = "update faq set faq_name = '".$this->FaqName."', faq_phone = '".$this->FaqPhone."', faq_email = '".$this->FaqEmail."', faq_content = '".$this->FaqContent."', faq_answer = '".$this->FaqAnswer."', faq_date = '".$this->FaqDate."', faq_ans_people = '".$this->FaqAnswerPeople."', faq_status = '".$this->FaqStatus."' where faq_id = ".$this->FaqId;
        $query = mysql_query($sql);
    }
    public function OneFaq()
    {
        $sql = "select faq_name, faq_phone, faq_email, faq_content, faq_answer, faq_date, faq_ans_people, faq_status from faq where faq_id = ".$this->FaqId;
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query);
        return $row;
    }

}
