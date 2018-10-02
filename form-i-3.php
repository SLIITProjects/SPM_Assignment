<!--Include header from another file-->
<?php include('inc/header.php'); ?>

<style>

</style>
<script>
    $(function() {
    $( "#datepicker" ).datepicker();
    });
    </script>

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
                        <<h4><?php echo Session::get('name');?></h4>
                        <h5 class="text-muted"><?php echo Session::get('role');?></h5>
                        <div class="list-group">
                            <a href="index.php" class="list-group-item list-group-item-action">Home</a>
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
                                echo '<span class="badge badge-success ml-3"><b>'.$count.'</b></span>';
                                ?>
                            </a>
                            <a href="form-i-3.php" class="list-group-item list-group-item-action active" style="<?php if(Session::get('role')!="STD"){echo "display:none";}?>">Form I-3</a>
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
                            <h2><b>Form I-3</b></h2></br>
							<h4><b>Intern's Daily Diary</b></h4>
                        </div>
                    </div>

				

					
					<!--Form filled by student-->	
					<form name='form-i-3-student' method='POST' action=' '>


					<?php
						///
						include('DBConnection-I-3.php');
						
						$StdID=$_SERVER['QUERY_STRING'];
						$uid=$_SESSION["uid"];

						$sql="SELECT * FROM users  WHERE uid='$uid'";
						$result=mysqli_query($con,$sql);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
							$StudentId	= $row["studentId"];
								$address= $row["address"];
								$contact= $row["contact"];
								$email= $row["email"];
								//$address= $row["studentId"];
							}
						} else {
							echo "0 results";
						}

						// if (!$result)
						// {	
						// 	die(mysqli_error($con));	
						// }
						
						// while($row=mysqli_fetch_array($result))
						// {
						// 	echo "<div>".$result['studentId'];
							
							
							
						// }
					?>
					
						<fieldset>

							<div>
							<div class ="jumbotron">
							<h4 style="text-align:center"><b>Intern's Information</b></h4>
							<hr>
							<div class='row'>
							<div class='col'>
								<?php echo " <label><b>Intern's Name-:".$_SESSION["name"]."</b></label>";
								?>
								
															</div>

								<div class='col'>

								

								<?php echo " <label><b>Student ID-:".$StudentId."</b></label>";
								?>

								
								</div>
								<div class='col'>

								

									<?php echo " <label><b>Intern's Private Address-:".$address."</b></label>";
								?>
							
								</div>
								</div>
								<div class='row'>
								<div class='col'>
								<?php echo " <label><b>Contact Number-:".$contact."</b></label>";
								?>
								
								</div>
								<div class='col'>
								<?php echo " <label><b>Email-:".$email."</b></label>";
								?>
								
								</div>
								<div class='col'>
								<!-- <label><b>Address-:{{Address}}</b></label> -->
								<br>
								<br>
								<button type="submit" class="btn btn-secondary pull-right btn-sm" formaction="/SPM/SPM_Assignment/student_register.php" target="blank" >Edit Details</button>
								</div>
								
								</div>


								
							</div>
							
							<div class ="jumbotron">


<?php
     					 $start="";
						$end="";
						$company="";
						$supname="";

						///
						include('DBConnection-I-3.php');
						
//$StdID=$_SERVER['QUERY_STRING'];
						$uid=$_SESSION["uid"];
                        $StudentId="$StudentId";
						$sql2="SELECT * FROM form1_supervisor  WHERE stdID='$StudentId'";
						$result=mysqli_query($con,$sql2);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								// $StudentId= $row["studentId"];
								// $address= $row["address"];
								// $contact= $row["contact"];
								// $email= $row["email"];
								//$address= $row["studentId"];
								$start=$row["internship_sDate"];
								$end=$row["internship_eDate"];
                                $company=$row['employer_name'];
                                $supname=$row["sup_name"];


							}
						} else {
							echo "0 results";
						}

					?>
					



							<h4 style="text-align:center"><b>Internship Information</b></h4>
							<hr>

							<div class="row">
							<div class="col"><?php echo " <label><b>Internship Title-:Intern</b></label>";?></div>

						    <div class="col"><?php echo " <label><b>Company-:".$company."</b></label>";?></div>

							</div>

							<div class="row">

							<div class="col"><?php echo " <label><b>Overall internship period from-:".$start."</b></label>";?></div>

							<div class="col"><?php echo " <label><b>Overall internship period to-:".$end."</b></label>";?></div>

							</div>
</div>



<div class ="jumbotron">


<h4 style="text-align:center"><b>Internal Training Information</b></h4>


<div class='form-group'>
								<label><b>Select the Month</b></label>
							
								<select class="form-control"id="month"name="month" onchange="myFunction(this.value)">
  <option value="1"><b>1st Month</b></option>
  <option value="2"><b>2nd Month</b></option>
  <option value="3"><b>3rd Month</b></option>
  <option value="4"><b>4th Month</b></option>
  <option value="5"><b>5th Month</b></option>

  <option value="6"><b>6th Month</b></option>

</select>	

<script>
function myFunction(val) {

	<?php
	
	$detailsnew='';
	include('DBConnection-I-3.php');
						
	//	$StdID=$_SERVER['QUERY_STRING'];
		$uid=$_SESSION["uid"];

		$month=$_POST['month'];

		$sql="SELECT * FROM i3_details  WHERE studentId='$StudentId' and month='$month'";
		$result=mysqli_query($con,$sql);
		if ($result->num_rows > 0) {

			$detailsnew=$row['details'];
			
			

			//echo"<script>alert('Form I-3 for ".$month." has been already submited to supervisor ,try update option')</script>";

		}


		
		
		?>
            var s = document.getElementsByName("traingParty1");
            s.value = "new value";
		
    //alert("The input value has changed. The new value is: " + val);
}
</script>
							
							</div>
<br>
<br>


					
								
							


							<hr>


     <table class="table table-striped ">
                           
						   <tr>
							   <th scope="col"><b>#Day</b></th>
							   <th scope="col"><b>TrainingParty</b></th>
							   <th scope="col"><b>TrainingDescription</b></th>
							   <th scope="col"><b>From</b></th>
							   <th scope="col"><b>To</b></th>
						   </tr>
						   </thead>
						   <tbody>
						   <?php


							 
							//array();
  

						  	  $i=1;
								   while($i<21){
								// array	(
								// 		array($trainingParty.$i,$TrainingDescription.$i,$From.$i,$to.$i)
										
								// 		);
									   
							// 								<th>Training Party</th>
							// <th>Training Description</th> 
							// <th>From:</input></th>
							// <th>to</th>
							// <th>Action</th>

							$trainingParty="traingParty".$i;
							$TrainingDescription="TrainingDescription".$i;
							$From="From".$i;
							$to="to".$i;


									   echo " <tr> <td ><b>$i</b></td><td ><input type='textarea'name='$trainingParty'></input></td>   <td><input type='textarea'name='$TrainingDescription'></input></td>    <td ><input type='date'name='$From'></input></td>  <td ><input type='date'name='$to'></input></td>   </tr>";
									   
									   $i++;
									
									}
									//$details=$array
						   ?>
						
						   </tbody>
					   </table>



  <br>
 



  <!-- <br>
 <button type="button" class="btn btn-primary pull-right btn-sm" onclick="addRow();">Add New Record</button> -->

        
  


<div class="jumbotron">



	<div class='form-group'>
								<label><b>Summary of Key Tasks Completed For The {{Month}} {{Year}}</b></label>
								<textarea class="form-control" id="summary" name="summary" rows="5"></textarea>
							</div>






	<div class='form-group'>
								<label><b>Details of the works,Problems</b></label>
								<textarea class="form-control" id="problems" rows="5" name="problems"></textarea>
							</div>




</div>

<div class="row">
<div class="col"style="text-align:right">
<button type='submit' class='btn btn-primary' name='submitI3'>Submit</button></div>
<div class="col"style="text-align:center">
<button type='submit' class='btn btn-default' name='updateI3'>Update</button></div>
<div class="col"style="text-align:left">

<button type='reset' class='btn btn-danger' name='resetI3'>Reset</button></div>
</div>
</form>
</div>


			
					
						
					
					
        </div>
		
		
        <!--End main section-->

    </div>
</div>
</section>




<?php
include('DBConnection-I-3.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['submitI3']))
	{

	

		 $summary=$_POST['summary'];
		 $problems=$_POST['problems'];
		 $month=$_POST['month'];
	
				$supervisor;
			// $stdId=Session::get('uid');






			
			$sql="SELECT * FROM users WHERE uid=$uid";
			$result=mysqli_query($con,$sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					
					$supervisor=$row["supervisor"];
					
					//$address= $row["studentId"];
				}
			} else {
				echo "0 results";
			}

				
			
			
				

				//$trainingParty=$_POST['traingParty'.$i];
//$summary=$_POST['summary'];
				//$myObj->name= $trainingParty;
				

			   $myArr = array(
				   
				
				array(1,$_POST['traingParty1'],$_POST['TrainingDescription1'],$_POST['From1'],$_POST['to1']),
				array(2,$_POST['traingParty2'],$_POST['TrainingDescription2'],$_POST['From2'],$_POST['to2']),
				array(3,$_POST['traingParty3'],$_POST['TrainingDescription3'],$_POST['From3'],$_POST['to3']),
				array(4,$_POST['traingParty4'],$_POST['TrainingDescription4'],$_POST['From4'],$_POST['to4']),
				array(5,$_POST['traingParty5'],$_POST['TrainingDescription5'],$_POST['From5'],$_POST['to5']),
				array(6,$_POST['traingParty6'],$_POST['TrainingDescription6'],$_POST['From6'],$_POST['to6']),
				array(7,$_POST['traingParty7'],$_POST['TrainingDescription7'],$_POST['From7'],$_POST['to7']),
				array(8,$_POST['traingParty8'],$_POST['TrainingDescription8'],$_POST['From8'],$_POST['to8']),
				array(9,$_POST['traingParty9'],$_POST['TrainingDescription9'],$_POST['From9'],$_POST['to9']),

				array(10,$_POST['traingParty10'],$_POST['TrainingDescription10'],$_POST['From10'],$_POST['to10']),
				array(11,$_POST['traingParty11'],$_POST['TrainingDescription11'],$_POST['From11'],$_POST['to11']),
				array(12,$_POST['traingParty12'],$_POST['TrainingDescription12'],$_POST['From12'],$_POST['to12']),
				array(13,$_POST['traingParty13'],$_POST['TrainingDescription13'],$_POST['From13'],$_POST['to13']),
				array(14,$_POST['traingParty14'],$_POST['TrainingDescription14'],$_POST['From14'],$_POST['to14']),
				array(15,$_POST['traingParty15'],$_POST['TrainingDescription15'],$_POST['From15'],$_POST['to15']),
				array(16,$_POST['traingParty16'],$_POST['TrainingDescription16'],$_POST['From16'],$_POST['to16']),
				array(17,$_POST['traingParty17'],$_POST['TrainingDescription17'],$_POST['From17'],$_POST['to17']),
				array(18,$_POST['traingParty18'],$_POST['TrainingDescription18'],$_POST['From18'],$_POST['to18']),
				array(19,$_POST['traingParty19'],$_POST['TrainingDescription19'],$_POST['From19'],$_POST['to19']),
				array(20,$_POST['traingParty20'],$_POST['TrainingDescription20'],$_POST['From20'],$_POST['to20'])

			
			
			
			);

			   
				

				$details = json_encode($myArr);
					//$myJSON = json_encode($myObj);

			

	

			//$details = json_encode($myObj);

			
		
			$Time=" ";




			

//$sql="INSERT INTO form1_student_details(stdID, address, homePhn, mobilePhn, email, year, semester, cgpa, requested_date, supervisor) VALUES('$sid', '$address', '$hphn', '$mphn', '$email', '$year', '$sem', '$cgpa', '$date',$supervisor)";

		 	//$sql1="INSERT INTO form-i-3(studentId, supervisor, details, summary, problems, month) VALUES('$StudentId', '$supervisor','$details','$summary','$problems','$month')";
	$sql1="INSERT INTO i3_details(studentId,supervisor,problems,details,summary,month) VALUES('$StudentId','$supervisor','$problems','$details','$summary','$month')";
		
		// 	if (!mysqli_query($con,$sql1)) 
		// 	{
		// 		die('Error: ' . mysqli_error($con));
		// 	}

		// 	echo"<script>alert('form I-3 sent to supervisor')</script>";	
		// 	mysqli_close($con);
		include('DBConnection-I-3.php');
						
	//	$StdID=$_SERVER['QUERY_STRING'];
		$uid=$_SESSION["uid"];

		$month=$_POST['month'];

		$sql="SELECT * FROM i3_details  WHERE studentId='$StudentId' and month='$month'";
		$result=mysqli_query($con,$sql);
		if ($result->num_rows > 0) {

			echo"<script>alert('Form I-3 for ".$month." has been already submited to supervisor ,try update option')</script>";

			// output data of each row
			// while($row = $result->fetch_assoc()) {
			// // $StudentId	= $row["studentId"];
			// // 	$address= $row["address"];
			// // 	$contact= $row["contact"];
			// // 	$email= $row["email"];
			// 	//$address= $row["studentId"];
			// }
		} 


		

		else if ($con->query($sql1) === TRUE) {
			echo"<script>alert('Form I-3 for ".$month." has been successfully sent to supervisor')</script>";
		} else {
			echo "Error: " . $sql1 . "<br>" . $con->error;
		}


		}
	}


	////Update start



	
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['updateI3']))
	{

	

		 $summary=$_POST['summary'];
		 $problems=$_POST['problems'];
		 $month=$_POST['month'];
	
				$supervisor;
			// $stdId=Session::get('uid');






			
			$sql="SELECT * FROM users WHERE uid=$uid";
			$result=mysqli_query($con,$sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					
					$supervisor=$row["supervisor"];
					
					//$address= $row["studentId"];
				}
			} else {
				echo "0 results";
			}

				
			
			
				

				//$trainingParty=$_POST['traingParty'.$i];
//$summary=$_POST['summary'];
				//$myObj->name= $trainingParty;
				

			   $myArr = array(
				   
				
				array(1,$_POST['traingParty1'],$_POST['TrainingDescription1'],$_POST['From1'],$_POST['to1']),
				array(2,$_POST['traingParty2'],$_POST['TrainingDescription2'],$_POST['From2'],$_POST['to2']),
				array(3,$_POST['traingParty3'],$_POST['TrainingDescription3'],$_POST['From3'],$_POST['to3']),
				array(4,$_POST['traingParty4'],$_POST['TrainingDescription4'],$_POST['From4'],$_POST['to4']),
				array(5,$_POST['traingParty5'],$_POST['TrainingDescription5'],$_POST['From5'],$_POST['to5']),
				array(6,$_POST['traingParty6'],$_POST['TrainingDescription6'],$_POST['From6'],$_POST['to6']),
				array(7,$_POST['traingParty7'],$_POST['TrainingDescription7'],$_POST['From7'],$_POST['to7']),
				array(8,$_POST['traingParty8'],$_POST['TrainingDescription8'],$_POST['From8'],$_POST['to8']),
				array(9,$_POST['traingParty9'],$_POST['TrainingDescription9'],$_POST['From9'],$_POST['to9']),

				array(10,$_POST['traingParty10'],$_POST['TrainingDescription10'],$_POST['From10'],$_POST['to10']),
				array(11,$_POST['traingParty11'],$_POST['TrainingDescription11'],$_POST['From11'],$_POST['to11']),
				array(12,$_POST['traingParty12'],$_POST['TrainingDescription12'],$_POST['From12'],$_POST['to12']),
				array(13,$_POST['traingParty13'],$_POST['TrainingDescription13'],$_POST['From13'],$_POST['to13']),
				array(14,$_POST['traingParty14'],$_POST['TrainingDescription14'],$_POST['From14'],$_POST['to14']),
				array(15,$_POST['traingParty15'],$_POST['TrainingDescription15'],$_POST['From15'],$_POST['to15']),
				array(16,$_POST['traingParty16'],$_POST['TrainingDescription16'],$_POST['From16'],$_POST['to16']),
				array(17,$_POST['traingParty17'],$_POST['TrainingDescription17'],$_POST['From17'],$_POST['to17']),
				array(18,$_POST['traingParty18'],$_POST['TrainingDescription18'],$_POST['From18'],$_POST['to18']),
				array(19,$_POST['traingParty19'],$_POST['TrainingDescription19'],$_POST['From19'],$_POST['to19']),
				array(20,$_POST['traingParty20'],$_POST['TrainingDescription20'],$_POST['From20'],$_POST['to20'])

			
			
			
			);

			   
				

				$details = json_encode($myArr);
					//$myJSON = json_encode($myObj);

			

	

			//$details = json_encode($myObj);

			
		
			$Time=" ";




			

//$sql="INSERT INTO form1_student_details(stdID, address, homePhn, mobilePhn, email, year, semester, cgpa, requested_date, supervisor) VALUES('$sid', '$address', '$hphn', '$mphn', '$email', '$year', '$sem', '$cgpa', '$date',$supervisor)";

			 

$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

//$sql1="INSERT INTO form-i-3(studentId, supervisor, details, summary, problems, month) VALUES('$StudentId', '$supervisor','$details','$summary','$problems','$month')";
	$sql1="UPDATE i3_details set supervisor='$supervisor',problems='$problems',details='$details',summary='$summary' where studentId='$StudentId'and month='$month'";
	
	// " VALUES('$StudentId','$supervisor','$problems','$details','$summary','$month')";
		
		// 	if (!mysqli_query($con,$sql1)) 
		// 	{
		// 		die('Error: ' . mysqli_error($con));
		// 	}

		// 	echo"<script>alert('form I-3 sent to supervisor')</script>";	
		// 	mysqli_close($con);
	//	include('DBConnection-I-3.php');
						
	//	$StdID=$_SERVER['QUERY_STRING'];
		

	    if ($con->query($sql1) === TRUE) {
			echo"<script>alert('Form I-3 for ".$month." has been successfully updated')</script>";
		} else {
			echo "Error: " . $sql1 . "<br>" . $con->error;
		}


		}
	}











	///end of update















?>

<!--Include Footer from another file-->
<?php include('inc/footer.php')?>