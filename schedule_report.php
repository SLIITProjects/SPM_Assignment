<!--Include header from another file-->
<?php include('inc/header.php'); ?>

<style>

</style>

<!--Include DB connection from another file-->
<?php
    include('DBConnection.php');
    $query="select Reg_no,Name,Company,Start_date,End_date,Viva_date,Time from schedule_tab";
    $result=mysqli_query($con,$query);
?>


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
                            <a href="Schedule.php" class="list-group-item list-group-item-action">Schedule viva</a>
                            <a href="schedule_report.php" class="list-group-item list-group-item-action">Generate Report</a>
                        
                        </div>
                    </div>
                </div>
        </div>
        <!--End Sidebar Section-->

        <!--Start Main section-->
        <div class="col col-md-9 col-lg-9">
                    <!--<div class="jumbotron jumbotron-fluid text-center welcome">
                        <div class="container">
                            <h1 class="display-4">Welcome!!!</h1>
                        </div>
                    </div>-->
        
        <!--End main section-->
        
        



    </div>
</div>
</section>

<!--Include Footer from another file-->
<?php include('inc/footer.php')?>