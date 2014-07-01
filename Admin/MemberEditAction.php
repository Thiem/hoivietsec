<?php include_once("../Class/ClassConnectDatabase.php");
include_once("../Class/MemberClass.php");
$use1 = new Class_ConnectDatabase();
$val = $_REQUEST['data'];
$member = new Class_MemberClass();
$member->memberId = $_REQUEST['id'];
$oldImage = $val['Member']['anhdaidien2'];
if (isset($val['Member']['anhdaidien1'])) {
    $nameImage = "Image/MemberPhoto/" . $oldImage;
    unlink($nameImage);
    $member->memberImg = "";
}
if (($_FILES['image']['name'] != null)) {
    $member->memberImg = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "Image/MemberPhoto/" . $_FILES['image']['name']);
}

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
if ($val['Member']['status']==1) {
    $member->memberStatus = 1;
} else {
    $member->memberStatus = 0;
}
$member->memberNumber = $val['Member']['number'];
if ($val['Member']['thanhvienchaphanh'] == 1) {
    $member->memberAssociation = 1;
} else {
    $member->memberAssociation = 0;
}

$member->memberAssociationNumber = $val['Member']['sothanhvienbanchaphanh'];

$member->editMember();
header("location: Member.php");

