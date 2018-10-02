<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php

class University
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function addUniversity($name){

        $getredundant = "SELECT * FROM university WHERE uname='$name' LIMIT 1";
        $res = $this->db->select($getredundant);

        if($res!=false){
            $msg = "<script>alert('University already exist!')</script>";
            return $msg;
        }
        else{
            $query = "insert into university(uname) VALUES('$name')";
            $result = $this->db->insert($query);
            if($result) {
                $msg = "<script>alert('Successfully added')</script>";
                return $msg;
            }
        }
    }

    public function delUniversity($uid){
        $query = "DELETE FROM university WHERE unid = '$uid' ";
        $result = $this->db->delete($query);
        if($result){
            $msg = "<script>alert('Successfully deleted')</script>";
                return $msg;
        }else{
            $msg = "<script>alert('Cannot delete')</script>";
                return $msg;
        }
    }

    public function getUniversities(){
        $query = "SELECT * from university";
        $result = $this->db->select($query);
        return $result;

    }


}

?>