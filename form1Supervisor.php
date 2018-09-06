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
                        <img src="img/mlogo.png" alt="" class="img-fluid rounded-circle w-50 mb-1">
                        <h4><?php echo Session::get('name');?></h4>
                        <h5 class="text-muted"><?php echo Session::get('role');?></h5>
                        <div class="list-group">
                            <a href="index.php" class="list-group-item list-group-item-action active">Home</a>
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
								echo "&nbsp&nbsp&nbsp<b>$count</b>";
							?>	
							</a>	
                            <a href="form-i-3.php" class="list-group-item list-group-item-action">Form I-3</a>
                            <a href="form-i-3-supervisor.php" class="list-group-item list-group-item-action">Certify And Email Form I-3</a>
                            <a href="grade.php" class="list-group-item list-group-item-action">Grading-From</a>
                            <a href="marking_summary.php" class="list-group-item list-group-item-action">Marking-Summary-From</a>
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
	if(isset($_POST['submitSupervisor']))
	{
		$ename=$_POST['ename'];
		$eaddress=$_POST['eaddress'];
		$sname=$_POST['sname'];
		$sphone=$_POST['sphone'];
		$stitle=$_POST['stitle'];
		$semail=$_POST['semail'];
		$sdate=$_POST['sdate']." 00:00:00";
		$edate=$_POST['edate']." 00:00:00";
		$hoursPerWeek=$_POST['hourPerWeek'];
		$taskList=$_POST['tasks'];
		$learnList=$_POST['learn'];
		
		if(empty($ename)||empty($eaddress)||empty($sname)||empty($sphone)||empty($stitle)||empty($semail)||empty($sdate)||empty($edate)||empty($hoursPerWeek)||empty($taskList)||empty($learnList))
		{
			echo"<script>alert('One are more fields are empty')</script>";
		}
		else if(!preg_match("/^[0-9]{10}$/",$sphone)||!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$semail)||!preg_match("/^[0-9]{1}.[0-9]{1}|^[0-9]{2}.[0-9]{1}|^[0-9]{3}.[0-9]{1}|^[0-9]{1}|^[0-9]{2}|^[0-9]{3}$/",$hoursPerWeek)||strtotime($sdate) > strtotime($edate))
		{
			if(!preg_match("/^[0-9]{10}$/",$sphone))
			{
				echo"<script>alert('Invalid Phone')</script>";		
			}
			if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$semail))
			{
				echo"<script>alert('Invalid Supervisor Email')</script>";		
			}
			if(!preg_match("/^[0-9]{1}.[0-9]{1}|^[0-9]{2}.[0-9]{1}|^[0-9]{3}.[0-9]{1}|^[0-9]{1}|^[0-9]{2}|^[0-9]{3}$/",$hoursPerWeek))
			{
				echo"<script>alert('Invalid Hours Per Week')</script>";		
			}
			if(strtotime($sdate) > strtotime($edate))
			{
				echo"<script>alert('Start date should be less than End date')</script>";	
			}
		}
		else
		{
			$StdID=$_SERVER['QUERY_STRING'];
			$sql="INSERT INTO form1_supervisor(supID,stdID,employer_name,employer_address,sup_name,sup_phone,sup_title,sup_email,internship_sDate,internship_eDate,noHoursPerWeek,tasks_desc,learn_desc) VALUES(2,'$StdID','$ename','$eaddress','$sname','$sphone','$stitle','$semail','$sdate','$edate','$hoursPerWeek','$taskList','$learnList')";
				
			if (!mysqli_query($con,$sql)) 
			{
				die('Error: ' . mysqli_error($con));
			}

			$sql="UPDATE form1_student_details SET sup_response='done' WHERE stdID='$StdID'";
			if (!mysqli_query($con,$sql)) 
			{
				die('Error: ' . mysqli_error($con));
			}

			
			echo"<script>alert('Details emailed to industrial training manager')</script>";	
			mysqli_close($con);
		}
	}

}
?>


<!--Include Footer from another file-->
<?php include('inc/footer.php')?>