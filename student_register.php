<!--Include header from another file-->
<?php include('inc/header.php'); ?>

<!-- Check post request and call registerStudent function in  User Class-->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) || isset($_POST['image'])) {
    $registerStudent = $user-> registerStudent($_POST,$_FILES);
}
?>

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
                    <h2 class="display-5 pt-2 text-white">Student Registration</h2>
                        <div class="row justify-content-center">

                                    <form  autocomplete="off" class="mt-3" action="student_register.php" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-graduation-cap mr-2 mt-2"></i></span>
                                                <select class="form-control" name="university">
                                                    <option value="">Select University</option>
                                                    <?php
                                                        $getUniversity = $university->getUniversities();
                                                        if($getUniversity){
                                                            while($result=$getUniversity->fetch_assoc()){
                                                    ?>
                                                    <option value="<?php echo $result['unid'];?>"><?php echo $result['uname'];?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-graduation-cap mr-2 mt-2"></i></span>
                                                    <select class="form-control" name="company">
                                                        <option value="">Select Company</option>
                                                        <?php
                                                        $getCompany = $user->getCompanies();
                                                        if($getCompany){
                                                            while($result=$getCompany->fetch_assoc()){
                                                    ?>
                                                    <option value="<?php echo $result['uid'];?>"><?php echo $result['name'];?></option>
                                                    <?php }}?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="input-group ">
                                                    <span class="input-group-addon"><i class="fa fa-user mr-2 mt-2"></i></span>
                                                    <select name="year" class="form-control">
                                                        <option>Current year</option>
                                                        <option value="1st Year">1st Year</option>
                                                        <option value="2nd Year">2nd Year</option>
                                                        <option value="3rd Year">3rd Year</option>
                                                        <option value="4th Year">4th Year</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="input-group ">
                                                    <span class="input-group-addon"><i class="fa fa-user mr-2 mt-2"></i></span>
                                                    <select name="sem" class="form-control">
                                                        <option>Current Semester</option>
                                                        <option value="1st Semester">1st Semester</option>
                                                        <option value="2nd Semester">2nd Semester</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group ">
                                                <span class="input-group-addon"><i class="fa fa-user mr-2 mt-2"></i></span>
                                                <input type="text" class="form-control" name="fullname" placeholder="Full Name">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="input-group ">
                                                    <span class="input-group-addon"><i class="fa fa-id-card mr-2 mt-2"></i></span>
                                                    <input type="text" class="form-control" name="studentid" placeholder="Student ID">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-graduation-cap mr-2 mt-2"></i></span>
                                                    <select class="form-control" name="faculty">
                                                        <option value="">Select Faculty</option>
                                                        <?php
                                                        $getFaculty = $faculty->getFaculties();
                                                        if($getFaculty){
                                                            while($result=$getFaculty->fetch_assoc()){
                                                    ?>
                                                    <option value="<?php echo $result['fid'];?>"><?php echo $result['fname'];?></option>
                                                    <?php }}?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-7">
                                                <div class="input-group ">
                                                    <span class="input-group-addon"><i class="fa fa-map-marker mr-2 mt-2"></i></span>
                                                    <textarea rows="2" class="form-control" name="address" placeholder="Address"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-5 mt-5">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-phone mr-2 mt-2"></i></span>
                                                    <input type="text" class="form-control"  name="contact" placeholder="Mobile Number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-envelope mr-2 mt-2"></i></span>
                                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <div class="input-group ">
                                                    <span class="input-group-addon"><i class="fa fa-lock mr-2 mt-2"></i></span>
                                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <div class="input-group ">
                                                    <span class="input-group-addon"><i class="fa fa-lock mr-2 mt-2"></i></span>
                                                    <input type="password" class="form-control" name="cpassword"  placeholder="Confirm Password">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group col-md-5">
                                            <label style="margin-left:-80px;"><b>Upload profile photo</b></label>
                                            <div class="input-group">
                                                <input name="image" type="file"/>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="form-row">
                                        <input type="submit" name="submit" class="btn btn-success btn-lg register" value="Register">
                                        <a href="registration.php" style="margin-left:20px;"type="submit" name="submit" class="btn btn-warning btn-lg col-md-2 text-white">Back</a>
                                        </div>
                                    </form>
                        </div>
                        <br/>
                        <!-- Display notifications-->
                        <?php if(isset($registerStudent)){echo $registerStudent;}?>
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
