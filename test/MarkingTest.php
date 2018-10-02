<?php
/**
 * Created by PhpStorm.
 * User: thilina
 */
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/Manager.php');
use PHPUnit\Framework\TestCase;

class MarkingTest extends PHPUnit_Framework_TestCase
{
/*Test whether Marks are insert correctly and get specific student  marks correctly*/
    public function testTotal()
    {
        $manager = new Manager();

        $manager->addMarksTest('IT10000000',12,10,5,27);
        $actual=null;
        $getMarks=$manager->getTotal('IT10000000');
        if($getMarks){
            while($result=$getMarks->fetch_assoc()){
                $actual = $result['Total'];
            }
        }

        $this->assertEquals(27,$actual);
    }
}
