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
        $query = "insert into faculty(fname) VALUES('$name')";
        $result = $this->db->insert($query);
        return true;
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