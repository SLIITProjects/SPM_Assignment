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
		
        $user->form1Student();

        $actual=null;

		$getStdDetails=$user->getStudentLastRow();
		$actual = $getStdDetails[1];
      
        $this->assertEquals('IT16019232',$actual);
    }
}


?>