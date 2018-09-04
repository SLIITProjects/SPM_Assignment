<!--Include header from another file-->
<?php include('inc/header.php'); ?>
<?php
$login = Session::get('userLogin');
if($login==false){
    header("Location:login.php");
}
?>
<style>

</style>

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
                        <h4><?php echo Session::get('name');?></h4>
                        <h5 class="text-muted"><?php echo Session::get('role');?></h5>
                        <div class="list-group">
                            <a href="index.php" class="list-group-item list-group-item-action active">Home</a>
                            <a href="register_supervisor.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="CMP"){echo "display:none";}?>">Register Supervisor</a>
                            <a href="student_list.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="CMP"){echo "display:none";}?>">Allocate Supervisor</a>
                            <a href="form-i-3.php" class="list-group-item list-group-item-action">Form I-3</a>
                            <a href="form-i-3-supervisor.php" class="list-group-item list-group-item-action">Certify And Email Form I-3</a>
                            <a href="grade.php" class="list-group-item list-group-item-action">Grading-From</a>
                            <a href="marking_summary.php" class="list-group-item list-group-item-action">Marking-Summary-From</a>
						    <a href="form1Student.php" class="list-group-item list-group-item-action">Form I-1</a>

                        </div>
                    </div>
                </div>
        </div>
        <!--End Sidebar Section-->

        <!--Start Main section-->
        <div class="col col-md-9 col-lg-9">
                    <div class="jumbotron jumbotron-fluid text-center welcome">
                        <div class="container">
                            <h1 class="display-4">Welcome!!!</h1>
                        </div>
                    </div>
        </div>
        <!--End main section-->

    </div>
</div>
</section>

<!--Include Footer from another file-->
<?php include('inc/footer.php')?>