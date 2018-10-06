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
    //Register student
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
            $msg = "<script>alert('Field cannot be Empty!')</script>";
            return $msg;
        }else if(!preg_match("/^[0-9]{10}$/",$phone)){
            $msg = "<script>alert('Invalid phone number!')</script>";
            return $msg;
        }else if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$email)) {
            $msg = "<script>alert('Invalid email address!')</script>";
            return $msg;
        }else{
        	if ($file_size > 1048567) {
                $msg = "<script>alert('File size is too large!')</script>";
                return $msg;
            } elseif (in_array($file_ext, $permit) == false) {
                $msg = "<script>alert('Invalid file type')</script>";
                return $msg;
            } else {
                move_uploaded_file($file_temp,$uploaded_image);

                $getmail = "SELECT * FROM users WHERE email='$email' LIMIT 1";
                $res = $this->db->select($getmail);

                if(strcmp($password,$cpassword)!=0){
                    $msg = "<script>alert('Password does not match!')</script>";
                    return $msg;
                }else if($res!=false){
                    $msg = "<script>alert('Email already exist!')</script>";
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
                        $msg = "<script>alert('Registered successfully!')</script>";
                        return $msg;
                    }else{
                        $msg = "<script>alert('Cannot register!')</script>";
                        return $msg;
                    }
                }

            }
        }


    }
    //Register Company
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
            $msg = "<script>alert('Field cannot be Empty!')</script>";
            return $msg;
        }else if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$email)) {
            $msg = "<script>alert('Invalid email address!')</script>";
            return $msg;
        }else{
            if ($file_size > 1048567) {
                $msg = "<script>alert('File size is too large!')</script>";
                return $msg;
            } elseif (in_array($file_ext, $permit) == false) {
                $msg = "<script>alert('Invalid file type')</script>";
                return $msg;
            } else {
                move_uploaded_file($file_temp,$uploaded_image);

                $getmail = "SELECT * FROM users WHERE email='$email' LIMIT 1";
                $res = $this->db->select($getmail);

                if(strcmp($password,$cpassword)!=0){
                    $msg = "<script>alert('Password does not match!')</script>";
                    return $msg;
                }else if($res!=false){
                    $msg = "<script>alert('Email already exist!')</script>";
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
                        $msg = "<script>alert('Registered successfully!')</script>";
                        return $msg;
                    }else{
                        $msg = "<script>alert('Cannot register!')</script>";
                        return $msg;
                    }
                }



            }
        }



    }
    //Retrieve all companies
    public function getCompanies(){
        $query = "SELECT * from users WHERE role='CMP'";
        $result = $this->db->select($query);
        return $result;

    }
    //Get all supervisors from database
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
    //Allocate supervisor for a student
    public function allocateSupervisor($data,$stid){
        $sup =  mysqli_real_escape_string($this->db->link,$data['supervisor']);
        $dep =  mysqli_real_escape_string($this->db->link,$data['department']);

        if($sup=="" || $dep ==""){
            $msg = "<script>alert('Field cannot be empty!')</script>";
            return $msg;
        }
        else{

            $query="UPDATE users SET supervisor='$sup',department='$dep' WHERE uid='$stid'";

            $result=$this->db->update($query);
            if($result){
                $msg = "<script>alert('Allocate successfully!')</script>";
                return $msg;
            }else{
                $msg = "<script>alert('Cannot Allocate!')</script>";
                return $msg;
            }
        }

    }
    //Get all students
    public function getAllStudents($company,$stdid){
        $query = "SELECT * 
        from users 
        INNER JOIN university ON users.university = university.unid
        INNER JOIN faculty ON users.faculty = faculty.fid
        WHERE delete_status =0 AND uid='$stdid' AND role='STD' AND company='$company'";
        $result = $this->db->select($query);
        return $result;
    }
    //Register student for pager
    public function getStudents($company,$start_from,$num_of_pages){
        $query = "SELECT uid,name,studentId,contact,supervisor,university.uname,faculty.fname
        from users 
        INNER JOIN university ON users.university = university.unid
        INNER JOIN faculty ON users.faculty = faculty.fid
        WHERE company='$company' ORDER BY uid DESC LIMIT $start_from,$num_of_pages";
        $result = $this->db->select($query);
        return $result;

    }
    //Register supervisor
    public function registerSupervisor($data,$company,$files){
        $name =  mysqli_real_escape_string($this->db->link,$data['fullname']);
        $address =  mysqli_real_escape_string($this->db->link,$data['address']);
        $contact =  mysqli_real_escape_string($this->db->link,$data['contact']);
        $email =  mysqli_real_escape_string($this->db->link,$data['email']);
        $password =  mysqli_real_escape_string($this->db->link,md5($data['password']));
        $cpassword =  mysqli_real_escape_string($this->db->link,md5($data['cpassword']));
        $department =  mysqli_real_escape_string($this->db->link,$data['department']);
        $position =  mysqli_real_escape_string($this->db->link,$data['position']);

        $permit = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($name=="" || $address=="" || $department==""|| $position=="" || $email=="" || $password=="" || $cpassword=="" || $contact==""){
            $msg = "<script>alert('Field cannot be Empty!')</script>";
            return $msg;
        }else if(!preg_match("/^[0-9]{10}$/",$contact)){
            $msg = "<script>alert('Invalid phone number!')</script>";
            return $msg;
		}else if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$email)) {
            $msg = "<script>alert('Invalid email address!')</script>";
            return $msg;
        }else{
            if ($file_size > 1048567) {
                $msg = "<script>alert('File size is too large!')</script>";
                return $msg;
            } elseif (in_array($file_ext, $permit) == false) {
                $msg = "<script>alert('invalid file type!')</script>";
                return $msg;
            } else {
                move_uploaded_file($file_temp, $uploaded_image);
                $getmail = "SELECT * FROM users WHERE email='$email' LIMIT 1";
                $res = $this->db->select($getmail);

                if(strcmp($password,$cpassword)!=0){
                    $msg = "<script>alert('Password does not match!')</script>";
                    return $msg;
                }else if($res!=false){
                    $msg = "<script>alert('Email already exist!')</script>";
                    return $msg;
                }else{
                    $query = "INSERT INTO users(name,department,company,address,contact,photo,email,password,position,role,status)
                      VALUES(
                          '$name',
                          '$department',
                          '$company',
                          '$address',
                          '$contact',
                          '$uploaded_image',
                          '$email',
                          '$password',
                          '$position',
                          'SUP',
                          1
                      )";
                    $result = $this->db->insert($query);
                    if($result){
                        $msg = "<script>alert('Registered successfully!')</script>";
                        return $msg;
                    }else{
                        $msg = "<script>alert('Cannot registered!')</script>";
                        return $msg;
                    }
                }



            }
        }
    }
    //Delete supervisor from system
    public function delSupervisor($uid){
        $query = "UPDATE users SET delete_status=1 WHERE uid='$uid'";
        $result = $this->db->update($query);
        if($result){
            $msg = "<script>alert('Successfully deleted!')</script>";
            return $msg;
        }else{
            $msg = "<script>alert('Cannot deleted!')</script>";
            return $msg;
        }
    }
	
		//Student entering details handeling function

	public function form1Student(){
        include('DBConnection.php');
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
			if(Session::get('uid'))
			{
				$userID=Session::get('uid');
			}
			else
			{
				$userID=1;
			}
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
				if(Session::get('uid'))
				{
					$stdId=Session::get('uid');
				}
				else
				{
					$stdId=1;
				}
				$sql="SELECT supervisor FROM users WHERE uid=$stdId";
				$result=mysqli_query($con,$sql);
				$row=mysqli_fetch_array($result);
				$supervisor=$row[0];
				
				$sql="INSERT INTO form1_student_details(stdID, address, homePhn, mobilePhn, email, year, semester, cgpa, requested_date, supervisor) VALUES('$sid', '$address', '$hphn', '$mphn', '$email', '$year', '$sem', '$cgpa', '$date','$supervisor')";
				
				if (!mysqli_query($con,$sql)) 
				{
					die('Error: ' . mysqli_error($con));
				}

				echo"<script>alert('Details sent to supervisor')</script>";	
				mysqli_close($con);
			}
		}
	}

	public function getStudentLastRow(){
		$sql="SELECT * FROM form1_student_details ORDER BY stdID DESC LIMIT 1";
		$result=$this->db->select($sql);	
		return $result;
	}
	
	public function form1Student1(){
		include('DBConnection.php');
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
			
			$userID=1;
			
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
				
				$stdId=1;
				$sql="SELECT supervisor FROM users WHERE uid=$stdId";
				$result=mysqli_query($con,$sql);
				$row=mysqli_fetch_array($result);
				$supervisor=$row[0];
				
				$sql="INSERT INTO form1_student_details(stdID, address, homePhn, mobilePhn, email, year, semester, cgpa, requested_date, supervisor) VALUES('$sid', '$address', '$hphn', '$mphn', '$email', '$year', '$sem', '$cgpa', '$date','$supervisor')";
				
				if (!mysqli_query($con,$sql)) 
				{
					die('Error: ' . mysqli_error($con));
				}

				echo"<script>alert('Details sent to supervisor')</script>";	
				mysqli_close($con);
			}
		}
	}
	
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
			/**Validating data fields*/
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

				/**Inserts data into the form1_supervisor table*/
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

				/**Send mail*/
                require 'mailer/PHPMailerAutoload.php';

                $mail = new PHPMailer;

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'spm200ok@gmail.com';                 // SMTP username
                $mail->Password = 'abcdspm@1234';                           // SMTP password
                $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;                                    // TCP port to connect to

                $mail->setFrom('from@example.com', 'Mailer');
                $mail->addAddress('spmmanager96@gmail.com', 'Joe User');

                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = 'Internship Acceptance Form';
                $mail->Body    = 'Dear Industrial Training Manager,<br><br>We have selected the student with student ID <b>'.$StdID.'</b> for our internship program.<br><br>Employer Name: '.$ename.'<br>Employer Address: '.$eaddress.'<br><br>Supervisor Name: '.$sname.'<br>Supervisor Title: '.$stitle.'<br>Supervisor Phone: '.$sphone.'<br>Supervisor Email: '.$semail.'<br><br><b>Internship Start date: </b>'.$sdate.'<br><b>Internship End date: </b>'.$edate.'<br><br>Working Hours Per Week: '.$hoursPerWeek.'<br><br><b>Tasks List: </b>'.$taskList.'<br><br><b>Learning Areas: </b>'.$learnList.'<br><br>Thank You.';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo"<script>alert('Details emailed to industrial training manager')</script>";
                }


               // echo"<script>alert('Details emailed to industrial training manager')</script>";
				mysqli_close($con);
			}
		}
    }
    //Accept the user request and activate the user
    public function activateAccount($uid){
        $query = "UPDATE users SET status=1 WHERE uid='$uid'";
        $result=$this->db->update($query);
        if($result){
            $msg = "<script>alert('User Activated')</script>";
            return $msg;
        }else{
            $msg = "<script>alert('User cannot activated')</script>";
            return $msg;
        }
    }

    //Get all Deactivated users from database
    public function getDeactivateUsers(){
        $query = "SELECT *
          FROM users
          WHERE status=0 ORDER BY uid DESC";

        $result = $this->db->select($query);
        return $result;
    }

    //Delete user
    public function deleteUsers($uid){
        $query = "DELETE FROM users WHERE uid='$uid'";
        $result =$this->db->delete($query);
        if($result){
            $msg = "<script>alert('Delete successfully')</script>";
            return $msg;
        }else{
            $msg = "<script>alert('Cannot deactivated')</script>";
            return $msg;
        }
    }

    //Get Student count
    public function getStudentCount($table){
        $query = "SELECT COUNT(*) as tCount
          FROM $table
          WHERE role='STD'";
        $result = $this->db->select($query);
        return $result;
    }
     //Get count
     public function getCount($table){
        $query = "SELECT COUNT(*) as tCount
          FROM $table";
        $result = $this->db->select($query);
        return $result;
    }

}

?>
