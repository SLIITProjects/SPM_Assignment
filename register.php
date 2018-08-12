<!--Include header from another file-->
<?php include('inc/header.php'); ?>

<!--Start inline stylesheet-->
<style>
    body{
        margin-top: 50px;
    }
    .register{
        width:50%;
    }
</style>
<!--End inline stylesheet-->

<!--Start navbar-->
<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand"><img src="img/logo.png" width="50px" height="50px" alt="" class="logo">CloudSchool</a>

        <form class="form-inline">
            <label>Welcome Guest &nbsp; </label>
            <a href="login.php" class="btn btn-primary my-2 my-sm-0" type="submit"> Login</a>
        </form>
    </div>
</nav>
<!--End Navbar-->

<section id="showcase" class="py-5">
    <div class="primary-overlay">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-5 text-center text-white py-5">
                    <img class="img-fluid d-none d-lg-block mt-5" src="img/world.PNG" width="100%" height="60%">
                    <h2 class="display-5 pt-2">
                        Name here
                    </h2>
                    <p class="text-center">
                        <p class="mb-0 h5">CloudSchool is a school management platform where you can manage your day to day school activities easily.</p>
                    </p>
                </div>

                <!--Start user registration section-->
                <div class="col-lg-7 text-center py-5">
                    <div class="container">
                        <div class="row justify-content-center">

                            <h2 class="display-5 pt-2 text-white">Registration</h2>

                                    <form class="mt-3" action="register.php" method="post">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                                <select class="form-control" name="school">
                                                    <option value="">Select School</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-7">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                                    <select class="form-control" name="role">
                                                        <option value="">Select Role</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group ">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="text" class="form-control" name="fullname" placeholder="Full Name">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="input-group ">
                                                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                                    <input type="text" class="form-control" name="nic" placeholder="NIC">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <div class="input-group ">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="date" class="form-control" name="dob" placeholder="DOB">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group ">
                                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                <textarea rows="3" class="form-control" name="address" placeholder="Address"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <div class="input-group ">
                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <div class="input-group ">
                                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                    <input type="password" class="form-control" name="cpassword"  placeholder="Confirm Password">
                                                </div>
                                            </div>

                                        </div>
                                        <br/>
                                        <input type="submit" name="submit" class="btn btn-success btn-lg register" value="Register">
                                    </form>
                        </div>
                        <br/>
                    </div>
                </div>
                <!--End user registration section-->

            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
