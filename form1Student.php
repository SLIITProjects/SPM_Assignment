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
					<form>
						<fieldset>
							<div class="form-group">
							  <label><b>Student ID</b></label>
							  <input class="form-control" id="stdID" placeholder="Enter Student ID" type="text">
							</div>
							<div class="form-group">
							  <label><b>Address</b></label>
							  <input class="form-control" id="address" placeholder="Enter Address" type="text">
							</div>
							<div class="form-group">
							  <label><b>Home Phone</b></label>
							  <input class="form-control" id="hphone" placeholder="Enter Home Phone" type="text">
							</div>
							<div class="form-group">
							  <label><b>Mobile Phone</b></label>
							  <input class="form-control" id="mphone" placeholder="Enter Mobile Phone" type="text">
							</div>
							<div class="form-group">
							  <label><b>Email address</b></label>
							  <input class="form-control" id="email1" placeholder="Enter Email" type="email">
							  <small class="form-text text-muted"><b>Use commas(,) to separate multiple email addreses.</b></small>
							</div>
							<div class="form-group">
							  <label for="exampleSelect1"><b>Year</b></label>
							  <select class="form-control" id="year">
								<option>2</option>
								<option>3</option>
								<option>4</option>
							  </select>
							</div>
							<div class="form-group">
							  <label for="exampleSelect1"><b>Semester</b></label>
							  <select class="form-control" id="sem">
								<option>1</option>
								<option>2</option>
							  </select>
							</div>
							<div class="form-group">
							  <label><b>CGPA</b></label>
							  <input class="form-control" id="cgpa" placeholder="Enter CGPA" type="text">
							</div>
							<button type="button" class="btn btn-primary">Submit</button>
						</fieldset>
					</form>
        </div>
		
		
        <!--End main section-->

    </div>
</div>
</section>

<!--Include Footer from another file-->
<?php include('inc/footer.php')?>