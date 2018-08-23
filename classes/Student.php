<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php

class Student
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function registerStudent($data){
        $university =  mysqli_real_escape_string($this->db->link,$data['university']);
        $company=  mysqli_real_escape_string($this->db->link,$data['company']);
        $faculty =  mysqli_real_escape_string($this->db->link,$data['faculty']);
        $name =  mysqli_real_escape_string($this->db->link,$data['fullname']);
        $studentid =  mysqli_real_escape_string($this->db->link,$data['studentid']);
        $address =  mysqli_real_escape_string($this->db->link,$data['address']);
        $email =  mysqli_real_escape_string($this->db->link,$data['email']);
        $password =  mysqli_real_escape_string($this->db->link,md5($data['password']));
        $cpassword =  mysqli_real_escape_string($this->db->link,md5($data['cpassword']));

        if($university=="" || $company=="" || $name=="" || $studentid=="" || $faculty=="" || $address=="" || $email=="" || $password=="" || $cpassword==""){
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
            $query = "INSERT INTO users(name,university,faculty,studentid,company,address,email,password)
                      VALUES(
                          '$name',
                          '$university',
                          '$faculty',
                          '$studentid',
                          '$company',
                          '$address',
                          '$email',
                          '$password'
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