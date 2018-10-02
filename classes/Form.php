<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php

class Form
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
   
    
    
    public function getStudentById($sid){
        $query = "SELECT name,supervisor FROM users WHERE studentId='$sid'";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function getdata($sid){
        $query = "SELECT * FROM evaluation WHERE stdID ='$sid'";
        $result = $this->db->select($query);
        return $result;
    }
    
    


    public function InsertEvaluation($data,$sid){
        $area1 =  mysqli_real_escape_string($this->db->link,$data['area1']);
        $area2 =  mysqli_real_escape_string($this->db->link,$data['area2']);
        $area3 =  mysqli_real_escape_string($this->db->link,$data['area3']);
        $area4 =  mysqli_real_escape_string($this->db->link,$data['area4']);
        $area5 =  mysqli_real_escape_string($this->db->link,$data['area5']);
        $area6 =  mysqli_real_escape_string($this->db->link,$data['area6']);
        $area7 =  mysqli_real_escape_string($this->db->link,$data['area7']);
        $exsup =  mysqli_real_escape_string($this->db->link,$data['name']);
        $date =  mysqli_real_escape_string($this->db->link,$data['date']);

        if($area1=="" || $area2=="" || $area3=="" || $area4=="" || $area5==""){
            $msg = "<span class='alert alert-warning'>Field cannot be Empty!</span>";
            return $msg;
        }

//        $getmail = "SELECT * FROM users WHERE email='$email' LIMIT 1";
//        $res = $this->db->select($getmail);
//
//        if(strcmp($password,$cpassword)!=0){
//            $msg = "<span class='alert alert-danger'>Passwords is does not match!</span>";
//            return $msg;
//        }else if($res!=false){
//            $msg = "<span class='alert alert-danger'>Email already exists!</span>";
//            return $msg;
//        }
        else{
            $query = "INSERT INTO evaluation(stdID,area1,area2,area3,area4,area5,area6,area7,exSuper,date)
                      VALUES(
                            '$sid',
                          '$area1',
                          '$area2',
                          '$area3',
                          '$area4',
                          '$area5',
                          '$area6',
                          '$area7',
                          '$exsup',
                          '$date'                    
                    )";
            
            $result = $this->db->insert($query);
            if($result){
                $msg = "<span class='alert alert-success msg'>Data inserted successfully!</span>";
                return $msg;
            }else{
                $msg = "<span class='alert alert-danger msg'>Cannot insert data</span>";
                return $msg;
            }
        }

    }

    }

 




?>