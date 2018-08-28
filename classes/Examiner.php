<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php

class Examiner
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function addPerformance($data){
        $stdid =  mysqli_real_escape_string($this->db->link,$data['stdid']);
        $sname =  mysqli_real_escape_string($this->db->link,$data['sname']);
        $phone =  mysqli_real_escape_string($this->db->link,$data['phone']);
        $email =  mysqli_real_escape_string($this->db->link,$data['email']);
        $ename =  mysqli_real_escape_string($this->db->link,$data['ename']);
        $name =  mysqli_real_escape_string($this->db->link,$data['name']);
        $dtitle =  mysqli_real_escape_string($this->db->link,$data['dtitle']);
        $spc =  mysqli_real_escape_string($this->db->link,$data['spc']);
        $internd =  mysqli_real_escape_string($this->db->link,$data['internd']);
        $credit =  mysqli_real_escape_string($this->db->link,$data['credit']);
        $ititle =  mysqli_real_escape_string($this->db->link,$data['ititle']);
        $bcomment =  mysqli_real_escape_string($this->db->link,$data['bcomment']);
        $pcomment =  mysqli_real_escape_string($this->db->link,$data['pcomment']);
        $grade =  mysqli_real_escape_string($this->db->link,$data['grade']);
        $exname =  mysqli_real_escape_string($this->db->link,$data['exname']);
        $date =  mysqli_real_escape_string($this->db->link,$data['date']);

        if($stdid=="" || $sname=="" || $phone=="" || $email=="" || $ename==""||
        $name=="" || $dtitle=="" || $spc=="" || $internd=="" || $credit==""||
        $ititle=="" || $bcomment=="" || $pcomment==""|| $grade==""|| $exname=="" || $data==""){
            $msg = "<span class='alert alert-warning'>Field cannot be Empty!</span>";
            return $msg;
        }

        $getperformance = "SELECT * FROM student_performance WHERE IT_number='$stdid' LIMIT 1";
        $res = $this->db->select($getperformance);

        if($res!=false){
            $msg = "<span class='alert alert-danger'>Student Id is already exists!</span>";
            return $msg;
        }else{
            $query = "INSERT INTO student_performance(Student_name,IT_number,Phone,Email,Employee_name,Supervisor_name
            ,Degree_title,Specialisation,Intern_duration,No_of_credits,Intern_title,Comments_benifits
            ,Comment_performance,Grade,Examiner_name,Date)
                      VALUES(
                          '$stdid',
                          '$sname',
                          '$phone',
                          '$email',
                          '$ename',
                          '$name',
                          '$dtitle',
                          '$spc',
                          '$internd',
                          '$credit',
                          '$ititle',
                          '$bcomment',
                          '$pcomment',
                          '$grade',
                          '$exname',
                          '$date'
                      )";
            $result = $this->db->insert($query);
            if($result){
                $msg = "<span class='alert alert-success msg'>Added Successfully!</span>";
                return $msg;
            }else{
                $msg = "<span class='alert alert-danger msg'>Cannot Add!</span>";
                return $msg;
            }
        }

    }

}

?>