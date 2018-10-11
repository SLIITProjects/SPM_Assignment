<!--Include header from another file-->
<?php include('inc/header.php'); ?>

<style>
</style>

<?php
    $av = new Examiner();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $addPerformance = $av->addPerformance($_POST);
    }
?>

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
                            <a href="marking_summary.php" class="list-group-item list-group-item-action">Marking-Summary-From</a>
                            <a href="Schedule.php" class="list-group-item list-group-item-action" >Schedule</a>
                            <a href="schedule_report.php" class="list-group-item list-group-item-action" >Schedule Report</a>
                            <a href="form_I-7.php" class="list-group-item list-group-item-action  active" >Form I-7</a>
                            <a href="getPerformances.php" class="list-group-item list-group-item-action" ">Performance</a>
                            <a href="Performance_SummaryReport.php" class="list-group-item list-group-item-action" >Performance Summary Report </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End sidebar section-->
        <!--Start Main section-->
		<?php
		
        if(isset($_POST['view1'])){
          $stdid=$_POST['stdid'];
          
		  $connect=mysqli_connect("localhost","root","toor","itms");
		  
		 
		  $query="select Student_Id ,Student_name ,Phone ,Email,Employee_name, Supervisor_name,Degree_title,Sepcialisation , Intern_duration,No_of_credits,
		  Intern_title,Monthly_progress,Report,Viva,Total From student_d where Student_Id='$stdid' LIMIT 1";
          $result=mysqli_query($connect,$query);
          if(mysqli_num_rows($result)>0){
          while($row =mysqli_fetch_array($result)){
            $stdid=$row['Student_Id'];
            $sname=$row['Student_name'];
            $phone=$row['Phone'];
			$email=$row['Email'];
			$ename=$row['Employee_name'];
            $name=$row['Supervisor_name'];
            $dtitle=$row['Degree_title'];
			$spc=$row['Sepcialisation'];
			$internd=$row['Intern_duration'];
            $credit=$row['No_of_credits'];
            $ititle=$row['Intern_title'];
			$monthly=$row['Monthly_progress'];
			$report=$row['Report'];
            $viva=$row['Viva'];
            $total=$row['Total'];
            //$grade=$row['Grade'];
  
          }
        }
        
          mysqli_free_result($result);
          mysqli_close($connect);
        }
        else{
			$stdid="";
            $sname="";
            $phone="";
			$email="";
			$ename="";
            $name="";
            $dtitle="";
			$spc="";
			$internd="";
            $credit="";
            $ititle="";
			$monthly="";
			$report="";
            $viva="";
            $total="";
            $grade="";
        }
		
		$grade="";
		if( $total <=29){
			$grade='E';
		}elseif($total >29 && $total <=30){
			$grade='D';
		}elseif($total >30 && $total <=35){
			$grade='D+';
		}elseif($total >35 && $total <=44){
			$grade='C-';
		}elseif($total >44 && $total <=50){
			$grade='C';
		}elseif($total >50 && $total <=55){
			$grade='C+';
		}elseif($total >55 && $total <=65){
			$grade='B-';
		}elseif($total >65 && $total <=70){
			$grade='B';
		}elseif($total >70 && $total <=75){
			$grade='B+';
		}elseif($total >75 && $total <=80){
			$grade='A-';
		}elseif($total >80 && $total <=85){
			$grade='A';
		}else{
			$grade='A+';
		}
	
	?>

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
								<input class='form-control' name='stdid' placeholder='student IT number' type='text'value="<?php echo $stdid; ?>"><br>
								<button type='submit' class='btn btn-primary' name='view1'>Get details</button>
							</div>
							<div class='form-group'>
								<label><b>Student Name</b></label>
							    <input class='form-control' name='sname' placeholder='student name' type='text'value="<?php echo $sname; ?>">
							</div>	
							<div class='form-group'>
								<label><b>Email</b></label>
								<input class='form-control' name='email' placeholder='student Email' type='text'value="<?php echo $email; ?>">
							</div>
							<div class='form-group'>
								<label><b>Phone Number</b></label>
								<input class='form-control' name='phone' placeholder='student Phone number' type='text'value="<?php echo $phone; ?>">
							</div>
					
							<br><br><br>
							<label><h5><b>EMPLOYEE INFORMATION</b></h5></label><br><br>
							<div class='form-group'>
								<label><b>Employee Name</b></label>

								<input class='form-control' name='ename' placeholder='Employee name' type='text'value="<?php echo $ename; ?>">
							</div>
					         
					         <div class='form-group'>
								<label><b>Supervisor Name</b></label>
								<input class='form-control' name='name' placeholder='supervisor name' type='text'value="<?php echo $name; ?>">


							</div><div></div
							><br><br><br>
							<label><h5><b>ACADAMIC INFORMATION</b></h5></label><br><br>
							<div class='form-group'>
								<label><b>Degree Title</b></label>
							
								<input class='form-control' name='dtitle' placeholder='degree title' type='text'value="<?php echo $dtitle; ?>">
							</div>
							<div class='form-group'>
								<label><b>Specialization</b></label>
							    <input class='form-control' name='spc' placeholder='specialisation' type='text'value="<?php echo $spc; ?>">
							</div>	
							<div class='form-group'>
								<label><b>Internship Duration</b></label>
								<input class='form-control' name='internd' placeholder='internship duration' type='text'value="<?php echo $internd; ?>">
							</div>
							<div class='form-group'>
								<label><b>No Of Credits</b></label>
								<input class='form-control' name='credit' placeholder='no of credits' type='text'value="<?php echo $credit; ?>">
							</div>
							<div class='form-group'>
								<label><b>Internship Title</b></label>
								<input class='form-control' name='ititle' placeholder='internship title' type='text'value="<?php echo $ititle; ?>">

							</div>
							<br><br><br>
							<div class='form-group'>
								<label><b>Comments on how the internship benifited the student</b></label>
								<textarea class='form-control' name='bcomment'></textarea><br>
								
							</div>
							<div class='form-group'>
								<label><b>Monthly progress (30%)</b></label>
								
							    <input class='form-control' name='monthly' placeholder='monthly progress' type='text'value="<?php echo $monthly; ?>">
							</div>	
							<div class='form-group'>
								<label><b>Internship report (30%)</b></label>
								<input class='form-control' name='report' placeholder='internship report' type='text'value="<?php echo $report; ?>">
							</div>
							<div class='form-group'>
								<label><b>Viva (40%)</b></label>
								<input class='form-control' name='viva' placeholder='viva' type='text'value="<?php echo $viva; ?>">
							</div>
							<div class='form-group'>
								<label><b>Total</b></label>
								<input class='form-control' name='total' placeholder='total' type='text'value="<?php echo $total; ?>"><br>
								
							</div>
							<div class='form-group'>
								<label><b>Final Grade</b></label>
								<input class='form-control' name='grade' placeholder='grade' type='text'value="<?php echo $grade; ?>">

							   
							</div>	
							
							<br><br><br>
							<div class='form-group'>
								<label><b>Comments on how the student performed including observations on the report</b></label>
								<textarea class='form-control' name='pcomment'></textarea><br>
								
							</div>
							<div class='form-group'>
								<label><b>Examiner name</b></label>

								<input class='form-control' name='exname' placeholder='examiner name' type='text'>
							</div>
							
							<div class='form-group'>
								<label><b>Date</b></label>
								<input class='form-control' name='date' type='date'value="<?php echo date('Y-m-d');?>">
							</div>
							<button type='submit' class='btn btn-primary' name='submit'>Submit</button>

						</fieldset>
					</form>
					
        </div>
		
		
        <!--End main section-->

    </div>
</div>
</section>



<!--Include Footer from another file-->
<?php include('inc/footer.php')?>
