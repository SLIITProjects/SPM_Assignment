<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/Manager.php');
use PHPUnit\Framework\TestCase;

class ScheduleTest extends TestCase
{
/*Test whether Date and Time  is inserted correctly*/
    public function testAddSchedule()
    {
        $schedule = new Manager();
        $_POST['viva_date']="2018-09-02";
        $_POST['time']="01:30:00";
        $_POST['regId']="IT16030268";

        $schedule->addSchedule($_POST);
        $actual=null;

        $getdata=$schedule->getSheduleById("IT16030268");
        if($getdata){
            while($result=$getdata->fetch_assoc()){
                $actual = $result['Viva_date'];
            }
        }

        $this->assertEquals('2018-09-02',$actual);
    }
}
