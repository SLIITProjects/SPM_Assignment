<!--Include header from another file-->
<?php include('inc/header.php'); ?>

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 80%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 10px;
}

tr:nth-child(even) {
    background-color: #BABDEE;
}
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
                        <img src="<?php echo Session::get('photo');?>" alt="" class="img-fluid rounded-circle w-50 mb-1">
                        <h4><?php echo Session::get('name');?></h4>
                        <h5 class="text-muted"><?php echo Session::get('role');?></h5>
                        <div class="list-group">
                            <a href="index.php" class="list-group-item list-group-item-action active">Home</a>
                            <a href="Schedule.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Schedule Viva</a>
                            <a href="schedule_report.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Generate Schedule Report</a>
							<a href="marking_summary.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Marking Summary Form</a>
							<a href="grade.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Grading Form</a>	
                            <a href="form_I-7.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Student Performance Evaluation Form</a>
							<a href="getPerformances.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Get Student Performance</a>	
                      </div>
                    </div>
                </div>
        </div>
      
        <!--End Sidebar Section-->

        <!--Start Main section-->
        <?php
      

          $connect=mysqli_connect("localhost","root","","industrial_training") ;


              $query6="select * from student_performance ";
          $result6=mysqli_query($connect,$query6);

      ?>
       <br><br><br><br><br><div>
        <form action="getPerformances.php" method="post">
      <fieldset> 
      <div class="row" style="padding-top: 20px; padding-left: 20px">
  
        <legend><center><h1>Student Performance</h1></center></legend>
        <div class="form-group col-md-4 col-sm-4">
              <label for="name">Student ID</label>
                 <select class="form-control input-sm" name="stdid" id="stdid">
                <option>-- Select Student ID--</option>
              <?php while($row1=mysqli_fetch_array($result6)):;?>
            <option><?php echo $row1[1];?></option>
              <?php endwhile; ?>
    
              </select>

          </div>
          
        <div class="form-group col-md-4 col-sm-4">
          <button type="submit" name="submit" class="btn btn-primary" style="width: 200px; margin-left: 20px; margin-top: 30px">Search</button>
        </div>
      </fieldset>
    </form>

     <?php

      

if(isset($_POST['submit'])) {

  $stdid = ($_POST['stdid']);


  if (empty($stdid)) {
        echo '<center><div class="alert alert-danger" role="alert" style="width: 71%; position: absolute">Please enter valid student ID!</div></center>';
     
     }

     else {

      $sql = "SELECT Student_name,Email,Degree_title,Specialisation,Intern_duration,No_of_credits,Intern_title,Grade,Date FROM student_performance WHERE IT_number='$stdid' LIMIT 1";


         $result = $db->select($sql);

         if ($result->num_rows > 0) {
         echo "<table><tr><th>Student Name</th><th>Email</th><th>Degree Title </th><th>Specialisation</th><th>Internship Duration</th><th>No Of Credits</th>
      <th>Internship Title</th><th>Grade</th><th>Date</th></tr>";
          // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>". $row["Student_name"]. "</td><td>". $row["Email"]. "</td><td>" . 
          $row["Degree_title"]. "</td><td>". $row["Specialisation"] . "</td><td>" . $row["Intern_duration"]."</td><td>" . $row["No_of_credits"] . 
          "</td><td>" . $row["Intern_title"] . "</td><td>" . $row["Grade"] ."</td><td>". $row["Date"] ;

        }
        echo "</table>";
      }
      else {
          echo "<b>No  Records are found!</b>";
      }

}

}
?>
        <!--End main section-->

    </div>
</div>
</section>

<!--Include Footer from another file-->
<?php include('inc/footer.php')?>