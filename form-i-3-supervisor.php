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
                        <h4><?php echo Session::get('name');?></h4>
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
                            <a href="form-i-3.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="STD"){echo "display:none";}?>">Form I-3</a>
                            <a href="form5.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="SUP"){echo "display:none";}?>">Form I-5</a>
                            <a href="form_I-7.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Form I-7</a>
                            <a href="getPerformances.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Performance</a>
                            <a href="form-i-3-supervisor.php" class="list-group-item list-group-item-action active" style="<?php if(Session::get('role')!="STD"){echo "display:none";}?>">Certify And Email Form I-3</a>
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
                            <h2>Form I-3-Approval</h2></br>
							<h4>Intern's Daily Diary</h4>
                        </div>
                    </div>
					
					<!--Form filled by student-->	
					<form name='form-i-3-student' method='POST' action='#'>
						<fieldset>

							<div>
							<div class ="jumbotron">
							<h4 style="text-align:center"><b>Intern's Information</b></h4>
							<hr>
							<div class='row'>
							<div class='col'>
								<label><b>Intern's Name-:{{Name}}</b></label>
								</div>

								<div class='col'>
								<label><b>Student ID-:{{ID}}</b></label>
								</div>
								<div class='col'>
								<label><b>Intern's Private Address-:{{Address}}</b></label>
								</div>
								</div>
								<div class='row'>
								<div class='col'>
								<label><b>Contact Number-:{{Num}}</b></label>
								</div>
								<div class='col'>
								<label><b>Email-:{{Email}}</b></label>
								</div>
								<div class='col'>
								<!-- <label><b>Address-:{{Address}}</b></label> -->
								<br>
								<br>
								<button type="button" class="btn btn-secondary pull-right btn-sm">Edit Details</button>
								</div>
								
								</div>


								
							</div>
							
							<div class ="jumbotron">
							<h4 style="text-align:center"><b>Internship Information</b></h4>
							<hr>

							<div class="row">
							<div class="col"><b>Internship Title-:{{title}}</b></div>
							<div class="col"><b>Specialization-:{{Specialization}}</b></div>
							</div>

							<div class="row">
							<div class="col"><b>Overall internship period from-:{{from}}</b></div>
							<div class="col"><b>Overall internship period from-:{{to}}</b></div>
							</div>
</div>



<div class ="jumbotron">

<h4 style="text-align:center"><b>Internal Training Information</b></h4>
							<hr>
							<table style="width:100%" id="data" class="table-striped">
  <tr>
  <th>#</th>
    <th>Training Party</th>
    <th>Training Description</th> 
    <th>From:</input></th>
	<th>to</th>
	<th>Action</th>
  </tr>
  <tr>
  <td>1</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>



<tr>
<td>2</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>

<tr>
<td>3</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>

<tr>
<td>4</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>

<tr>
<td>5</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>

<tr>
<td>6</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>

<tr>
<td>7</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>

<tr>
<td>8</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>

<tr>
<td>9</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>


<tr>
<td>10</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>

<tr>
<td>11</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>

<tr>
<td>12</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>


<tr>
<td>13</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>

<tr>
<td>14</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>

<tr>
<td>15</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>

<tr>
<td>16</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>

<tr>
<td>17</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>


<tr>
<td>18</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>


<tr>
<td>19</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>

<tr>
<td>20</td>
<td><input type="textarea"></input></td>
<td><input type="textarea"></input></td>
<td><input type="date"></input></td>
<td><input type="date"></input></td>
<td>
<button type="button" class="btn btn-primary pull-right btn-sm" ">Update</button><button type="button" class="btn btn-danger pull-right btn-sm" ">Delete</button>
</td>
</tr>
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



</div>
<button type='submit' class='btn btn-primary' name='submitI3'>Submit</button>
<button type='reset' class='btn btn-danger' name='resetI3'>Reset</button>
</div>


			
					
					<!--  -->
                    <!--  -->
					
					
					
        </div>
		
		
        <!--End main section-->

    </div>
</div>
</section>



<!--Include Footer from another file-->
<?php include('inc/footer.php')?>