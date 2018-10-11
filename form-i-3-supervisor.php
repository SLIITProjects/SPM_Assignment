<!--Include header from another file-->
<?php include('inc/header.php'); ?>

<style>


h1 {
  text-align: center;
  font-family: Tahoma, Arial, sans-serif;
  color: #06D85F;
  margin: 80px 0;
}

.box {
  width: 40%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}


.button:hover {
  background: #06D85F;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 70%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 70%;
  overflow: auto;
}

@media screen and (max-width: 50%){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}
/* Popup box BEGIN */
</style>
<script>
    $(function() {
    $( "#datepicker" ).datepicker();
    });
    </script>

<!--Include Navbar from another file-->
<?php include('inc/navbar.php')?>

<section id="authors" class="">
<div class="container-fluid">
    <div class="row">

        <!--Start Sidebar section-->
		
         <div class="col col-md-3 col-lg-3 text-center">
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo Session::get('photo');?>" alt="" class="img-fluid rounded-circle w-50 mb-1">
                        <h4><?php echo Session::get('name');?></h4>
                        <h5 class="text-muted"><?php echo Session::get('role');?></h5>
                        <div class="list-group">
                            <a href="index.php" class="list-group-item list-group-item-action">Home</a>
                            <a href="register_supervisor.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="CMP"){echo "display:none";}?>">Register Supervisor</a>
                            <a href="student_list.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="CMP"){echo "display:none";}?>">Allocate Supervisor</a>
                            <a href="form1Student.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="STD"){echo "display:none";}?>">Form I-1</a>
                            <a href="form1SupervisorRList.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="SUP"){echo "display:none";}?>">Form I-1
                                <?php
                                include('DBConnection.php');
                                $supId=Session::get('uid');
                                $sql="SELECT * FROM form1_student_details WHERE supervisor='$supId' AND sup_response='in progress'";
                                $result=mysqli_query($con,$sql);
                                $count=mysqli_num_rows($result);
                                echo '<span class="badge badge-success ml-3"><b>'.$count.'</b></span>';
                                ?>
                            </a>
                            <a href="form-i-3.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="STD"){echo "display:none";}?>">Form I-3</a>
                            <a href="form5.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="SUP"){echo "display:none";}?>">Form I-5</a>
                            <a href="form_I-7.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Form I-7</a>
                            <a href="getPerformances.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Performance</a>
                            <a href="form-i-3-supervisor.php" class="list-group-item list-group-item-action " style="<?php if(Session::get('role')!="SUP"){echo "display:none";}?>">Certify And Email Form I-3</a>
                            <a href="grade.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Grading-From</a>
                            <a href="marking_summary.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Marking-Summary-From</a>
                            <a href="Schedule.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Schedule</a>
                            <a href="schedule_report.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Schedule Report</a>
                        </div>
                    </div>
                </div>
        </div> 
        <!--End Sidebar Section-->

        <!--Start Main section-->
        <div class="col col-md-9 col-lg-9">
                    <div class="jumbotron jumbotron-fluid text-center welcome">
                        <div class="container">
                            <h2> Form I-3-Approval</h2></br>
							
                        </div>






                        
                        <?php
                        include('DBConnection-I-3.php');
						
                        //$StdID=$_SERVER['QUERY_STRING'];
                                                $supervisor="23";
                                                $sql2="SELECT * FROM i3_details  WHERE supervisor='$supervisor'";
                                                $result=mysqli_query($con,$sql2);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($row = $result->fetch_assoc()) {
                                                        // $StudentId= $row["studentId"];
                                                        // $address= $row["address"];
                                                        // $contact= $row["contact"];
                                                        // $email= $row["email"];
                                                        //$address= $row["studentId"];

                                                        $student=$row["studentId"];
                                                        $month=$row["month"];
                                                       
                        
                        
                                                    }
                                                } else {
                                                    
                                                }
                        


                                            ?>
                                       <div style="margin-left:300px">     
                        <table style="text-align:center"><tr><form method="POST" ><th>Student Id</th><th>Month</th><th>Form I-3</th><th>Action</th></tr>
                        
                        <tr><td><?php echo "$student" ?></td>
                        <td><?php echo "$month"?></td>
                      <td>  
                      <div >
	<a class="button" href="#popup1">View Form I-3</a>
</div>

<div id="popup1" class="overlay">
	<div class="popup">
		<h2>Form I-3</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">





		

<?php
						///
						include('DBConnection-I-3.php');
						
						$StdID=$_SERVER['QUERY_STRING'];
						$uid=$_SESSION["uid"];
                        $address= "";
                        $contact="";
                        $email= "";
//$address= $row["studentId"];
						$sql="SELECT * FROM form1_supervisor  WHERE ID='9'";
						$result=mysqli_query($con,$sql);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
							$StudentId	= $row["stdID"];
//$address= $row["studentId"];
							}
						} else {
							
                        }
                        

                        $sql4="SELECT * FROM form1_student_details  WHERE stdID='$StudentId'";
						$result4=mysqli_query($con,$sql4);
						if ($result4->num_rows > 0) {
							// output data of each row
							while($row = $result4->fetch_assoc()) {
                            $StudentId	= $row["stdID"];
                            

                            $address= $row["address"];
                            $contact= $row["mobilePhn"];
                            $email= $row["email"];
//$address= $row["studentId"];
							}
						} else {
							
                        }
                        
                        
                        $sql8="SELECT * FROM users  WHERE studentId='$StudentId'";
						$result8=mysqli_query($con,$sql8);
						if ($result8->num_rows > 0) {
							// output data of each row
							while($row = $result8->fetch_assoc()) {
                            $StudentName	= $row["name"];
                            

                            
//$address= $row["studentId"];
////
							}
						} else {
							
						}


						// if (!$result)
						// {	
						// 	die(mysqli_error($con));	
						// }
						
						// while($row=mysqli_fetch_array($result))
						// {
								
						// 	echo "<div>".$result['studentId'];
							
							
							
						// }
					?>
					
						<fieldset>

							<div>
							<div class ="jumbotron">
							<h4 style="text-align:center"><b>Intern's Information</b></h4>
							<hr>
							<div class='row'>
							<div class='col'>
								<?php echo " <label><b>Intern's Name-:".$StudentName."</b></label>";
								?>
								
															</div>

								<div class='col'>

								

								<?php echo " <label><b>Student ID-:".$StudentId."</b></label>";
								?>

								
								</div>
								<div class='col'>

								

									<?php echo " <label><b>Intern's Private Address-:".$address."</b></label>";
								?>
							
								</div>
								</div>
								<div class='row'>
								<div class='col'>
								<?php echo " <label><b>Contact Number-:".$contact."</b></label>";
								?>
								
								</div>
								<div class='col'>
								<?php echo " <label><b>Email-:".$email."</b></label>";
								?>
								
								</div>
								<div class='col'>
								<!-- <label><b>Address-:{{Address}}</b></label> -->
								<br>
								<br>
								</div>
								
								</div>


								
							</div>
							
							
<?php
     					 $start="";
						$end="";
						$company="";
						$supname="";

						///
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


					?>
					



							<h4 style="text-align:center"><b>Internship Information</b></h4>
							<hr>

							<div class="row">

							<div class="col"><?php echo " <label><b>Internship Title-:Intern</b></label>";?></div>

						    <div class="col"><?php echo " <label><b>Company-:".$company."</b></label>";?></div>

							</div>

							<div class="row">

							<div class="col"><?php echo " <label><b>Overall internship period from-:".$start."</b></label>";?></div>

							<div class="col"><?php echo " <label><b>Overall internship period to-:".$end."</b></label>";?></div>

							</div>


<br>

	<h4 style="text-align:center"><b>Details of the month</b></h4>
							<hr>
                            <div class="row">

                            <div class="col"><?php echo " <label><b>month-:".$month."</b></label>";?></div>


<div class="col"><?php echo " <label><b>Problems-:".$problem."</b></label>";?></div>

<div class="col"><?php echo " <label><b>Summary-:".$summary."</b></label>";?></div>

</div>




		</div>
	</div>
</div>
                      
                      
                      
                      
                      </td>

                        <td><button input type="submit" name="submit" id="submit">Accept and email</button></td></form>
                        <?php



    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit']))
    {
        require_once('email.php');
        email($StudentId);
        echo"<script>alert('Form I-3 of ".$student." For month ".$month." has been successfully sent to industrial trainig manager')</script>";

    }
    
?>
                        </tr>

                        
                        
                        
                        </table>
                        
                        </div>

                        
                    </div>
					
					
					
        </div>
		
		
        <!--End main section-->

    </div>
</div>
</section>



<!--Include Footer from another file-->
<?php include('inc/footer.php')?>