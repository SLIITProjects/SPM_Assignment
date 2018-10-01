
<?php include('inc/header.php')?>
<?php include('inc/navbar.php')?>

<section id="users">
    <div class="container">
        <div class="row">

            <!--Start Sidebar-->

            <div class="col col-md-3 col-lg-3 text-center">
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo Session::get('photo')?>" alt="" class="img-fluid rounded-circle w-50 mb-1">
                        <h4><?php echo Session::get('adminName')?></h4>
                        <h5 class="text-muted"><?php echo Session::get('role')?></h5>
                        <div class="list-group">
                        <a href="index.php" class="list-group-item list-group-item-action">Home</a>
                            <a href="addFaculties.php" class="list-group-item list-group-item-action">Add Faculties</a>
                            <a href="addUniversity.php" class="list-group-item list-group-item-action active">Add Universities</a>
                            <a href="signup_request.php" class="list-group-item list-group-item-action">Signup requests</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Sidebar-->

            <!--Start Main Section-->
            <div class="col col-md-9 col-lg-9 dashboard">

                <!--Add a University to the System-->

                <div class="card">
                    <div class="card-body">
                        <div class="card-title h5">Add a University</div>
                        <form action="addRoles.php" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="role">Enter University</label>
                                    <input type="text" class="form-control" name="roleName" placeholder="University Name" >
                                </div>
                            </div>
                            <input type="submit" href="#" class="btn btn-success" value="Add">&nbsp;
                            
                        </form>
                    </div>
                </div>

                <br/>

                <!--Display User University in a table-->

                <div class="card">
                    <div class="card-body">
                        <div class="card-title h5">Current Faculties</div>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Faculty Name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!--Get user Universities from the database and display them in a table-->
                           
                            </tbody>
                        </table>
            
                    </div>
                </div>
            </div>

            <!--End Main Section-->

        </div>
    </div>
</section>

<!--Footer Section-->
<?php include('../inc/footer.php')?>