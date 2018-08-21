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
                <!--Start user registration section-->
                <div class="col-lg-12 text-center py-5">
                    <div class="container">
                    <h2 class="display-5 pt-2 text-white">Company Registration</h2>
                        <div class="row justify-content-center">

                                    <form class="mt-3" action="register.php" method="post">
                                        <div class="form-group">
                                            <div class="input-group ">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="text" class="form-control" name="name" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                                    <select class="form-control" name="role">
                                                        <option value="">Select Field</option>
                                                    </select>
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