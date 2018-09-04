


//helloooooooooooo






<!--Include header from another file-->
<?php include('inc/header.php'); ?>



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
							<a href="form1Student.php" class="list-group-item list-group-item-action">Form I-5</a>
                        </div>
                    </div>
                </div>
        </div>
        <!--End Sidebar Section-->

        <!--Start Main section-->
        <div class="col col-md-9 col-lg-9">
                    <div class="jumbotron jumbotron-fluid text-center welcome">
                        <div class="container">
                            <h2>Form I-5</h2><br>
							<h4>Final Evaluation of Internship Student</h4>
                        </div>
                    </div>
					
					<!--Form filled by student-->	
					<form name='form5' method='POST' action=' '>
						<fieldset>
							<div class='form-group'>
								<label><b>Student ID</b></label>
								<input class='form-control' name='stdID' placeholder='Enter Student ID' type='text'>
							</div>
							<br/>
							<div class='form-group'>
								<label><b>Employee's Name</b></label>
							    <input class='form-control' name='Ename' placeholder='Enter the Emplyee name' type='text'>
							</div>
							<br/>
							<div class='form-group'>
								<label><b>Student's Name</b></label>
								<input class='form-control' name='Stdname' placeholder='Enter Student name' type='text'>
							</div>
							<br/>
							<div class='form-group'>
								<label><b>Supervisor's Name </b></label>
								<input class='form-control' name='SupName' placeholder='Enter the supervisor name' type='text'>
							</div>
							<br/>
                            
                            
                            <div class='form-group'>
								<label><b>Describe the differences if any, between student's initial contract and actual assignment which developed</b></label>
								<textarea class='form-control' name='bcomment'></textarea><br>
								
							</div>
                        
                            
                            <div class='form-group'>
								<label><b>Comments on how the internship benifited the student</b></label>
								<textarea class='form-control' name='bcomment'></textarea><br>
								
							</div>
                            
                            
                            
                            
                            <div class ="jumbotron">

                            <h4><b> Performance of the student</b></h4>
                                                        
                             <table style="width:100%" id="data" class="table-striped">
                              <tr>
                              <th>Category</th>
                                <th>Above Average</th>
                                <th>Average</th> 
                                <th>Below Average</th>
                                <th>Comments,Examples</th>
                                <th>Action</th>
                              </tr>
                                 
                            <tr>
                            <td>Volume of work</td>
                            <td><input type="radio" name="volume" value="aboveavg"> </td>
                            <td><input type="radio" name="volume" value="average"> </td>
                            <td><input type="radio" name="volume" value="belowavg"> </td>
                            <td></td>
                           
                            </tr>
                            
                            <tr>
                            <td>Quality of work</td>
                            <td><input type="radio" name="quality" value="aboveavg"> </td>
                            <td><input type="radio" name="quality" value="average"> </td>
                            <td><input type="radio" name="quality" value="belowavg"> </td>
                            <td></td>
                           
                            </tr>
                                 
                            <tr>
                            <td>Analytical ability</td>
                            <td><input type="radio" name="analytic" value="aboveavg"> </td>
                            <td><input type="radio" name="analytic" value="average"> </td>
                            <td><input type="radio" name="analytic" value="belowavg"> </td>
                            <td></td>
                           
                            </tr>
                        
                            <tr>
                            <td>Ability to resolve problems</td>
                            <td><input type="radio" name="resolve" value="aboveavg"> </td>
                            <td><input type="radio" name="resolve" value="average"> </td>
                            <td><input type="radio" name="resolve" value="belowavg"> </td>
                            <td></td>
                           
                            </tr>
                                 
                            <tr>
                            <td>Ability to resolve problems</td>
                            <td><input type="radio" name="resolve" value="aboveavg"> </td>
                            <td><input type="radio" name="resolve" value="average"> </td>
                            <td><input type="radio" name="resolve" value="belowavg"> </td>
                            <td></td>
                           
                            </tr>

                            <tr>
                            <td>Accuracy and thoroughness</td>
                            <td><input type="radio" name="Accuracy" value="aboveavg"> </td>
                            <td><input type="radio" name="Accuracy" value="average"> </td>
                            <td><input type="radio" name="Accuracy" value="belowavg"> </td>
                            <td></td>
                           
                            </tr>
                                 
                            <tr>
                            <td>Ability to work under pressure</td>
                            <td><input type="radio" name="pressure" value="aboveavg"> </td>
                            <td><input type="radio" name="pressure" value="average"> </td>
                            <td><input type="radio" name="pressure" value="belowavg"> </td>
                            <td></td>
                           
                            </tr>
                           
                            </table>
                            
                            
                            
                            
                            
                                <div class='form-group'>
								<label><b>List positive personal characteristics (Business Acumen, Vigor, Adaptability, Teamwork, Leadership, Confidence, etc.)</b></label>
								<textarea class='form-control' name='bcomment'></textarea><br>
								
							</div>
                            
                                <div class='form-group'>
								<label><b>List personal characteristics that will help the student in his/her professional development</b></label>
								<textarea class='form-control' name='bcomment'></textarea><br>
								
							</div>
                            
                                <div class='form-group'>
								<label><b>How effective has the Internship Program been in meeting the needs of your organization?</b></label>
								<textarea class='form-control' name='bcomment'></textarea><br>
								
							</div>
                            
                                   <div class='form-group'>
								<label><b>Please suggest ways you feel we could make our program more meaningful to the student and you, the employer.</b></label>
								<textarea class='form-control' name='bcomment'></textarea><br>
								
							</div>
                            
                                   <div class='form-group'>
								<label><b>Please comment on the appropriateness of the student's academic training as it related to a position in your organization.</b></label>
								<textarea class='form-control' name='bcomment'></textarea><br>
								
							</div>
                            
                            
                                          <div class='form-group'>
								<label><b>Any other comments about the student or on the Faculty Advisor:.</b></label>
								       <textarea class='form-control' name='bcomment'></textarea><br>         
								
							</div>
                            
                            
                                    <div class='form-group'>
								<label><b>Overrall Student performance </b></label>
								<input type="checkbox" name="performance " value=" Outstanding">  Outstanding<br>
                                 <input type="checkbox" name="performance" value="Very Good"> Very Good<br>
                                  <input type="checkbox" name="performance " value=" good">  good<br>
                                 <input type="checkbox" name="performance" value="Marginal"> Marginal<br>
                                 <input type="checkbox" name="performance" value="Unsatisfactory"> Unsatisfactory<br>      
								
							</div>
                            
                            <div class='form-group'>
								<label><b>External supervisor name</b></label>
								<input class='form-control' name='name' placeholder='Enter external supervisor name' type='text'>
							</div>
                            
                            <div class='form-group'>
								<label><b>Date</b></label>
								<input class='form-control' name='date' placeholder=' Enter Date' type='text'>
							</div>
                            
						
					
							<button type='submit' class='btn btn-primary' name='submitStudent'>Submit</button>
						</fieldset>
					</form>
					
        </div>
		
		
        <!--End main section-->

    </div>
</div>
</section>

    <!--Include Footer from another file-->
<?php include('inc/footer.php')?>

