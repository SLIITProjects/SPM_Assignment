<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/User.php');

class form1StudentTest extends PHPUnit_Framework_TestCase
{
/*Test whether student information inserts correctly*/
    public function testStudentInfo()
    {
        $user = new User();

		$_POST['submitStudent']=true;
		$_POST['stdID']="IT16019232";
		$_POST['address']="15 Malabe";
		$_POST['hphone']="0111824578";
		$_POST['mphone']="0779645781";
		$_POST['email1']="kamal@gmail.com";
		$_POST['year']="2";
		$_POST['sem']="2";
		$_POST['cgpa']="1.2";
		
        $user->form1Student1();

        $actual=null;

		$getStdDetails=$user->getStudentLastRow();
		$actual = $getStdDetails[1]+', '+$getStdDetails[2]+', '+$getStdDetails[3]+', '+$getStdDetails[4]+', '+$getStdDetails[5]+', '+$getStdDetails[6]+', '+$getStdDetails[7]+', '+$getStdDetails[8];
      
        $this->assertEquals('IT16019232, 15 Malabe, 0111824578, 0779645781, kamal@gmail.com, 2, 2, 1.2',$actual);
    }
}


?>