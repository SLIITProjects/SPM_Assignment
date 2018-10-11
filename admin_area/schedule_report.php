<!--Include header from another file-->
<?php include('inc/header.php'); ?>

<style>

</style>

<!--Include DB connection from another file-->



<!--Include Navbar from another file-->
<?php include('inc/navbar.php')?>

<section id="authors" class="">
<div class="container-fluid">
    <div class="row">

        <!--Start Sidebar section-->
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
                        <a href="schedule_report.php" class="list-group-item list-group-item-action active" >Schedule Report</a>
                        <a href="form_I-7.php" class="list-group-item list-group-item-action" >Form I-7</a>
                        <a href="getPerformances.php" class="list-group-item list-group-item-action" ">Performance</a>
                        <a href="Performance_SummaryReport.php" class="list-group-item list-group-item-action" >Performance Summary Report </a>
                    </div>
                </div>
            </div>
        </div>
        <!--End Sidebar Section-->
        <script src="js/print button.js"></script>
        <!--Start Main section-->
        <body class="as">
        <div class="col col-md-9 col-lg-9">
                    <!--<div class="jumbotron jumbotron-fluid text-center welcome">
                        <div class="container">
                            <h1 class="display-4">Welcome!!!</h1>
                        </div>
                    </div>-->
        
        <!--End main section-->
        <div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Viva Schedule Report</h3>
    <div class="card-body">
    <div id="table" class="table-editable">
            <!--<span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a></span>-->

            
			
            <table class="table table-bordered table-responsive-md table-striped text-center" >
                <tr>
                    <th class="text-center">Registration No</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Company Name</th>
                    <th class="text-center">Start Date</th>
                    <th class="text-center">End Date</th>
                    <th class="text-center">Viva Date </th> 
                    <th class="text-center">Time </th>    
                </tr>
                
                <?php
                 $count=1;
                $data = $manager->getSchedule();
                if($data){
                    while($rows=$data->fetch_assoc())
                    {
                 ?>
                <tr>

                <td class="pt-3-half" contenteditable="true" > <?php echo $rows['Reg_no']; ?> </td>
                <td class="pt-3-half" contenteditable="true"><?php echo $rows['Name']; ?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $rows['Company']; ?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $rows['Start_date']; ?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $rows['End_date']; ?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $rows['Viva_date']; ?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $rows['Time']; ?></td>
                
                </tr>


                <?php
                
                }}
                ?>
                     
        </table>

        
        </div>
    </div>
</div>
<br>
<div>

             <button class="btn btn-primary hidden-print" style="float:right;"
                     onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="false"></span> Print</button>
      
</div>
</body>



        



    </div>
</div>
</section>

<!--Include Footer from another file-->
<?php include('inc/footer.php')?>