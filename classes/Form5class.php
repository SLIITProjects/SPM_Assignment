<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php

class User
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
    


    public function InsertEvaluation($data,$sid){
        $area1 =  mysqli_real_escape_string($this->db->link,$data['fullname']);
        $area2 =  mysqli_real_escape_string($this->db->link,$data['address']);
        $area3 =  mysqli_real_escape_string($this->db->link,$data['email']);
        $area4 =  mysqli_real_escape_string($this->db->link,$data['email']);
        $area5 =  mysqli_real_escape_string($this->db->link,$data['email']);
        $area6 =  mysqli_real_escape_string($this->db->link,$data['email']);
        $area7 =  mysqli_real_escape_string($this->db->link,$data['email']);
        $exsup =  mysqli_real_escape_string($this->db->link,$data['email']);
        $date =  mysqli_real_escape_string($this->db->link,$data['email']);

        if($name=="" || $address=="" || $email=="" || $password=="" || $cpassword==""){
            $msg = "<span class='alert alert-warning'>Field cannot be Empty!</span>";
            return $msg;
        }

        $getmail = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $res = $this->db->select($getmail);

        if(strcmp($password,$cpassword)!=0){
            $msg = "<span class='alert alert-danger'>Passwords is does not match!</span>";
            return $msg;
        }else if($res!=false){
            $msg = "<span class='alert alert-danger'>Email already exists!</span>";
            return $msg;
        }else{
            $query = "INSERT INTO users(name,address,email,password,role)
                      VALUES(
                          '$name',
                          '$address',
                          '$email',
                          '$password',
                          'CMP'
                      )";
            $result = $this->db->insert($query);
            if($result){
                $msg = "<span class='alert alert-success msg'>Registered Successfully!</span>";
                return $msg;
            }else{
                $msg = "<span class='alert alert-danger msg'>Cannot Register!</span>";
                return $msg;
            }
        }

    }

    }

 




?>