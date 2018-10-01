
<!--Include header and Nav bar from another file-->
<?php include('inc/header.php')?>
<?php include('inc/navbar.php')?>

<section id="users">
    <div class="container">
        <div class="row">

            <!--Start sidebar section-->
            <div class="col col-md-3 col-lg-3 text-center">
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo Session::get('photo')?>" alt="" class="img-fluid rounded-circle w-50 mb-1">
                        <h4><?php echo Session::get('adminName')?></h4>
                        <h5 class="text-muted"><?php echo Session::get('role')?></h5>
                        <div class="list-group">
                            <a href="index.php" class="list-group-item list-group-item-action active">Home</a>
                            <a href="addFaculties.php" class="list-group-item list-group-item-action">Add Faculties</a>
                            <a href="addUniversity.php" class="list-group-item list-group-item-action">Add Universities</a>
                            <a href="signup_request.php" class="list-group-item list-group-item-action">Signup requests</a>

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
                                <i class="fa fa-building fa-3x"></i>
                                <h3 class="text-uppercase">Faculties</h3>
                                <h1></h1>
                            </div>
                        </div>
                    </div>

                    <!--Display Student count-->
                    <div class="col-md-4 text-center">
                        <div class="card students">
                            <div class="card-body">
                                <i class="fa fa-user fa-3x"></i>
                                <h3 class="text-uppercase">Students</h3>
                                <h1></h1>
                            </div>
                        </div>
                    </div>

                    <!--Display Universities count-->
                    <div class="col-md-4 text-center">
                        <div class="card universities">
                            <div class="card-body">
                                <i class="fa fa-users fa-3x"></i>
                                <h3 class="text-uppercase">Universites</h3>
                                <h1></h1>
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
