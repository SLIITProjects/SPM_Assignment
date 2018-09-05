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
    public function registerStudent($data,$file){
        $university =  mysqli_real_escape_string($this->db->link,$data['university']);
        $company=  mysqli_real_escape_string($this->db->link,$data['company']);
        $faculty =  mysqli_real_escape_string($this->db->link,$data['faculty']);
        $name =  mysqli_real_escape_string($this->db->link,$data['fullname']);
        $studentid =  mysqli_real_escape_string($this->db->link,$data['studentid']);
        $address =  mysqli_real_escape_string($this->db->link,$data['address']);
        $email =  mysqli_real_escape_string($this->db->link,$data['email']);
        $password =  mysqli_real_escape_string($this->db->link,md5($data['password']));
        $cpassword =  mysqli_real_escape_string($this->db->link,md5($data['cpassword']));
        $phone =  mysqli_real_escape_string($this->db->link,$data['contact']);

        $permit = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($university=="" || $company=="" || $name=="" || $studentid=="" || $faculty=="" || $address=="" || $email=="" || $password=="" || $cpassword=="" || $phone==""){
            $msg = "<span class='alert alert-warning'>Field cannot be Empty!</span>";
            return $msg;
        }else {
            if ($file_size > 1048567) {
                $msg = "<span class='alert alert-warning msg'>File size too large!</span>";
                return $msg;
            } elseif (in_array($file_ext, $permit) == false) {
                $msg = "<span class='alert alert-warning msg'>Invalid file type!</span>";
                return $msg;
            } else {
                move_uploaded_file($file_temp,$uploaded_image);

                $getmail = "SELECT * FROM users WHERE email='$email' LIMIT 1";
                $res = $this->db->select($getmail);

                if(strcmp($password,$cpassword)!=0){
                    $msg = "<span class='alert alert-danger'>Passwords is does not match!</span>";
                    return $msg;
                }else if($res!=false){
                    $msg = "<span class='alert alert-danger'>Email already exists!</span>";
                    return $msg;
                }else{
                    $query = "INSERT INTO users(name,university,faculty,studentid,company,address,contact,photo,email,password,role)
                      VALUES(
                          '$name',
                          '$university',
                          '$faculty',
                          '$studentid',
                          '$company',
                          '$address',
                          '$phone',
                          '$uploaded_image',
                          '$email',
                          '$password',
                          'STD'
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


    }

    public function registerCompany($data,$files){
        $name =  mysqli_real_escape_string($this->db->link,$data['fullname']);
        $address =  mysqli_real_escape_string($this->db->link,$data['address']);
        $email =  mysqli_real_escape_string($this->db->link,$data['email']);
        $password =  mysqli_real_escape_string($this->db->link,md5($data['password']));
        $cpassword =  mysqli_real_escape_string($this->db->link,md5($data['cpassword']));

        $permit = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($name=="" || $address=="" || $email=="" || $password=="" || $cpassword==""){
            $msg = "<span class='alert alert-warning'>Field cannot be Empty!</span>";
            return $msg;
        }else {
            if ($file_size > 1048567) {
                $msg = "<span class='alert alert-warning msg'>File size too large!</span>";
                return $msg;
            } elseif (in_array($file_ext, $permit) == false) {
                $msg = "<span class='alert alert-warning msg'>Invalid file type!</span>";
                return $msg;
            } else {
                move_uploaded_file($file_temp,$uploaded_image);

                $getmail = "SELECT * FROM users WHERE email='$email' LIMIT 1";
                $res = $this->db->select($getmail);

                if(strcmp($password,$cpassword)!=0){
                    $msg = "<span class='alert alert-danger'>Passwords is does not match!</span>";
                    return $msg;
                }else if($res!=false){
                    $msg = "<span class='alert alert-danger'>Email already exists!</span>";
                    return $msg;
                }else{
                    $query = "INSERT INTO users(name,address,photo,email,password,role)
                      VALUES(
                          '$name',
                          '$address',
                          '$uploaded_image',
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



    }

    public function getCompanies(){
        $query = "SELECT * from users WHERE role='CMP'";
        $result = $this->db->select($query);
        return $result;

    }

    public function getSupervisors($company,$start_from,$num_of_pages){
        $query = "SELECT * 
        from users 
        WHERE delete_status =0 AND role='SUP' AND company='$company'
        ORDER BY uid DESC LIMIT $start_from,$num_of_pages";
        $result = $this->db->select($query);
        return $result;

    }

    public function getSupervisorsList($company){
        $query = "SELECT * 
        from users 
        WHERE delete_status =0 AND role='SUP' AND company='$company'";
        $result = $this->db->select($query);
        return $result;

    }

    public function allocateSupervisor($data,$stid){
        $sup =  mysqli_real_escape_string($this->db->link,$data['supervisor']);
        $dep =  mysqli_real_escape_string($this->db->link,$data['department']);


        if($sup=="" || $dep ==""){
            $msg = "<span class='alert alert-warning'>Field cannot be Empty!</span>";
            return $msg;
        }else{

            $query="UPDATE users SET supervisor='$sup',department='$dep' WHERE uid='$stid'";

            $result=$this->db->update($query);
            if($result){
                $msg = "<span class='alert alert-success msg'>Allocate Successfully!</span>";
                return $msg;
            }else{
                $msg = "<span class='alert alert-danger msg'>Cannot Allocate!</span>";
                return $msg;
            }
        }

    }

    public function getAllStudents($company,$stdid){
        $query = "SELECT * 
        from users 
        WHERE delete_status =0 AND uid='$stdid' AND role='STD' AND company='$company'";
        $result = $this->db->select($query);
        return $result;
    }

    public function getStudents($company,$start_from,$num_of_pages){
        $query = "SELECT uid,name,studentId,contact,supervisor,university.uname,faculty.fname
        from users 
        INNER JOIN university ON users.university = university.unid
        INNER JOIN faculty ON users.faculty = faculty.fid
        WHERE company='$company' ORDER BY uid DESC LIMIT $start_from,$num_of_pages";
        $result = $this->db->select($query);
        return $result;

    }

    public function registerSupervisor($data,$company,$files){
        $name =  mysqli_real_escape_string($this->db->link,$data['fullname']);
        $address =  mysqli_real_escape_string($this->db->link,$data['address']);
        $contact =  mysqli_real_escape_string($this->db->link,$data['contact']);
        $email =  mysqli_real_escape_string($this->db->link,$data['email']);
        $password =  mysqli_real_escape_string($this->db->link,md5($data['password']));
        $cpassword =  mysqli_real_escape_string($this->db->link,md5($data['cpassword']));
        $department =  mysqli_real_escape_string($this->db->link,md5($data['department']));


        $permit = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($name=="" || $address=="" || $email=="" || $password=="" || $cpassword=="" || $contact=""){
            $msg = "<span class='alert alert-warning'>Field cannot be Empty!</span>";
            return $msg;
        }else {
            if ($file_size > 1048567) {
                $msg = "<span class='alert alert-warning msg'>File size too large!</span>";
                return $msg;
            } elseif (in_array($file_ext, $permit) == false) {
                $msg = "<span class='alert alert-warning msg'>Invalid file type!</span>";
                return $msg;
            } else {
                move_uploaded_file($file_temp, $uploaded_image);
                $getmail = "SELECT * FROM users WHERE email='$email' LIMIT 1";
                $res = $this->db->select($getmail);

                if(strcmp($password,$cpassword)!=0){
                    $msg = "<span class='alert alert-danger'>Passwords is does not match!</span>";
                    return $msg;
                }else if($res!=false){
                    $msg = "<span class='alert alert-danger'>Email already exists!</span>";
                    return $msg;
                }else{
                    $query = "INSERT INTO users(name,department,company,address,contact,photo,email,password,role,status)
                      VALUES(
                          '$name',
                          '$department',
                          '$company',
                          '$address',
                          '$contact',
                          '$uploaded_image',
                          '$email',
                          '$password',
                          'SUP',
                          1
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
    }

    public function delSupervisor($uid){
        $query = "UPDATE users SET delete_status=1 WHERE uid='$uid'";
        $result = $this->db->update($query);
        if($result){
            $msg = "<span class='alert alert-success'>Successfully Deleted!</span>";
            return $msg;
        }else{
            $msg = "<span class='alert alert-danger'>Cannot Delete!</span>";
            return $msg;
        }
    }


}

?>