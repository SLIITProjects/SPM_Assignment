<?php
function email($student){
require 'PHPMailer/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 2;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;
//$mail->SMTPAutoTLS = false;                               // Enable SMTP authentication
$mail->Username = 'spm200ok@gmail.com';                 // SMTP username
$mail->Password = 'abcdspm@1234';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('spm200ok@gmail.com', 'Mailer');
$mail->addAddress('spmmanager96@gmail.com', 'Joe User');     // Add a recipient
$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');



include('DBConnection-I-3.php');
						
//$StdID=$_SERVER['QUERY_STRING'];
						$sql2="SELECT * FROM form1_supervisor  WHERE stdID='$student'";
						$result=mysqli_query($con,$sql2);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								// $StudentId= $row["studentId"];
								// $address= $row["address"];
								// $contact= $row["contact"];
								// $email= $row["email"];
								//$address= $row["studentId"];
								$start=$row["internship_sDate"];
								$end=$row["internship_eDate"];
                                $company=$row['employer_name'];
                                $supname=$row["sup_name"];


							}
						} else {
							echo "0 results";
						}
						$sql6="SELECT * FROM i3_details  WHERE studentId='$student'";
						$result6=mysqli_query($con,$sql6);
						if ($result6->num_rows > 0) {
							// output data of each row
							while($row = $result6->fetch_assoc()) {
								// $StudentId= $row["studentId"];
								// $address= $row["address"];
								// $contact= $row["contact"];
								// $email= $row["email"];
								//$address= $row["studentId"];
								$problem=$row["problems"];
                                $summary=$row["summary"];
                                $month=$row["month"];
                               

							}
						} else {
                             
                            
                            
						}



//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Form I-3 of Student '.$student;






$mail->Body    = '<h3>Approved Form i-3 </h3> of '.$student.'<br><br>Internship Start Date-:'.$start.'<br>Internship Ends on :'.$end.'<br>Supervisor name -:'.$supname.'<br>Company :'.$company.'<br>Problems-:'.$problem.'<br>Summary-:'.$summary;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
}

}
