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
                        <h4>Supervisor</h4>
                        <h5 class="text-muted">Supervisor</h5>
                        <div class="list-group">
                            <a href="supervisor.php" class="list-group-item list-group-item-action active">Home</a>
                            <a href="" class="list-group-item list-group-item-action">Functions</a>
							<a href="form1SupervisorRList.php" class="list-group-item list-group-item-action">Form I-1
							<?php
								include('DBConnection.php');
								$sql="SELECT * FROM form1_student_details";
								$result=mysqli_query($con,$sql);
								$count=mysqli_num_rows($result);
								echo "&nbsp&nbsp&nbsp<b>$count</b>";
							?>
							</a>
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
						$sql="SELECT * FROM form1_student_details WHERE stdID='$StdID'";
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
								<input class='form-control' name='semail1' placeholder="Enter Supervisor's Email" type='email'>
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
								<input class='form-control' name='edate' placeholder="Enter No. of Hours/Week" type='text'>
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
							<button type='submit' class='btn btn-primary' name='submitStudent'>Submit</button>
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

}
?>


<!--Include Footer from another file-->
<?php include('inc/footer.php')?>