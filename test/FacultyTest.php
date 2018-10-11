<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Faculty.php');
use PHPUnit\Framework\TestCase;

class FacultyTest extends TestCase
{
/*Test whether faulty is insert correctly and get specific faculty correctly*/
    /**
     * @covers Faculty::getOneFaculty
     */
    public function testGetOneFaculty()
    {
        $faculty = new Faculty();

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
