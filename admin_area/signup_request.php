
<!--Include header -->
<?php include('inc/header.php')?>

<!--Get request_id and activate users using Method in a User class-->
<?php
if(isset($_GET['usid'])){
    $uid = $_GET['usid'];
    $activateUser = $user->activateAccount($uid);
}
?>

<!--Get request_id and Delete that record using Method in a User class-->
<?php
if(isset($_GET['ruid'])){
    $uid = $_GET['ruid'];
    $rejectUser = $user->deleteUsers($uid);
}
?>



<?php include('inc/navbar.php')?>

<section id="users" class="">
    <div class="container-fluid">
        <div class="row">

            <!--Start Sidebar-->

            <div class="col col-md-3 col-lg-3 text-center">
                <div class="card">
                    <div class="card-body">
                    <img src="<?php echo Session::get('photo')?>" alt="" class="img-fluid rounded-circle w-50 mb-1">
                        <h4><?php echo Session::get('admin_name')?></h4>
                        <h5 class="text-muted">Admin</h5>
                        <div class="list-group">
                            <a href="admin.php" class="list-group-item list-group-item-action">Home</a>
                            <a href="addFaculties.php" class="list-group-item list-group-item-action">Add Faculties</a>
                            <a href="addUniversity.php" class="list-group-item list-group-item-action">Add Universities</a>
                            <a href="signup_request.php" class="list-group-item list-group-item-action active">Signup requests</a>
                        </div>
                    </div>
                </div>
            </div>

            <!--End Sidebar-->

            <!--Start Main Section-->
            <div class="col col-md-9 col-lg-9 dashboard">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title h5">Requests</div>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Type</th>
                                <th scope="col">User</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Email</th>
                                <th scope="col">Joined Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                           <!-- Get Deactivates users from the system and activate or delete them-->
                           <?php
                                $users = $user->getDeactivateUsers();
                                if($users){
                                    $i=0;
                                    while($result=$users->fetch_assoc()){
                                        $i++;
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i;?></th>
                                <td><?php echo $result['role'];?></td>
                                <td><?php echo $result['name'];?></td>
                                <td><?php echo $result['contact'];?></td>
                                <td><?php echo $result['email'];?></td>
                                <td><?php echo $result['registered_date'];?></td>
                                <td><a href="?usid=<?php echo $result['uid'];?>" class="btn btn-success btn-sm">Accept</a>  <a onclick="return confirm('Are you sure to Delete?')" href="?ruid=<?php echo $result['uid'];?>" class="btn btn-danger btn-sm">Reject</a></td>
                            </tr>
                            <?php }}?>
                            </tbody>
                        </table>
                        <?php if(isset($activateUser)){echo $activateUser;}?>
                        <?php if(isset($rejectUser)){echo $rejectUser;}?>
                    </div>
                </div>
            </div>

            <!--End Main Section-->

        </div>
    </div>
</section>

<!--Footer Section-->
<?php include('../inc/footer.php')?>
