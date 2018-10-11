<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Format.php');
?>

<?php

class Form
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }


    //Get all the students details by ID
    public function getStudentById($sid)
    {
        $query = "SELECT name,supervisor FROM users WHERE studentId='$sid'";
        $result = $this->db->select($query);
        return $result;
    }

    //Get all the details
    public function getdata($sid)
    {
        $query = "SELECT * FROM evaluation WHERE stdID ='$sid'";
        $result = $this->db->select($query);
        return $result;
    }


    //Insert the data to database and send an email 
    public function InsertEvaluation()
    {
        /**Database connection file*/
        include('DBConnection.php');
        if (isset($_POST['submit'])) {
            $area1 = $_POST['area1'];
            $area2 = $_POST['area2'];
            $area3 = $_POST['area3'];
            $area4 = $_POST['area4'];
            $area5 = $_POST['area5'];
            $area6 = $_POST['area6'];
            $area7 = $_POST['area7'];
            $edate = $_POST['date'];
            $exsup = $_POST['name'];
            $date = $_POST['date'];
            $sid = Session::get('uid');;


            if ($area1 == "" || $area2 == "" || $area3 == "" || $area4 == "" || $area5 == "") {
                {
                    echo "<script>alert('One are more fields are empty')</script>";
                }
                /**Validating data fields*/
            } else {

                $sql = "INSERT INTO evaluation(stdID,area1,area2,area3,area4,area5,area6,area7,exSuper,date)
                      VALUES(
                            '$sid',
                          '$area1',
                          '$area2',
                          '$area3',
                          '$area4',
                          '$area5',
                          '$area6',
                          '$area7',
                          '$exsup',
                          '$date'                    
                    )";

                if (!mysqli_query($con, $sql)) {
                    die('Error: ' . mysqli_error($con));
                }

                /**Send mail*/
                require 'mailer/PHPMailerAutoload.php';

                $mail = new PHPMailer;

                $mail->isSMTP();                                        // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                                 // Enable SMTP authentication
                $mail->Username = 'spm200ok@gmail.com';                 // SMTP username
                $mail->Password = 'abcdspm@1234';                           // SMTP password
                $mail->SMTPSecure = 'ssl';                              // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;                                      // TCP port to connect to

                $mail->setFrom('from@example.com', $sid);
                $mail->addAddress('spmmanager96@gmail.com', 'Manager');

                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = 'Final Evaluation of the Internship Student';
                $mail->Body = 'This is the final evaluation of the student ' . $sid . '
                                    ,<br><br>Feedback for the initial contract and actual assignment  -  <b>' .
                    $area1 . '</b><br>Feedback for the personal charactor- <b>' . $area2 . '</b> 
                                    <br><br>Feedback for the professional development  -  <b>' . $area3 . '</b> 
                                    <br><br>Feedback for the needs of organization  -  <b>' . $area4 . '</b> <br>
                                    <br><br> The supervisor name is ' . $exsup . ' <br><br> Date -' . $date . ' <br><br>Thank you';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo "<script>alert('Details emailed to industrial training manager')</script>";
                }

                mysqli_close($con);
            }
        }
    }


}


?>