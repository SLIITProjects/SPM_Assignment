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
							<a href="form1Student.php" class="list-group-item list-group-item-action">Form I-1</a>
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
					
					<!--Form filled by student-->	
					<form name='form1student' method='POST' action=' '>
						<fieldset>
							<div class='form-group'>
								<label><b>Student ID</b></label>
								<input class='form-control' name='stdID' placeholder='Enter Student ID' type='text'>
							</div>
							<div class='form-group'>
								<label><b>Address</b></label>
							    <input class='form-control' name='address' placeholder='Enter Address' type='text'>
							</div>	
							<div class='form-group'>
								<label><b>Home Phone</b></label>
								<input class='form-control' name='hphone' placeholder='Enter Home Phone' type='text'>
							</div>
							<div class='form-group'>
								<label><b>Mobile Phone</b></label>
								<input class='form-control' name='mphone' placeholder='Enter Mobile Phone' type='text'>
							</div>
							<div class='form-group'>
								<label><b>Email address</b></label>
								<input class='form-control' name='email1' placeholder='Enter Email' type='email'>
							</div>
							<div class='form-group'>
								<label for='exampleSelect1'><b>Year</b></label>
								<select class='form-control' name='year'>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
							</div>
							<div class='form-group'>
								<label for='exampleSelect1'><b>Semester</b></label>
								<select class='form-control' name='sem'>
									<option>1</option>
									<option>2</option>
								</select>
							</div>
							<div class='form-group'>
								<label><b>CGPA</b></label>
								<input class='form-control' name='cgpa' placeholder='Enter CGPA' type='text'>
							</div>
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
	if(isset($_POST['submitStudent']))
	{
		$sid=$_POST['stdID'];
		$address=$_POST['address'];
		$hphn=$_POST['hphone'];
		$mphn=$_POST['mphone'];
		$email=$_POST['email1'];
		$year=$_POST['year'];
		$sem=$_POST['sem'];
		$cgpa=$_POST['cgpa'];
		
		/**
			Form Validation
		**/
		if(empty($sid)||empty($address)||empty($hphn)||empty($mphn)||empty($email)||empty($cgpa))
		{
			echo"<script>alert('One are more fields are empty')</script>";
		}
		else if(!preg_match("/^IT|BM|EN[0-9]{8}$/",$sid)||!preg_match("/^[0-9]{10}$/",$hphn)||!preg_match("/^[0-9]{10}$/",$mphn)||!preg_match("/^[0-3]{1}.[0-99]$/",$cgpa)||!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$email))
		{
			if(!preg_match("/^IT|BM|EN[0-9]{8}$/",$sid))
			{
				echo"<script>alert('Invalid Student ID')</script>";		
			}
			if(!preg_match("/^[0-9]{10}$/",$hphn))
			{
				echo"<script>alert('Invalid Home Phone Number')</script>";	
			}
			if(!preg_match("/^[0-9]{10}$/",$mphn))
			{
				echo"<script>alert('Invalid Mobile Phone Number')</script>";	
			}
			if(!preg_match("/^[0-3]{1}.[0-99]$/",$cgpa))
			{
				echo"<script>alert('Invalid CGPA')</script>";	
			}
			if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$email))
			{
				echo"<script>alert('Invalid Email Address')</script>";	
			}
		}
		/**
			Inserting data into DB if data is valid
		**/
		else
		{
			$sql="INSERT INTO form1_student_details(stdID, address, homePhn, mobilePhn, email, year, semester, cgpa) VALUES('$sid', '$address', '$hphn', '$mphn', '$email', '$year', '$sem', '$cgpa')";
			
			if (!mysqli_query($con,$sql)) 
			{
				die('Error: ' . mysqli_error($con));
			}

			echo"<script>alert('Details sent to supervisor')</script>";	
			mysqli_close($con);
		}
	}
}
?>


<!--Include Footer from another file-->
<?php include('inc/footer.php')?>