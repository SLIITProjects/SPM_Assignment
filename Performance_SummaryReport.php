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
                            <a href="getPerformances.php" class="list-group-item list-group-item-action active" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Performance</a>
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
        <div class="content-wrapper">

                <div class="container-fluid">
            <div class="panel panel-primary">
            
      
          <form action="Performance_SummaryReport.php" method="post">
            
            <div class="text-center">
                <h3 style="color:#2C3E50">Student Performances Report</h3>
              
        
         <div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-tasks"></span></span>
                    <select class="form-control" name="a">
          <option value="D0" selected="">Select Time</option>
                                    <option value="Daily">Daily report</option>
                                    <option value="Weekly">Weekly report</option>
                                   
                                </select></div>      
                                <div class="customer">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        <input type="date" class="form-control" placeholder="Date" name="day">
                                    </div>
                                </div>                   
                                 
                                <br>
        <button type="submit" name="vieww" class="btn btn-primary">View</button><br><br><br>
        </div>
                    </div>
            
            </div>
             
                    </div>         </form>
                   
                     <table class="table table-bordered table-responsive-md table-striped text-center width=50"  >
                <tr>
                <th class='text-center' width='150px'>IT_number</th>
                <th class='text-center' width='150px'>Student_name</th><th class='text-center' width='115px'>Employee_name</th>
                <th class='text-center' width='150px'>Supervisor_name</th><th class='text-center' width='115px'>Degree_title</th>
                <th class='text-center' width='150px'>Intern_duration</th>
                <th class='text-center' width='150px'>Specialisation</th><th class='text-center' width='115px'>No_of_credits</th>
                <th class='text-center' width='115px'>Grade</th><th class='text-center' width='115px'>Date</th>
                </tr>
                
        <?php
        $count=0;

        $connect=mysqli_connect("localhost","root","toor","itms");
         if(isset($_POST['vieww']))
                
            {
            
            if($_POST["a"]=="Daily"){
            $valq=$_POST['day'];
                $sql = $que="SELECT IT_number,Student_name,Employee_name,Supervisor_name,Degree_title,Intern_duration,Specialisation,No_of_credits,Grade,Date FROM student_performance where Date='$valq' LIMIT 1";
            }

            elseif($_POST["a"]=="Weekly"){
            

                $sql = "SELECT IT_number,Student_name,Employee_name,Supervisor_name,Degree_title,Intern_duration,Specialisation,No_of_credits,Grade,Date FROM student_performance WHERE WEEK (Date) = WEEK( current_date ) - 1 AND YEAR( Date) = YEAR( current_date )";
                
            }
            else{
            $sql = "SELECT IT_number,Student_name,Employee_name,Supervisor_name,Degree_title,Intern_duration,Specialisation,No_of_credits,Grade,Date FROM student_performance ORDER BY Date DESC LIMIT 1";
            }
            
            $result=mysqli_query($connect,$sql);
            $count = mysqli_num_rows($result);
            if(mysqli_num_rows($result)>0) {
               
                //output data of each row
                while($row =mysqli_fetch_array($result)) {
                    echo "<tr><td class='text-center' width='150px'>" . $row["IT_number"]. "</td><td class='text-center'
                     width='150px'>" . $row["Student_name"]. "<td class='text-center' width='150px'> " . $row["Employee_name"].
                      "</td><td class='text-center' width='150px'>" . $row["Supervisor_name"]. "</td><td class='text-center' 
                      width='150px'>" . $row["Degree_title"]. "</td>
                      <td class='text-center' 
                      width='150px'>" . $row["Intern_duration"]. "</td>
                      <td class='text-center' 
                      width='150px'>" . $row["Specialisation"]. "</td>
                      <td class='text-center' 
                      width='150px'>" . $row["No_of_credits"]. "</td>
                      <td class='text-center' 
                      width='150px'>" . $row["Grade"]. "</td>
                      <td class='text-center' 
                      width='150px'>" . $row["Date"]. "</td></tr>";
                }
                echo "</table>";
            } else {
                echo"<script>alert('No records!')</script>"; 
            }

            }
                ?>
                 <div class="panel-body text-align:center">    
 
        
                <div class="text-center">
                        <h4> <label   style="color:#E74C3C" for="Total">Total :</label>               
                            <?php 



                echo $count;

                ?></h4> </div>

                        
                        
                </div>
                         </table>  
        <!--End main section-->

    </div>
</div>
</section>

<!--Include Footer from another file-->
<?php include('inc/footer.php')?>