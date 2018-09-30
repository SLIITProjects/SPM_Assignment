<!--Include header from another file-->
<?php include('inc/header.php'); ?>

<style>

</style>

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
                            <a href="form1SupervisorRList.php" class="list-group-item list-group-item-action active" style="<?php if(Session::get('role')!="SUP"){echo "display:none";}?>">Form I-1
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
                            <a href="form-i-3-supervisor.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="STD"){echo "display:none";}?>">Certify And Email Form I-3</a>
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
                            <h2>Form I-1</h2></br>
							<h4>Internship Acceptance Form</h4>
                        </div>
                    </div>
					
					<?php
						/**
						* Displays details filled by student 
						**/
						include('DBConnection.php');
						
						$StdID=$_SERVER['QUERY_STRING'];
						$sql="SELECT * FROM form1_student_details WHERE stdID='$StdID' AND sup_response='in progress'";
						$result=mysqli_query($con,$sql);

						if (!$result)
						{	
							die(mysqli_error($con));	
						}
						
						while($row=mysqli_fetch_array($result))
						{
							echo"<div>";
							
							echo"<label><b>Student ID &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$row[1]</label>";
		
							echo"<br><br>";
								
							echo"<label><b>Address &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$row[2]</label>";
						
							echo"<br><br>";		
						
							echo"<label><b>Home Phone &nbsp&nbsp&nbsp&nbsp:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$row[3]</label>";
							
							echo"<br><br>";	
							
							echo"<label><b>Mobile Phone &nbsp&nbsp&nbsp:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$row[4]</label>";
							
							echo"<br><br>";	
							
							echo"<label><b>Email &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$row[5]</label>";
							
							echo"<br><br>";	
							
							echo"<label><b>Year &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$row[6]<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSemester &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$row[7]</label>";
							
							echo"<br><br>";	
							
							echo"<label><b>CGPA &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$row[8]</label>";
							
							echo"<br><br>";	
							
							echo"</div>";
						}
					?>
					
					<!--Form filled by supervisor-->	
					<form name='form1supervisor' method='POST' action=' '>
						<fieldset>
							<br/>
							<div class='form-group'>
								<label><b>Employer's Name</b></label>
								<input class='form-control' name='ename' placeholder="Enter Employer's Name" type='text'>
							</div>
							<br/>
							<div class='form-group'>
								<label><b>Employer's Address</b></label>
							    <input class='form-control' name='eaddress' placeholder="Enter Employer's Address" type='text'>
							</div>
<br/>													
							<div class='form-group'>
								<label><b>Supervisor's Name</b></label>
								<input class='form-control' name='sname' placeholder="Enter Supervisor's Name" type='text'>
							</div>
							<br/>
							<div class='form-group'>
								<label><b>Supervisor's Phone</b></label>
								<input class='form-control' name='sphone' placeholder="Enter Supervisor's Phone" type='text'>
							</div>
							<br/>
							<div class='form-group'>
								<label><b>Supervisor's Title</b></label>
								<input class='form-control' name='stitle' placeholder="Enter Supervisor's Title" type='text'>
							</div>
							<br/>
							<div class='form-group'>
								<label><b>Supervisor's Email</b></label>
								<input class='form-control' name='semail' placeholder="Enter Supervisor's Email" type='email'>
							</div>
							<br/>
							<div class='form-group'>
								<label><b>Internship Start Date</b></label>
								<input class='form-control' name='sdate' placeholder="Enter Start Date" type='date'>
							</div>
							<br/>
							<div class='form-group'>
								<label><b>Internship End Date</b></label>
								<input class='form-control' name='edate' placeholder="Enter End Date" type='date'>
							</div>
							<br/>
							<div class='form-group'>
								<label><b>No. of Hours/Week</b></label>
								<input class='form-control' name='hourPerWeek' placeholder="Enter No. of Hours/Week" type='text'>
							</div>
							<br/>
							<div class='form-group'>
								<label><b>Please list the tasks the student is expected to complete</b></label>
								<textarea rows="4" cols="50" class='form-control' name='tasks'></textarea>
							</div>
							<br/>
							<div class='form-group'>
								<label><b>List what the student will learn during the internship period</b></label>
								<textarea rows="4" cols="50" class='form-control' name='learn'></textarea>
							</div>
							<br/>
							<button type='submit' class='btn btn-primary' name='submitSupervisor'>Submit</button>
						</fieldset>
					</form>
					
        </div>
		
		
        <!--End main section-->

    </div>
</div>
</section>


<?php
include('DBConnection.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
	/**
		Calling the function in the user class
	**/
	$user->form1Supervisor();

}
?>


<!--Include Footer from another file-->
<?php include('inc/footer.php')?>