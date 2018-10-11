
<!--Include header and Nav bar from another file-->
<?php include('inc/header.php')?>
<?php include('inc/navbar.php')?>

<section id="users">
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
                            <a href="admin.php" class="list-group-item list-group-item-action active">Home</a>
                            <a href="addFaculties.php" class="list-group-item list-group-item-action">Add Faculties</a>
                            <a href="addUniversity.php" class="list-group-item list-group-item-action">Add Universities</a>
                            <a href="signup_request.php" class="list-group-item list-group-item-action">Signup requests</a>
                            <a href="grade.php" class="list-group-item list-group-item-action" >Grading-From</a>
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

            <!--Start main section-->
            <div class="col col-md-9 col-lg-9 dashboard">

                        <div class="jumbotron jumbotron-fluid text-center welcome">
                            <div class="container">
                                <h1 class="display-4">Welcome to Admin area</h1>
                            </div>
                        </div>

                <br/>

                <div class="row">

                    <!--Display Faculties count-->
                    <div class="col-md-4 text-center">
                        <div class="card faculties">
                            <div class="card-body">
                            <img src="img/faculty.png">
                                <h3 class="text-uppercase">Faculties</h3>
                                <h1><?php
                                    $count = $user->getCount("faculty");
                                    if($count){
                                        $value= $count->fetch_assoc();
                                        echo $value['tCount'];
                                    }
                                    ?></h1>
                            </div>
                        </div>
                    </div>

                    <!--Display Student count-->
                    <div class="col-md-4 text-center">
                        <div class="card students">
                            <div class="card-body">
                            <img src="img/user.png">
                                <h3 class="text-uppercase">Students</h3>
                                <h1><?php
                                    $count = $user->getStudentCount("users");
                                    if($count){
                                        $value= $count->fetch_assoc();
                                        echo $value['tCount'];
                                    }
                                    ?></h1>
                            </div>
                        </div>
                    </div>

                    <!--Display Universities count-->
                    <div class="col-md-4 text-center">
                        <div class="card universities">
                            <div class="card-body">
                            <img src="img/uni.png">
                                <h3 class="text-uppercase">Universites</h3>
                                <h1><?php
                                    $count = $user->getCount("university");
                                    if($count){
                                        $value= $count->fetch_assoc();
                                        echo $value['tCount'];
                                    }
                                    ?></h1>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--End main section-->

        </div>
    </div>
</section>

<!--Footer Section-->
<?php include('../inc/footer.php')?>
