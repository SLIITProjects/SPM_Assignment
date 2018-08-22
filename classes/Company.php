<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php

class Company
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function registerCompany($data){
        $name =  mysqli_real_escape_string($this->db->link,$data['fullname']);
        $address =  mysqli_real_escape_string($this->db->link,$data['address']);
        $email =  mysqli_real_escape_string($this->db->link,$data['email']);
        $password =  mysqli_real_escape_string($this->db->link,md5($data['password']));
        $cpassword =  mysqli_real_escape_string($this->db->link,md5($data['cpassword']));

        if($name=="" || $address=="" || $email=="" || $password=="" || $cpassword==""){
            $msg = "<span class='alert alert-warning'>Field cannot be Empty!</span>";
            return $msg;
        }

        $getmail = "SELECT * FROM company WHERE email='$email' LIMIT 1";
        $res = $this->db->select($getmail);

        if(strcmp($password,$cpassword)!=0){
            $msg = "<span class='alert alert-danger'>Passwords is does not match!</span>";
            return $msg;
        }else if($res!=false){
            $msg = "<span class='alert alert-danger'>Email already exists!</span>";
            return $msg;
        }else{
            $query = "INSERT INTO company(name,address,email,password)
                      VALUES(
                          '$name',
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

    public function getCompanies(){
        $query = "SELECT * from company";
        $result = $this->db->select($query);
        return $result;

    }


}

?>