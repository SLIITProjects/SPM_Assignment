<!--Include header from another file-->
<?php include('inc/header.php'); ?>
<?php
$login = Session::get('userLogin');
if($login==false){
    header("Location:login.php");

}
?>
<!--get student uid--!>
<?php
if(!isset($_GET['stdid']) || $_GET['stdid'] == NULL){
    header("Location:student_list.php");
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
                        <img src="<?php echo Session::get('photo');?>" alt="" class="img-fluid rounded-circle w-50 mb-1">
                        <h4><?php echo Session::get('name');?></h4>
                        <h5 class="text-muted"><?php echo Session::get('role');?></h5>
                        <div class="list-group">
                            <a href="index.php" class="list-group-item list-group-item-action">Home</a>
                            <a href="register_supervisor.php" class="list-group-item list-group-item-action active" style="<?php if(Session::get('role')!="CMP"){echo "display:none";}?>">Register Supervisor</a>
                            <a href="student_list.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="CMP"){echo "display:none";}?>">Allocate Supervisor</a>
                            <a href="form1Student.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="STD"){echo "display:none";}?>">Form I-1</a>
                            <a href="form1SupervisorRList.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="SUP"){echo "display:none";}?>">Form I-1
                                <?php
                                include('DBConnection.php');
                                $supId=Session::get('uid');
                                $sql="SELECT * FROM form1_student_details WHERE supervisor='$supId' AND sup_response='in progress'";
                                $result=mysqli_query($con,$sql);
                                $count=mysqli_num_rows($result);
                                echo "&nbsp&nbsp&nbsp<b>$count</b>";
                                ?>
                            </a>
                            <a href="form-i-3.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="STD"){echo "display:none";}?>">Form I-3</a>
                            <a href="form-i-3-supervisor.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="STD"){echo "display:none";}?>">Certify And Email Form I-3</a>
                            <a href="grade.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Grading-From</a>
                            <a href="marking_summary.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Marking-Summary-From</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Sidebar Section-->

            <!--Start Main section-->

                <div class="card col-md-9 text-center">
                    <div class="card-body">
                        <div class="card-title h4">Student Profile</div>

                        <?php
                                        $getStudents= $user->getAllStudents(Session::get('uid'),$stdid);
                                        if($getStudents){
                                            while($value=$getStudents->fetch_assoc()){
                                                ?>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <img src="<?php echo $value['photo']?>" alt="" class="img-fluid rounded-circle mb-1" style="width:130px;">

                                                    <div class="text-md-center">
                                                        <h6 class="mt-3"><b>Name:</b> <?php echo $value['name']?></h6>
                                                        <h6 class="mt-3"><b>University:</b> <?php echo $value['uname']?></h6>
                                                        <h6 class="mt-3"><b>Faculty:</b> <?php echo $value['fname']?></h6>
                                                        <h6 class="mt-3"><b>StudentID:</b> <?php echo $value['studentId']?></h6>
                                                        <h6 class="mt-3"><b>Email:</b> <?php echo $value['email']?></h6>
                                                        <h6 class="mt-3"><b>Mobile:</b> <?php echo $value['contact']?></h6>
                                                        <h6 class="mt-3"><b>Address:</b> <?php echo $value['address']?></h6>
                                                        <?php if($value['status']==1){echo'<button class="btn btn-sm btn-success disabled">Active</button>';}else{echo'<button class=" btn-sm btn-danger disabled">Deactive</button>';}?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-lg-5" style="border-left: 1px solid #595959">
                                                    <?php if(isset($allocate )){echo $allocate ;}?>
                                                    <br/><br/>
                                                    <form action="" method="post">
                                                        <div class="form-group col-md-8">
                                                            <div class="input-group">
                                                                <label class="mt-3 mr-5 h6"><b>Supervisor</b></label>
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
                                                        <div class="form-group col-md-8">
                                                            <div class="input-group">
                                                                <label class="mt-3 mr-5 h6"><b>Department</b></label>
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


                                                    </form>

                                                </div>
                                            </div>



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