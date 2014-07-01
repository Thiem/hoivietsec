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
        $select = array();
        $row = mysql_fetch_array($query);
        $select[] = $row;
        if (count($select)>0) {
            return $row;
        } else {
            return null;
        }
    }

    public function editMember()
    {
        $sql = "update  member
        set mem_first_name = '" . $this->memberFirstName . "', mem_last_name = '" . $this->memberLastName . "', mem_birthday = '" . $this->memberBirthDay . "', mem_competence = '" . $this->memberCompetence . "', mem_gender = '" . $this->memberGender . "', mem_email = '" . $this->memberEmail . "', mem_office = '" . $this->memberOffice . "', mem_office_address = '" . $this->memberOfficeAddress . "', mem_office_phone = '" . $this->memberOfficePhone . "', mem_home_address = '" . $this->memberHomeAddress . "', mem_home_phone = '" . $this->memberHomePhone . "', mem_cell_phone = '" . $this->memberCellPhone . "', job_id = '" . $this->memberJobId . "', mem_year_start = '" . $this->memberYearStart . "', mem_year_finish = '" . $this->memberYearFinish . "', mem_local = '" . $this->memberLocal . "', mem_city = '" . $this->memberCity . "', mem_specialty = '" . $this->memberSpecialty . "', group_id = '" . $this->memberGroupId . "', mem_information = '" . $this->memberInformation . "', mem_card = '" . $this->memberCard . "', mem_img = '" . $this->memberImg . "', mem_number = '" . $this->memberNumber . "', mem_status = '" . $this->memberStatus . "', mem_association = '" . $this->memberAssociation . "', mem_association_number = '" . $this->memberAssociationNumber . "' where mem_id =" . $this->memberId;
//        echo $sql; die;
        $query = mysql_query($sql);
    }
    public function addMember()
    {
      $sql = "insert into member
      (mem_first_name, mem_last_name, mem_birthday, mem_competence, mem_gender, mem_email, mem_office_address, mem_office_phone, mem_office, mem_home_address, mem_home_phone, mem_cell_phone, job_id, mem_year_start, mem_year_finish, mem_local, mem_city, mem_specialty, group_id, mem_information, mem_card, mem_img) value
      ('" . $this->memberFirstName . "', '" . $this->memberLastName . "', '" . $this->memberBirthDay . "', '" . $this->memberCompetence . "', '" . $this->memberGender . "', '" . $this->memberEmail . "', '" . $this->memberOfficeAddress . "', '" . $this->memberOfficePhone . "', '" . $this->memberOffice . "', '" . $this->memberHomeAddress . "', '" . $this->memberHomePhone . "', '" . $this->memberCellPhone . "', '" . $this->memberJobId . "', '" . $this->memberYearStart . "', '" . $this->memberYearFinish . "', '" . $this->memberLocal . "', '" . $this->memberCity . "', '" . $this->memberSpecialty . "', '" . $this->memberGroupId . "', '" . $this->memberInformation . "', '" . $this->memberCard . "', '" . $this->memberImg . "')";
//        echo $sql;
//        die;
        $query = mysql_query($sql);
    }


    public function CountRows()
    {
        if ($this->search != "") {
            $sql = "select count(mem_id)  from member where 1=1";
            if ($this->search != null) {
                $sql .= " and mem_last_name like '%" . $this->search . "%'";
            }
            if ($this->memberGender != 2) {
                $sql .= " and mem_gender = '" . $this->memberGender . "'";
            }
            if ($this->memberGroupId != 0) {
                $sql .= " and group_id = '" . $this->memberGroupId . "'";
            }
            if ($this->memberYearStart != 0) {
                $sql .= " and mem_year_start = '" . $this->memberYearStart . "'";
            }

        } else {
            $sql = "select count(mem_id) from member";
        }
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query, MYSQL_NUM);
        return $row[0];
    }

    public function CountRowsAssociation()
    {
        if ($this->search != "") {
            $sql = "select count(mem_id)  from member where  (mem_last_name  LIKE '%" . $this->search . "%' or mem_first_name   LIKE '%" . $this->search . "%') and mem_association = 1";
        } else {
            $sql = "select count(mem_id) from member where mem_association = 1";
        }
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query, MYSQL_NUM);
        return $row[0];
    }

    public function getAllMember()
    {
        if ($this->search != "" || $this->memberGender != 0 || $this->memberGroupId != 0 || $this->memberYearStart != 0) {
            $sql = "select mem_competence, concat_ws(' ', mem_first_name, mem_last_name) as fullname, mem_home_address, mem_id, mem_status, mem_email, mem_number from member where 1 = 1";
            if ($this->search != "") {
                $sql .= " and mem_last_name like '%" . $this->search . "%'";
            }
            if ($this->memberGender != 0) {
                $sql .= " and mem_gender = '" . $this->memberGender . "'";
            }
            if ($this->memberGroupId != 0) {
                $sql .= " and group_id = '" . $this->memberGroupId . "'";
            }
            if ($this->memberYearStart != 0) {
                $sql .= " and mem_year_start = '" . $this->memberYearStart . "'";
            }
            $sql .= " order by mem_number asc limit " . $this->start . "," . $this->display;

        } else {
            $sql = "select mem_competence, concat_ws(' ', mem_first_name, mem_last_name) as fullname, mem_home_address, mem_id, mem_status, mem_email, mem_number from member order by mem_number asc limit " . $this->start . "," . $this->display;
        }
//        echo $sql;
//        die;
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
    public function showAllMember()
    {
        if ($this->search != "" || $this->memberGender != 0 || $this->memberGroupId != 0 || $this->memberYearStart != 0) {
            $sql = "select mem_competence, concat_ws(' ', mem_first_name, mem_last_name) as fullname, mem_home_address, mem_id, mem_status, mem_email from member where 1 = 1 and mem_status = 1";
            if ($this->search != null) {
                $sql .= " and mem_last_name like '%" . $this->search . "%'";
            }
            if ($this->memberGender != 0) {
                $sql .= " and mem_gender = '" . $this->memberGender . "'";
            }
            if ($this->memberGroupId != 0) {
                $sql .= " and group_id = '" . $this->memberGroupId . "'";
            }
            if ($this->memberYearStart != 0) {
                $sql .= " and mem_year_start = '" . $this->memberYearStart . "'";
            }
            $sql .= " order by mem_number asc limit " . $this->start . "," . $this->display;

        } else {
            $sql = "select mem_competence, concat_ws(' ', mem_first_name, mem_last_name) as fullname, mem_home_address, mem_id, mem_status, mem_email from member where mem_status = 1 order by mem_number asc limit " . $this->start . "," . $this->display;
        }
//        echo $sql;
//        die;
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

    public function getAllAssociation()
    {
        if ($this->search != "" || $this->memberGender != 0 || $this->memberGroupId != 0 || $this->memberYearStart != 0) {
            $sql = "select mem_competence, concat_ws(' ', mem_first_name, mem_last_name) as fullname, mem_home_address, mem_id, mem_status, mem_email, mem_association_number from member where mem_association = 1";
            if ($this->search != "") {
                $sql .= " and mem_last_name like '%" . $this->search . "%'";
            }
            if ($this->memberGender != 0) {
                $sql .= " and mem_gender = '" . $this->memberGender . "'";
            }
            if ($this->memberGroupId != 0) {
                $sql .= " and group_id = '" . $this->memberGroupId . "'";
            }
            if ($this->memberYearStart != 0) {
                $sql .= " and mem_year_start = '" . $this->memberYearStart . "'";
            }
            $sql .= " order by mem_association_number asc limit " . $this->start . "," . $this->display;

        } else {
            $sql = "select mem_competence, concat_ws(' ', mem_first_name, mem_last_name) as fullname, mem_home_address, mem_id, mem_status, mem_email, mem_association_number from member where mem_association = 1 order by mem_association_number asc limit " . $this->start . "," . $this->display;
        }
//        echo $sql;
//        die;
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
    public function showAllAssociation()
    {
        if ($this->search != "" || $this->memberGender != 0 || $this->memberGroupId != 0 || $this->memberYearStart != 0) {
            $sql = "select mem_competence, concat_ws(' ', mem_first_name, mem_last_name) as fullname, mem_home_address, mem_id, mem_status, mem_email, mem_association_number from member where mem_association = 1 and mem_status = 1";
            if ($this->search != "") {
                $sql .= " and mem_last_name like '%" . $this->search . "%'";
            }
            if ($this->memberGender != 0) {
                $sql .= " and mem_gender = '" . $this->memberGender . "'";
            }
            if ($this->memberGroupId != 0) {
                $sql .= " and group_id = '" . $this->memberGroupId . "'";
            }
            if ($this->memberYearStart != 0) {
                $sql .= " and mem_year_start = '" . $this->memberYearStart . "'";
            }
            $sql .= " order by mem_association_number asc limit " . $this->start . "," . $this->display;

        } else {
            $sql = "select mem_competence, concat_ws(' ', mem_first_name, mem_last_name) as fullname, mem_home_address, mem_id, mem_status, mem_email, mem_association_number from member where mem_association = 1 and mem_status = 1 order by mem_association_number asc limit " . $this->start . "," . $this->display;
        }
//        echo $sql;
//        die;
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