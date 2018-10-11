<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/User.php');
use PHPUnit\Framework\TestCase;
class form1StudentTest extends TestCase
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
	if($getStdDetails){
            while($result=$getStdDetails->fetch_assoc()){
	    	$actual = $result['stdID'].", ".$result['address'].", ".$result['homePhn'].", ".$result['mobilePhn'].", ".$result['email'].", ".$result['year'].", ".$result['semester'].", ".$result['cgpa'];
	    }
	}
        $this->assertEquals('IT16019232, 15 Malabe, 111824578, 779645781, kamal@gmail.com, 2, 2, 1.2',$actual);
    }
}


?>
