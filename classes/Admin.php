<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
include_once ($filepath.'/../lib/Session.php');
Session::checkLogin();
?>
<?php

class Admin
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    //Admin Login function
    public function login($adminUsername,$adminPassword){
        $username = $this->fm->validation($adminUsername);
        $password = $this->fm->validation($adminPassword);

        $username = mysqli_real_escape_string($this->db->link,$username);
        $password = mysqli_real_escape_string($this->db->link,$password);

        //Check and validate admin login details
        if(empty($adminUsername) || empty($adminPassword)){
            $message = "Username or Password is Empty!!";
            return $message;
        }else{
            $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
            $result= $this->db->select($query);
            if($result != false){
                $value = $result->fetch_assoc();
                Session::set("adminLogin",true);
                Session::set("admin_id",$value['admin_id']);
                Session::set("username",$value['username']);
                Session::set("admin_name",$value['admin_name']);
                Session::set("photo",$value['photo']);
                header("Location:admin.php");
            }else{
                $message = "Username or Password is invalid!!";
                return $message;
            }
        }
    }
}