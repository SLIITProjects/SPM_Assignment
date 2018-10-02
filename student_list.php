<!--Include header from another file-->
<?php include('inc/header.php'); ?>
<?php
$login = Session::get('userLogin');
if($login==false){
    header("Location:login.php");
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
                                echo '<span class="badge badge-success ml-3"><b>'.$count.'</b></span>';
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
        <div class="col col-md-9 col-lg-9">
        <div class="jumbotron jumbotron-fluid text-center welcome">
                        <div class="container">
                            <h1 class="display-5">Allocate Sueprvisor</h1>
                        </div>
                    </div>

                <div class="card">
                    <div class="card-body">
                        <div class="card-title h4">Students List</div>
                        <table class="table">
                            <thead class="thead-inverse">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">University</th>
                                <th scope="col">Faculty</th>
                                <th scope="col">Student IDNO</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Has Supervisor</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $start_from = ($pg-1)*10;
                            $company=Session::get('uid');
                                $users = $user->getStudents($company,$start_from,10);
                                if($users){
                                    $i=0;
                                    while($result=$users->fetch_assoc()){
                                        $i++;
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i;?></th>
                                <td><?php echo $result['name'];?></td>
                                <td><?php echo $result['uname'];?></td>
                                <td><?php echo $result['fname'];?></td>
                                <td><?php echo $result['studentId'];?></td>
                                <td><?php echo $result['contact'];?></td>
                                <td><?php if($result['supervisor']==""){
                                    echo '<button class="btn btn-sm btn-danger disabled">No</button>';
                                    }else{
                                        echo '<button class="btn btn-sm btn-success disabled">Yes</button>';
                                    }
                                    ?></td>
                                <td><a type="button" href="allocate_supervisor.php?stdid=<?php echo $result['uid'];?>" class="btn btn-success btn-sm"><i class="fa fa-arrow-right"></i> View</a></td>

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