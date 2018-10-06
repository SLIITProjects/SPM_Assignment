<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php

class Department
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function addDepartment($dname){
        $query = "insert into department(dname) VALUES('$dname')";
        $result = $this->db->insert($query);

        $getredundant = "SELECT * FROM department WHERE dname='$dname' LIMIT 1";
        $res = $this->db->select($getredundant);

        if($res!=false){
            $msg = "<script>alert('Department already exists!')</script>";
            return $msg;
        }
        else{
            $msg = "<script>alert('Successfully added!')</script>";
            return $msg;
        }

    }

    public function getCompanyDepartment($company){
        $query = "SELECT * from departments where company='$company'";
        $result = $this->db->select($query);
        return $result;

    }

}