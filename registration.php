<!--Include header from another file-->
<?php include('inc/header.php'); ?>

<!--Start inline stylesheet-->
<style>
    body{
        margin-top: 50px;
    }
    .register{
        margin-top:60px;
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
<section id="showcase" class="my-5 text-center">
    <div class="primary-overlay">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="info-header mb-5 register">
                    <h1 class="text-white pb-3">Register Now!</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <img src="img/student.png" alt="" class="img-fluid rounded-circle w-50 mb-3">
                        <h3>Student</h3>
                        <p>But most of all aren’t you tired of not getting paid for doing what you really love</p>
                        <div class="d-flex fex-row justify-content-center">
                            <a class="btn btn-success" href="student_register.php">Click here</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <img src="img/company.png" alt="" class="img-fluid rounded-circle w-50 mb-3">
                        <h3>Company</h3>
                        <p>But most of all aren’t you tired of not getting paid for doing what you really love</p>
                        <div class="d-flex fex-row justify-content-center">
                            <a class="btn btn-success">Click here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
