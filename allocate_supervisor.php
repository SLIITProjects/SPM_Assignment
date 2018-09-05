<!--Include header from another file-->
<?php include('inc/header.php'); ?>
<?php
$login = Session::get('userLogin');
if($login==false){
    header("Location:login.php");

}
?>
<?php
$stdid='';
if(!isset($_GET['stdid']) || $_GET['stdid'] == NULL){
    header("Refresh:5;url=student_list.php");
}else{
    $stdid = $_GET['stdid'];
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $allocate = $user->allocateSupervisor($_POST,$stdid);
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
                            <a href="index.php" class="list-group-item list-group-item-action">Home</a>
                            <a href="register_supervisor.php" class="list-group-item list-group-item-action active" style="<?php if(Session::get('role')!="CMP"){echo "display:none";}?>">Register Supervisor</a>
                            <a href="student_list.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="CMP"){echo "display:none";}?>">Allocate Supervisor</a>
                            <a href="form-i-3.php" class="list-group-item list-group-item-action">Form I-3</a>
                            <a href="grade.php" class="list-group-item list-group-item-action">Grading-From</a>
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
                        <h1 class="display-5">Register Sueprvisor</h1>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">

                        <?php
                                        $getStudents= $user->getAllStudents(Session::get('uid'),$stdid);
                                        if($getStudents){
                                            while($value=$getStudents->fetch_assoc()){
                                                ?>

                        <form action="allocate_supervisor.php" method="post">
                            <div class="form-group col-md-4">
                                <div class="input-group">
                                    <label class="mt-3 mr-5"><b>Supervisor</b></label>
                                    <select class="form-control" name="supervisor">
                                        <option value="">Select Supervisor</option>
                                        <?php
                                        $getsupervisor = $user->getSupervisorsList(Session::get('uid'));
                                        if($getsupervisor){
                                            while($result=$getsupervisor->fetch_assoc()){
                                                ?>
                                                <option <?php
                                                if($value['supervisor']==$result['uid']){?>
                                                    selected = "selected"
                                                <?php }?>
                                                    value="<?php echo $result['uid'];?>"><?php echo $result['name'];?></option>
                                            <?php }}?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="input-group">
                                    <label class="mt-3 mr-5"><b>Department</b></label>
                                    <select class="form-control" name="department">
                                        <option value="">Select Department</option>
                                        <?php
                                        $getdepartments = $department->getCompanyDepartment(Session::get('uid'));
                                        if($getdepartments){
                                            while($result=$getdepartments->fetch_assoc()){
                                                ?>
                                                <option <?php
                                                if($value['department']==$result['did']){?>
                                                    selected = "selected"
                                                <?php }?>
                                                        value="<?php echo $result['did'];?>"><?php echo $result['dname'];?></option>
                                            <?php }}?>
                                    </select>
                                </div>
                            </div>


                            <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Allocate</button>
                            <a href="student_list.php" name="submit" class="btn btn-success"><i class="fa fa-arrow-left"></i>Back</a>

                            <?php if(isset($allocate )){echo $allocate ;}?>
                        </form>
                        <?php }} ?>
                    </div>
                </div>
            </div>
            <!--End main section-->

        </div>
    </div>
</section>

<!--Include Footer from another file-->
<?php include('inc/footer.php')?>