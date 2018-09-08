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
                        <img src="img/mlogo.png" alt="" class="img-fluid rounded-circle w-50 mb-1">
                        <h4>Rajitha lakshan</h4>
                        <h5 class="text-muted">Student</h5>
                        <div class="list-group">
						<a href="index.php" class="list-group-item list-group-item-action active">Home</a>
                            <a href="register_supervisor.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="CMP"){echo "display:none";}?>">Register Supervisor</a>
                            <a href="student_list.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="CMP"){echo "display:none";}?>">Allocate Supervisor</a>
                            <a href="form-i-3.php" class="list-group-item list-group-item-action">Form I-3</a>
                            <a href="form-i-3-supervisor.php" class="list-group-item list-group-item-action">Certify And Email Form I-3</a>
                            <a href="grade.php" class="list-group-item list-group-item-action">Grading-From</a>
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
                        $StudentId="IT12345678";
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
							
								<select class="form-control"id="month"name="month">
  <option value="1"><b>1st Month</b></option>
  <option value="2"><b>2nd Month</b></option>
  <option value="3"><b>3rd Month</b></option>
  <option value="4"><b>4th Month</b></option>
  <option value="5"><b>5th Month</b></option>

  <option value="6"><b>6th Month</b></option>

</select>	
							
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


<!--   
//    $(document).ready(function(){
//         $('#data').after('<div id="nav"></div>');
//         var rowsShown = 10;
//         var rowsTotal = $('#data tbody tr').length;
//         var numPages = rowsTotal/rowsShown;
//         for(i = 0;i < numPages;i++) {
//             var pageNum = i + 1;
//             $('#nav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
//         }
//         $('#data tbody tr').hide();
//         $('#data tbody tr').slice(0, rowsShown).show();
//         $('#nav a:first').addClass('active');
//         $('#nav a').bind('click', function(){

//             $('#nav a').removeClass('active');
//             $(this).addClass('active');
//             var currPage = $(this).attr('rel');
//             var startItem = currPage * rowsShown;
//             var endItem = startItem + rowsShown;
//             $('#data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
//                     css('display','table-row').animate({opacity:1}, 300);
//         });
//     });
	
	
	
// 	</script> -->
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

<button type='submit' class='btn btn-primary' name='submitI3'>Submit</button>
<button type='reset' class='btn btn-danger' name='resetI3'>Reset</button>
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




			$myObj->name = "John";
			$myObj->age = 30;
			$myObj->city = "New York";
			
			$details= json_encode($myObj);
			
			
			// array();
  

			// $i=1;
			//     while($i<21){
			//  array	(
			// 		array($trainingParty.$i,$TrainingDescription.$i,$From.$i,$to.$i)
					
			// 		);
		
			// 	}


			
			
			// $sql="SELECT supervisor FROM users WHERE uid=$StudentId";
			// $result= mysqli_query($con,$sql);
			// $row=mysqli_fetch_array($result);
			// //mixed mysqli_fetch_array ( mysqli_result $result [int $resulttype = MYSQLI_BOTH ] );
			// $supervisor=$row[0];


			// $trainingParty="traingParty".$i;
			// $TrainingDescription="TrainingDescription".$i;
			// $From="From".$i;
			// $to="to".$i;

			

		

			// $Title=" ";
			// $Price=" ";
			// $Number=" ";

			// $details = array( 
				
			// 	array( Title => "rose", 
            //           Price => 1.25,
            //           Number => 15 
            //         ),
            //    array( Title => "daisy", 
            //           Price => 0.75,
            //           Number => 25,
            //         ),
            //    array( Title => "orchid", 
            //           Price => 1.15,
            //           Number => 7 
            //         )
            //  );

			// for ($row = 1; $row < 21; $row++) {
				// echo "<p><b>Row number $row</b></p>";
				// echo "<ul>";
			// 	$day=$row;
			// 	for ($col = 1; $col < 5; $col++) {
			// 		$trainingParty="traingParty".$row;
			// 		$TrainingDescription="TrainingDescription".$row;
			// 		$From="From".$row;
			// 		$to="to".$row;

			// 	  echo "<li>".$details[$day][$trainingParty][$TrainingDescription][$From][$to]."</li>";
			// 	}
			// 	echo "</ul>";
			//   }
			
		
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

		if ($con->query($sql1) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql1 . "<br>" . $con->error;
		}


		}
	}

?>

<!--Include Footer from another file-->
<?php include('inc/footer.php')?>