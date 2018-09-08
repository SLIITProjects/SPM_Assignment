<?php
include_once("../classes/Form.php");
use PHPUnit\Framework\TestCase;

class FormTest extends TestCase
{
/*Test whether the form 5 data inserted correctly */
    public function testForm5()
    {
        $form5 = new Form();
 
         
        $form5->InsertEvaluation("IT16058224");
   
        $actual=null;
        $getForm= $form5->getdata('IT16058224');
        
        if($getForm){
            while($result=$getForm->fetch_assoc()){
                $actual = $result['stdID'];
                
            }
        }

        $this->assertEquals('IT16058224',$actual);
    }
}


        $faculty->addFaculty('Hospitality');
        $actual=null;
        $getFaculty=$faculty->getOneFaculty('Hospitality');
        if($getFaculty){
            while($result=$getFaculty->fetch_assoc()){
                $actual = $result['fname'];
            }
        }

        $this->assertEquals('Hospitality',$actual);
    }
}
