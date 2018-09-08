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
    public function addFaculty($name){

        $getredundant = "SELECT * FROM faculty WHERE fname='$name' LIMIT 1";
        $res = $this->db->select($getredundant);

        if($res!=false){
            $msg = "<span class='alert alert-danger'>Faculty already exist!</span>";
            return $msg;
        }
        else{
            $query = "insert into faculty(fname) VALUES('$name')";
            $result = $this->db->insert($query);
            if($res) {
                $msg = "<span class='alert alert-danger'>Successfully added!</span>";
                return $msg;
            }
        }
    }


    public function getFaculties(){
        $query = "SELECT * from faculty";
        $result = $this->db->select($query);
        return $result;

    }

    public function getOneFaculty($name){
        $query = "SELECT * from faculty where fname='$name'";
        $result = $this->db->select($query);
        return $result;

    }



}

?>