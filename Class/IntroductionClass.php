<?php
/**
 * Created by PhpStorm.
 * User: Thanh@401
 * Date: 6/6/14
 * Time: 5:23 PM
 */
class Class_IntroductionClass
{
    public $introId;
    public $introText;
    public $introStatus;

    public function getIntroduction()
    {
        $sql = "select intro_status, intro_text from introduction";
        $query = mysql_query($sql);
        while ($row = mysql_fetch_array($query)) {
            return $row;
        }
    }
    public function editIntroduction()
    {
        $sql = "update introduction set intro_text='".$this->introText."', intro_status = '".$this->introStatus."'";
        $query = mysql_query($sql);
    }
}