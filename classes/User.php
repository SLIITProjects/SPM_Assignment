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
        $year =  mysqli_real_escape_string($this->db->link,$data['year']);
        $sem =  mysqli_real_escape_string($this->db->link,$data['sem']);

        $permit = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($university=="" || $company=="" || $name=="" || $studentid=="" || $faculty=="" || $address=="" || $email=="" || $password=="" || $cpassword=="" || $phone=="" || $year=="" || $sem==""){
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
                    $query = "INSERT INTO users(name,university,faculty,cyear,csem,studentid,company,address,contact,photo,email,password,role)
                      VALUES(
                          '$name',
                          '$university',
                          '$faculty',
                          '$year',
                          '$sem',
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
        }
        else{

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
        INNER JOIN university ON users.university = university.unid
        INNER JOIN faculty ON users.faculty = faculty.fid
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

        if($name=="" || $address=="" || $email=="" || $password=="" || $cpassword=="" || $contact==""){
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
	
	public function form1Student()
	{
		if(isset($_POST['submitStudent']))
		{
			$sid=$_POST['stdID'];
			$address=$_POST['address'];
			$hphn=$_POST['hphone'];
			$mphn=$_POST['mphone'];
			$email=$_POST['email1'];
			$year=$_POST['year'];
			$sem=$_POST['sem'];
			$cgpa=$_POST['cgpa'];
			$date=date('Y-m-d H:i:s');
			
			/**
				Form Validation
			**/
			$userID=Session::get('uid');
			$sql="SELECT studentId FROM users WHERE uid=$userID";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);

			if(empty($sid)||empty($address)||empty($hphn)||empty($mphn)||empty($email)||empty($cgpa))
			{
				echo"<script>alert('One are more fields are empty')</script>";
			}
			else if($row[0]!=$sid)
			{
				echo"<script>alert('Invalid Student ID')</script>";		
			}
			else if(!preg_match("/^[0-9]{10}$/",$hphn)||!preg_match("/^[0-9]{10}$/",$mphn)||!preg_match("/^[0-3]{1}.[0-99]$/",$cgpa)||!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$email))
			{
				
				if(!preg_match("/^[0-9]{10}$/",$hphn))
				{
					echo"<script>alert('Invalid Home Phone Number')</script>";	
				}
				if(!preg_match("/^[0-9]{10}$/",$mphn))
				{
					echo"<script>alert('Invalid Mobile Phone Number')</script>";	
				}
				if(!preg_match("/^[0-3]{1}.[0-99]$/",$cgpa))
				{
					echo"<script>alert('Invalid CGPA')</script>";	
				}
				if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$email))
				{
					echo"<script>alert('Invalid Email Address')</script>";	
				}
			}
			/**
				Inserting data into DB if data is valid
			**/
			else
			{
				$stdId=Session::get('uid');
				
				$sql="SELECT supervisor FROM users WHERE uid=$stdId";
				$result=mysqli_query($con,$sql);
				$row=mysqli_fetch_array($result);
				$supervisor=$row[0];
				
				$sql="INSERT INTO form1_student_details(stdID, address, homePhn, mobilePhn, email, year, semester, cgpa, requested_date, supervisor) VALUES('$sid', '$address', '$hphn', '$mphn', '$email', '$year', '$sem', '$cgpa', '$date',$supervisor)";
				
				if (!mysqli_query($con,$sql)) 
				{
					die('Error: ' . mysqli_error($con));
				}

				echo"<script>alert('Details sent to supervisor')</script>";	
				mysqli_close($con);
			}
		}
	}
	
	public function form1Supervisor()
	{
		include('DBConnection.php');
		if(isset($_POST['submitSupervisor']))
		{
			$ename=$_POST['ename'];
			$eaddress=$_POST['eaddress'];
			$sname=$_POST['sname'];
			$sphone=$_POST['sphone'];
			$stitle=$_POST['stitle'];
			$semail=$_POST['semail'];
			$sdate=$_POST['sdate']." 00:00:00";
			$edate=$_POST['edate']." 00:00:00";
			$hoursPerWeek=$_POST['hourPerWeek'];
			$taskList=$_POST['tasks'];
			$learnList=$_POST['learn'];
			$sup_id = Session::get('uid');

			if(empty($ename)||empty($eaddress)||empty($sname)||empty($sphone)||empty($stitle)||empty($semail)||empty($sdate)||empty($edate)||empty($hoursPerWeek)||empty($taskList)||empty($learnList))
			{
				echo"<script>alert('One are more fields are empty')</script>";
			}
			else if(!preg_match("/^[0-9]{10}$/",$sphone)||!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$semail)||!preg_match("/^[0-9]{1}.[0-9]{1}|^[0-9]{2}.[0-9]{1}|^[0-9]{3}.[0-9]{1}|^[0-9]{1}|^[0-9]{2}|^[0-9]{3}$/",$hoursPerWeek)||strtotime($sdate) > strtotime($edate))
			{
				if(!preg_match("/^[0-9]{10}$/",$sphone))
				{
					echo"<script>alert('Invalid Phone')</script>";		
				}
				if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$semail))
				{
					echo"<script>alert('Invalid Supervisor Email')</script>";		
				}
				if(!preg_match("/^[0-9]{1}.[0-9]{1}|^[0-9]{2}.[0-9]{1}|^[0-9]{3}.[0-9]{1}|^[0-9]{1}|^[0-9]{2}|^[0-9]{3}$/",$hoursPerWeek))
				{
					echo"<script>alert('Invalid Hours Per Week')</script>";		
				}
				if(strtotime($sdate) > strtotime($edate))
				{
					echo"<script>alert('Start date should be less than End date')</script>";	
				}
			}
			else
			{
				$StdID=$_SERVER['QUERY_STRING'];
				$sql="INSERT INTO form1_supervisor(supID,stdID,employer_name,employer_address,sup_name,sup_phone,sup_title,sup_email,internship_sDate,internship_eDate,noHoursPerWeek,tasks_desc,learn_desc) VALUES('$sup_id','$StdID','$ename','$eaddress','$sname','$sphone','$stitle','$semail','$sdate','$edate','$hoursPerWeek','$taskList','$learnList')";
					
				if (!mysqli_query($con,$sql)) 
				{
					die('Error: ' . mysqli_error($con));
				}

				$sql="UPDATE form1_student_details SET sup_response='done' WHERE stdID='$StdID'";
				if (!mysqli_query($con,$sql)) 
				{
					die('Error: ' . mysqli_error($con));
				}

				
				echo"<script>alert('Details emailed to industrial training manager')</script>";	
				mysqli_close($con);
			}
		}
	}

	

}

?>