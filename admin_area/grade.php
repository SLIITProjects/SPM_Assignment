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
                            <a href="grade.php" class="list-group-item list-group-item-action active" >Grading-From</a>
                            <a href="marking_summary.php" class="list-group-item list-group-item-action">Marking-Summary-From</a>
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
                            <h1 class="display-4">Grading Form</h1>
                            </br>
                        </div>
                        <div>

                        <h3 class="text-primary" class="display-5">VIVA | Monthly Progress  | Internship Report</h3>  
                        </div>

                    </div>
                    <form name='formGrade' method='GET' action=' '>
						<fieldset>
							<div class='form-group'>
                       
								<label><b>Select Schedule-Date</b></label>
								<input class='form-control' name='sdate'  type='date'>
                                </div>
                            <button type='submit' class='btn btn-primary' name='getStudent'>Serach</button>
                            </fieldset>
					</form>
                    </br>
                    <table class="table table-hover"  id="table">
  <thead>
    <tr>
    
      <th scope="col">Student-ID</th>
      <th scope="col">Student-Name</th>
     
    </tr>
  </thead>
  <tbody>

  <?php
  include('DBConnection.php');
  if($_SERVER['REQUEST_METHOD']=='GET')
{
	if(isset($_GET['getStudent']))
	{
        $sdate=$_GET['sdate'];
        
 $sql = "SELECT Reg_no, Name FROM schedule_tab where Viva_date=' ". $sdate. " '";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["Reg_no"]. "</td><td>" . $row["Name"] . "</td><td>";
}
echo "</table>";
} else { echo "0 results"; }
$con->close();
    }
}
?>
   
  </tbody>
</table> 
<script>
    
    var table = document.getElementById('table');
    
    for(var i = 1; i < table.rows.length; i++)
    {
        table.rows[i].onclick = function()
        {
             //rIndex = this.rowIndex;
             document.getElementById("sid").value = this.cells[0].innerHTML;
            document.getElementById("sname").value = this.cells[1].innerHTML;
        };
    }

</script>

     <div>
     <h3 class="text-warning"class="display-6" align="center"> Marking Progress </h3>  
     <div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
  <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
  <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
</div>


</div>
 <form name='formGrade1' method='POST' action=' '>
						<fieldset>
							<div class='form-group'>
								<label><b>Student-ID</b></label>
								<input class='form-control' name='sid' id='sid' type='text'>
                                </div>

                         <div class="form-group">
      <label ><b>Student Name<b></label>
      <input class="form-control" id="sname"type="text"  name='sname'>
     
    </div>
    <div class="form-group">
      <label ><b>Viva Marks<b></label>
      <input class="form-control" id="vmark"type="number"  name='vmark' placeholder="(Out Of 40)" min="0" max="40">
     
    </div>

  <div class="form-group">
      <label ><b>Monthly Progress<b></label>
      <input class="form-control" id="mpmark"type="number"  name='mpmark' placeholder="(Out Of 30)"  min="0" max="30">
     
    </div>
                            
    <div class="form-group">
      <label ><b>Internship Report<b></label>
      <input class="form-control" id="irmark"type="number"  name='irmark' placeholder="(Out Of 30)" min="0" max="30">
     
    </div>


                            <button type='submit' class='btn btn-primary' name='submitgrade'>Submit</button>
                            
                            </fieldset>
					</form>

					
        </div>
        </div>
        <!--End main section-->

    </div>
</div>
</section>

<?php
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submitgrade'])){
        $addMarks=$manager->addMarks($_POST);
        }
?>
<!--Include Footer from another file-->
<?php include('inc/footer.php')?>

