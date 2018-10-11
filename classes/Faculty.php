<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php

class Faculty
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    //Insert faculty to database
    public function addFaculty($name){

        $getredundant = "SELECT * FROM faculty WHERE fname='$name' LIMIT 1";
        $res = $this->db->select($getredundant);

        if($res!=false){
            $msg = "<script>alert('Faculty already exist!')</script>";
            return $msg;
        }
        else{
            $query = "insert into faculty(fname) VALUES('$name')";
            $result = $this->db->insert($query);
            if($result) {
                $msg = "<script>alert('Successfully added')</script>";
                return $msg;
            }
        }
    }

    //Get faculties from database
    public function getFaculties(){
        $query = "SELECT * from faculty";
        $result = $this->db->select($query);
        return $result;

    }

    //Get one faculty from database
    public function getOneFaculty($name){
        $query = "SELECT * from faculty where fname='$name'";
        $result = $this->db->select($query);
        return $result;

    }

    //Delete faculty
    public function delFaculty($fid){
        $query = "DELETE FROM faculty WHERE fid = '$fid' ";
        $result = $this->db->delete($query);
        if($result){
            $msg = "<script>alert('Successfully deleted')</script>";
                return $msg;
        }else{
            $msg = "<script>alert('Cannot delete')</script>";
                return $msg;
        }
    }



}

?>