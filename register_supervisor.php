<!--Include header from another file-->
<?php include('inc/header.php'); ?>
<?php
$login = Session::get('userLogin');
if($login==false){
    header("Location:login.php");
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $company=Session::get('uid');
    $registerSup = $user->registerSupervisor($_POST,$company);
}
?>

<?php
    if(isset($_GET['delid'])){
        $uid = $_GET['delid'];
        $delSupervisor = $user->delSupervisor($uid);
    }
?>

<!--Get page number-->
<?php
    if(isset($_GET['page']) ){
        $pg = $_GET['page'];
    }else{
        $pg=1;
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

                        <form action="register_supervisor.php" method="post">

                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="fullname" placeholder="Name">
                                </div>

                                <div class="form-group col-md-3">
                                <select class="form-control" name="role">
                                <option>Select the postion</option>
                                    <option value="Software Engineer">Software Engineer</option>
                                    <option value="Business Analysis">Business Analysis</option>
                                    <option value="Data Scientist">Data Scientist</option>
                                    <option value="Quality Assurance Engineer">Quality Assurance Engineer</option>
                                </select>
                            </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="contact" placeholder="Mobile Number">
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <textarea class="form-control" name="address" placeholder="Address" rows="2"></textarea>
                                </div>

                                <div class="form-group col-md-5 mt-5">
                                    <div class="input-group">
                                        <select class="form-control" name="department">
                                            <option value="">Select Department</option>
                                            <?php
                                            $getDepartment= $department->getCompanyDepartment(Session::get('uid'));
                                            if($getDepartment){
                                                while($result=$getDepartment->fetch_assoc()){
                                                    ?>
                                                    <option value="<?php echo $result['did'];?>"><?php echo $result['dname'];?></option>
                                                <?php }}?>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>

                                <div class="form-group col-md-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>

                                <div class="form-group col-md-3">
                                    <input type="password" class="form-control" name="cpassword" placeholder="Confirm password">
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                            <?php if(isset($registerSup)){echo $registerSup;}?>
                        </form>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-body">
                        <div class="card-title h4">Current Supervisors</div>
                        <table class="table">
                            <thead class="thead-inverse">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $start_from = ($pg-1)*10;
                            $company=Session::get('uid');
                                $users = $user->getSupervisors($company,$start_from,10);
                                if($users){
                                    $i=0;
                                    while($result=$users->fetch_assoc()){
                                        $i++;
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i;?></th>
                                <td><?php echo $result['name'];?></td>
                                <td><?php echo $result['position'];?></td>
                                <td><?php echo $result['contact'];?></td>
                                <td><a onclick="return confirm('Are sure to delete?')" href="?delid=<?php echo $result['uid'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Remove</a></td>
                            </tr>
                          <?php }}?>
                            </tbody>
                        </table>
                      
                        <!-- Start Pagination-->
                        <nav aria-label="User Pagination">
                            <ul class="pagination">
                                    <?php
                                        $pages = $page->addPagination(10,'users');
                                        if($pages){
                                            for($i=1;$i<=$pages;$i++){
                               echo "<li class='page-item'><a class='page-link' href='?page=".$i."'>".$i."</a></li>";
                                            }
                                        }
                                    ?>
                            </ul>
                        </nav>
                        <!-- End Pagination-->
                        <?php if(isset($delSupervisor)){echo $delSupervisor;}?>
                    </div>
                </div>

        </div>
        <!--End main section-->

    </div>
</div>
</section>

<!--Include Footer from another file-->
<?php include('inc/footer.php')?>