<?php include_once("Class/ClassConnectDatabase.php");
include_once("Class/MemberClass.php");
$use1 = new Class_ConnectDatabase();
$val =  $_REQUEST['data'];

//echo $_FILES['image']['name'];
//echo "<pre>";
//print_r($val);
//die;
$member = new Class_MemberClass();
move_uploaded_file($_FILES['image']['tmp_name'], "Image/Member/" . $_FILES['image']['name']);
$member->memberImg = $_FILES['image']['name'];
$member->memberFirstName = $val['Member']['hotendem'];
$member->memberLastName = $val['Member']['ten'];
$member->memberBirthDay = $val['Member']['namsinh'];
$member->memberCompetence = $val['Member']['chucvu'];
$member->memberGender = $val['Member']['gioitinh'];
$member->memberEmail = $val['Member']['email'];
$member->memberOffice = $val['Member']['coquancongtac'];
$member->memberOfficePhone = $val['Member']['dienthoaicoquan'];
$member->memberOfficeAddress = $val['Member']['diachicoquan'];
$member->memberHomePhone = $val['Member']['dienthoainha'];
$member->memberHomeAddress = $val['Member']['diachi'];
$member->memberCellPhone = $val['Member']['didong'];
$member->memberJobId = $val['Member']['job_id'];
$member->memberYearStart = $val['Member']['tunam']['year'];
$member->memberYearFinish = $val['Member']['dennam']['year'];
$member->memberLocal = $val['Member']['taicoquan'];
$member->memberCity = $val['Member']['thanhpho'];
$member->memberSpecialty = $val['Member']['chuyennganh'];
$member->memberInformation = $val['Member']['thongtinthem'];
$member->memberCard = $val['Member']['thehoivien'];
$member->memberGroupId = $val['Member']['group_id'];
$member->addMember();
header("location: Member.php");