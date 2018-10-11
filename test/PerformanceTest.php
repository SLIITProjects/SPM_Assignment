<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Examiner.php');
use PHPUnit\Framework\TestCase;

class PerformanceTest extends TestCase
{
/*Test whether faulty is insert correctly and get specific faculty correctly*/
    public function testAddPerformance()
    {
        $examiner = new Examiner();
        $_POST['name']='udara wijayathilaka';
        $_POST['stdid']="IT16161702";
        $_POST['phone']="0774070695";
        $_POST['email']="udara@gmail.com";
        $_POST['ename']="saman";
        $_POST['sname']="sunil";
        $_POST['dtitle']="Software Engineering";
        $_POST['spc']="Software Engineering";
        $_POST['internd']="6";
        $_POST['credit']="8";
        $_POST['ititle']="developing";
        $_POST['bcomment']="good";
        $_POST['pcomment']="good";
        $_POST['grade']="A";
        $_POST['exname']="Sarath";
        $_POST['date']="2018-09-02";



        $examiner->addPerformance($_POST);
        $actual=null;
        $getdata=$examiner->getExaminarById('IT16161702');
        if($getdata){
            while($result=$getdata->fetch_assoc()){
                $actual = $result['IT_number'];
            }
        }

                $this->assertEquals('IT16161702',$actual);


    }
}
