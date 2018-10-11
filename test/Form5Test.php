<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Form.php');
use PHPUnit\Framework\TestCase;

class FormTest extends TestCase
{
/*Test whether the form 5 data inserted correctly */
    public function testForm5()
    {
        $form5 = new Form();
 
        $_POST['area1'] ="area 1";
        $_POST['area2'] ="area 1";
        $_POST['area3'] ="area 1";
        $_POST['area4'] ="area 1";
        $_POST['area5'] ="area 1";
        $_POST['area6'] ="area 1";
        $_POST['area7'] ="area 1";
        $_POST['date'] ="2018-10-04";
        $_POST['name'] ="Nalin pushpakumara";


        $form5->InsertEvaluation($_POST,"IT16030268");
   
        $actual=null;
        $getForm= $form5->getdata('IT16030268');
        
        if($getForm){
            while($result=$getForm->fetch_assoc()){
                $actual = $result['stdID'];
                
            }
        }

        $this->assertEquals('IT16030268',$actual);
    }
}
