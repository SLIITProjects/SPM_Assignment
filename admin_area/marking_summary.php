<!--Include header from another file-->
<?php include('inc/header.php'); ?>

<style>

</style>

<!--Include Navbar from another file-->
<?php include('inc/navbar.php')?>

<section id="authors" class="">
<div class="container-fluid">
    <div class="row">

       <!--Start sidebar section-->
       <div class="col col-md-3 col-lg-3 text-center">
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo Session::get('photo')?>" alt="" class="img-fluid rounded-circle w-50 mb-1">
                        <h4><?php echo Session::get('admin_name')?></h4>
                        <h5 class="text-muted">Admin</h5>
                        <div class="list-group">
                            <a href="admin.php" class="list-group-item list-group-item-action">Home</a>
                            <a href="addFaculties.php" class="list-group-item list-group-item-action">Add Faculties</a>
                            <a href="addUniversity.php" class="list-group-item list-group-item-action">Add Universities</a>
                            <a href="signup_request.php" class="list-group-item list-group-item-action">Signup requests</a>
                            <a href="grade.php" class="list-group-item list-group-item-action" >Grading-From</a>
                            <a href="marking_summary.php" class="list-group-item list-group-item-action active">Marking-Summary-From</a>
                            <a href="Schedule.php" class="list-group-item list-group-item-action" >Schedule</a>
                            <a href="schedule_report.php" class="list-group-item list-group-item-action" >Schedule Report</a>
                            <a href="form_I-7.php" class="list-group-item list-group-item-action" >Form I-7</a>
                            <a href="getPerformances.php" class="list-group-item list-group-item-action" ">Performance</a>
                            <a href="Performance_SummaryReport.php" class="list-group-item list-group-item-action" >Performance Summary Report </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End sidebar section-->

        <!--Start Main section-->
        <div class="col col-md-9 col-lg-9">
                    <div class="jumbotron jumbotron-fluid text-center welcome">
                        <div class="container">
                        <h1 class="display-4">Grading Summary </h1>
                        </div>
                      
                    </div>
                    <!-- <h3 class="text-primary"> Computing Faculty :</h3> <h3 class="text-warning">Business Faculty  :</h3>     <h3 class="text-success">Engineering Faculty :</h3> -->
                    	
					<!--Form filled by student-->	
					 <form  method="post" action="generate_pdf.php">
						<fieldset>
							
					
							<div class='form-group'>
							<label for='exampleSelect1'><b>Faculty</b></label>
								<select class='form-control' name='faculty'>
									<option>Computing</option>
									<option>Business</option>
									<option>Engineering</option>
								</select>
							</div>
							<div class='form-group'>
								<label for='exampleSelect1'><b>year</b></label>
								<select class='form-control' name='year'>
									<option>2019</option>
									<option>2018</option>
									<option>2017</option>
                                    <option>2016</option>
									<option>2015</option>
                                    <option>2014</option>
									<option>2013</option>
                                    <option>2012</option>
									<option>2011</option>
								</select>
							</div>
							
         <button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary">
  Generate PDF</button>

						</fieldset>
					</form>
					
        
                  
        



       
        </div>

      
        <!--End main section-->

    </div>
</div>
</section>

<!--Include Footer from another file-->
<?php include('inc/footer.php')?>