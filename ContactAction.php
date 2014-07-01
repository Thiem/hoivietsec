<?php include_once("Class/ClassConnectDatabase.php");
include_once("Class/ClassContact.php");
$use1 = new Class_ConnectDatabase();
$val =  $_REQUEST['data'];
$file = $_FILES['data'];
$contact = new Class_ContactClass();
$contact->contactName = $val['Contact']['name'];
$contact->contactPhone = $val['Contact']['mobile'];
$contact->contactAddress = $val['Contact']['address'];
$contact->contactEmail = $val['Contact']['email'];
$contact->contactContent = $val['Contact']['content'];
if ($file['name']['Contact']['attached'] != null) {
    move_uploaded_file($file['tmp_name']['Contact']['attached'],"Image/Contact/" . $file['name']['Contact']['attached']);
    $contact->contactImage = $file['name']['Contact']['attached'];
} else {
    $contact->contactImage = "";
}
$contact->addContact();
header("location: Contact.php");
