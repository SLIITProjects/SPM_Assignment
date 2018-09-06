<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php

class Chart
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getInterns($company,$department){
        $query = "Select count(*) as dcount From users Where company='$company' AND department='$department' AND role='STD'";
        $result = $this->db->select($query);
        $count='';
        if($result){
            while($res = $result->fetch_assoc()) {
                $count= $res['dcount'];
            }
        }
        return $count;

    }

}