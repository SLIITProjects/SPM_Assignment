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
                        <h4>Rajitha lakshan</h4>
                        <h5 class="text-muted">Student</h5>
                        <div class="list-group">
                            <a href="index.php" class="list-group-item list-group-item-action active">Home</a>
                            <a href="" class="list-group-item list-group-item-action">Functions</a>
							<a href="form_i-7.php" class="list-group-item list-group-item-action">Form I-7</a>
                        </div>
                    </div>
                </div>
        </div>
        <!--End Sidebar Section-->

        <!--Start Main section-->
        <div class="col col-md-9 col-lg-9">
                    <div class="jumbotron jumbotron-fluid text-center welcome">
                        <div class="container">
                            <h2>Form I-7</h2></br>
							<h4>Student Performance Evaluation</h4>
                        </div>
                    </div>
					
					<!--Form filled by examiner-->	
					<form name='form7' method='POST' action=' '>
						<fieldset>
						<label><h5><b>STUDENT INFORMATION</b></h5></label><br><br>
							<div class='form-group'>
								<label><b>Student IT number</b></label>
								<input class='form-control' name='stdid' placeholder='Enter Student ID' type='text'><br>
								<button type='submit' class='btn btn-primary' name='submitStudent'>Get details</button>
							</div>
							<div class='form-group'>
								<label><b>Student Name</b></label>
							    <input class='form-control' name='sname' placeholder='student name' type='text'>
							</div>	
							<div class='form-group'>
								<label><b>Phone Number</b></label>
								<input class='form-control' name='phone' placeholder='student Phone number' type='text'>
							</div>
							<div class='form-group'>
								<label><b>Email</b></label>
								<input class='form-control' name='email' placeholder='student email' type='email'>
							</div><div></div><br><br><br>
							<label><h5><b>EMPLOYEE INFORMATION</b></h5></label><br><br>
							<div class='form-group'>
								<label><b>Employee Name</b></label>
								<input class='form-control' name='ename' placeholder='Employee name' type='text'>
							</div>
					         <div class='form-group'>
								<label><b>Supervisor Name</b></label>
								<input class='form-control' name='sname' placeholder='supervisor name' type='text'>
							</div><div></div><br><br><br>
							<label><h5><b>ACADAMIC INFORMATION</b></h5></label><br><br>
							<div class='form-group'>
								<label><b>Degree Title</b></label>
								<input class='form-control' name='dtitle' placeholder='degree title' type='text'>
							</div>
							<div class='form-group'>
								<label><b>Specialisation</b></label>
							    <input class='form-control' name='spc' placeholder='specialisation' type='text'>
							</div>	
							<div class='form-group'>
								<label><b>Internship Duration</b></label>
								<input class='form-control' name='internd' placeholder='internship duration' type='text'>
							</div>
							<div class='form-group'>
								<label><b>No Of Credits</b></label>
								<input class='form-control' name='credit' placeholder='no of credits' type='text'>
							</div>
							<div class='form-group'>
								<label><b>Internship Title</b></label>
								<input class='form-control' name='ititle' placeholder='internship title' type='text'>
							</div>

							<br><br><br>
							<div class='form-group'>
								<label><b>Comments on how the internship benifited the student</b></label>
								<textarea class='form-control' name='bcomment'></textarea><br>
								
							</div>
							<div class='form-group'>
								<label><b>Monthly progress (30%)</b></label>
							    <input class='form-control' name='monthly' placeholder='monthly progress' type='text'>
							</div>	
							<div class='form-group'>
								<label><b>Internship report (30%)</b></label>
								<input class='form-control' name='report' placeholder='internship report' type='text'>
							</div>
							<div class='form-group'>
								<label><b>Viva (40%)</b></label>
								<input class='form-control' name='viva' placeholder='viva' type='text'>
							</div>
							<div class='form-group'>
								<label><b>Final Grade</b></label>
								<input class='form-control' name='grade' placeholder='grade' type='text'>
							</div>
							<br><br><br>
							<div class='form-group'>
								<label><b>Comments on how the student performed including observations on the report</b></label>
								<textarea class='form-control' name='pcomment'></textarea><br>
								
							</div>
							<div class='form-group'>
								<label><b>Examiner name</b></label>
								<input class='form-control' name='ename' placeholder='examiner name' type='text'>
							</div>
							<div class='form-group'>
								<label><b>Examiner signature</b></label>
								<input class='form-control' name='sig' placeholder='signature' type='text'>
							</div>
							<div class='form-group'>
								<label><b>Date</b></label>
								<input class='form-control' name='date' type='date'>
							</div><br><br>
							<button type='submit' class='btn btn-primary' name='submitdetails'>Submit</button>
						</fieldset>
					</form>
					
        </div>
		
		
        <!--End main section-->

    </div>
</div>
</section>



<!--Include Footer from another file-->
<?php include('inc/footer.php')?>