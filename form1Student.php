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
					
					<!--Form filled by student-->	
					<form name='form1student' method='POST' action=' '>
						<fieldset>
							<div class='form-group'>
								<label><b>Student ID</b></label>
								<input class='form-control' name='stdID' placeholder='Enter Student ID' type='text'>
							</div>
							<br/>
							<div class='form-group'>
								<label><b>Address</b></label>
							    <input class='form-control' name='address' placeholder='Enter Address' type='text'>
							</div>
							<br/>
							<div class='form-group'>
								<label><b>Home Phone</b></label>
								<input class='form-control' name='hphone' placeholder='Enter Home Phone' type='text'>
							</div>
							<br/>
							<div class='form-group'>
								<label><b>Mobile Phone</b></label>
								<input class='form-control' name='mphone' placeholder='Enter Mobile Phone' type='text'>
							</div>
							<br/>
							<div class='form-group'>
								<label><b>Email address</b></label>
								<input class='form-control' name='email1' placeholder='Enter Email' type='email'>
							</div>
							<br/>
							<div class='form-group'>
								<label for='exampleSelect1'><b>Year</b></label>
								<select class='form-control' name='year'>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
							</div>
							<br/>
							<div class='form-group'>
								<label for='exampleSelect1'><b>Semester</b></label>
								<select class='form-control' name='sem'>
									<option>1</option>
									<option>2</option>
								</select>
							</div>
							<br/>
							<div class='form-group'>
								<label><b>CGPA</b></label>
								<input class='form-control' name='cgpa' placeholder='Enter CGPA' type='text'>
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
	/**
		calling function in User class
	**/
	$user->form1Student();
}
?>


<!--Include Footer from another file-->
<?php include('inc/footer.php')?>
