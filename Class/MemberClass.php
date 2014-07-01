<?php
/**
 * Created by PhpStorm.
 * User: Thanh@401
 * Date: 6/15/14
 * Time: 4:11 PM
 */
class Class_MemberClass
{
    public $memberId;
    public $memberFirstName;
    public $memberLastName;
    public $memberBirthDay;
    public $memberCompetence;
    public $memberGender;
    public $memberEmail;
    public $memberOffice;
    public $memberOfficePhone;
    public $memberOfficeAddress;
    public $memberHomePhone;
    public $memberHomeAddress;
    public $memberCellPhone;
    public $memberJobId;
    public $memberYearStart;
    public $memberYearFinish;
    public $memberLocal;
    public $memberCity;
    public $memberSpecialty;
    public $memberGroupId;
    public $memberInformation;
    public $memberCard;
    public $memberImg;
    public $memberNumber;
    public $memberStatus;
    public $memberAssociation;
    public $memberAssociationNumber;
    public $search;
    public $page;
    public $start;
    public $display;

    public function getMember()
    {
        $sql = "select * from member where mem_id=" . $this->memberId;
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query);
        return $row;
    }

    public function editMember()
    {
        $sql = "update  member
        set mem_first_name = '" . $this->memberFirstName . "', mem_last_name = '" . $this->memberLastName . "', mem_birthday = '" . $this->memberBirthDay . "', mem_competence = '" . $this->memberCompetence . "', mem_gender = '" . $this->memberGender . "', mem_email = '" . $this->memberEmail . "', mem_office = '" . $this->memberOffice . "', mem_office_address = '" . $this->memberOfficeAddress . "', mem_office_phone = '" . $this->memberOfficePhone . "', mem_home_address = '" . $this->memberHomeAddress . "', mem_home_phone = '" . $this->memberHomePhone . "', mem_cell_phone = '" . $this->memberCellPhone . "', job_id = '" . $this->memberJobId . "', mem_year_start = '" . $this->memberYearStart . "', mem_year_finish = '" . $this->memberYearFinish . "', mem_local = '" . $this->memberLocal . "', mem_city = '" . $this->memberCity . "', mem_specialty = '" . $this->memberSpecialty . "', group_id = '" . $this->memberGroupId . "', mem_information = '" . $this->memberInformation . "', mem_card = '" . $this->memberCard . "', mem_img = '" . $this->memberImg . "', mem_number = '" . $this->memberNumber . "', mem_status = '" . $this->memberStatus . "', mem_association = '" . $this->memberAssociation . "', mem_association_number = '" . $this->memberAssociationNumber . "'";
        $query = mysql_query($sql);
    }
    public function CountRows()
    {
        if ($this->search != "") {
            $sql = "select count(mem_id) from member where mem_last_name  LIKE '%" . $this->search . "%'";
        } else {
            $sql = "select count(mem_id) from member";
        }
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query, MYSQL_NUM);
        return $row[0];
    }

    public function getAllMember(){
        $sql = "select mem_competence, mem_last_name,mem_first_name, mem_home_address, mem_id, mem_status from member";
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
    public function UpdateState()
    {
        $sql = "update member set mem_status = '" . $this->memberStatus . "' where mem_id = " . $this->memberId;
        $query = mysql_query($sql);
    }
    public function delMember()
    {
        $sql = "delete from member  where mem_id = " . $this->memberId;
        $query = mysql_query($sql);
    }
    


}