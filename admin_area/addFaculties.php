
<?php include('inc/header.php')?>

<!--Add faulty using Method in Faculty class-->
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $facultyName = $_POST['faculty'];

    $response = $faculty->addFaculty($facultyName);
}
?>

<!--Get fid and Delete that record using Method in Faculty class-->
<?php
    if(isset($_GET['delfaculty'])){
        $id = $_GET['delfaculty'];
        $delfaculty = $faculty->delFaculty($id);
    }
?>


<?php include('inc/navbar.php')?>

<section id="users">
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
                            <a href="addFaculties.php" class="list-group-item list-group-item-action active">Add Faculties</a>
                            <a href="addUniversity.php" class="list-group-item list-group-item-action">Add Universities</a>
                            <a href="signup_request.php" class="list-group-item list-group-item-action">Signup requests</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Sidebar-->

            <!--Start Main Section-->
            <div class="col col-md-9 col-lg-9 dashboard">

                <!--Add a user faculty to the System-->

                <div class="card">
                    <div class="card-body">
                        <div class="card-title h5">Add a Faculty</div>
                        <form action="addFaculties.php" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="role">Enter Faculty</label>
                                    <input type="text" class="form-control" name="faculty" placeholder="Faculty Name" >
                                </div>
                            </div>
                            <input type="submit" href="#" class="btn btn-success" value="Add">&nbsp;
                            
                        </form>
                    </div>
                </div>

                <br/>

                <!--Display faculties in a table-->

                <div class="card">
                    <div class="card-body">
                        <div class="card-title h5">Current Faculties</div>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Faculty Name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!--Get faculties from the database and display them in a table-->
                            <?php
                                $faculties = $faculty->getFaculties();
                                if($faculties){
                                    $i=0;
                                    while ($result = $faculties->fetch_assoc()){
                                        $i++;
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i?></th>
                                <td><?php echo $result['fname']?></td>
                                <td><a onclick="return confirm('Are you sure to delete?')" href="?delfaculty=<?php echo $result['fid']?>" class="btn btn-danger btn-sm">Remove</a></td>
                            </tr>
                           <?php }}?>
                            </tbody>
                        </table>
                        <?php if(isset($delfaculty)){echo $delfaculty;}?>
                        <?php if(isset($response)){echo $response;}?>
                    </div>
                </div>
            </div>

            <!--End Main Section-->

        </div>
    </div>
</section>

<!--Footer Section-->
<?php include('../inc/footer.php')?>