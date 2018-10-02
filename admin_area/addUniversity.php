
<?php include('inc/header.php')?>

<!--Add university using Method in University class-->
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $uniName = $_POST['university'];

    $response = $university->addUniversity($uniName);
}
?>

<!--Get unid and Delete that record using Method in University class-->
<?php
    if(isset($_GET['deluniversity'])){
        $id = $_GET['deluniversity'];
        $deluni = $university->delUniversity($id);
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
                            <a href="addFaculties.php" class="list-group-item list-group-item-action">Add Faculties</a>
                            <a href="addUniversity.php" class="list-group-item list-group-item-action active">Add Universities</a>
                            <a href="signup_request.php" class="list-group-item list-group-item-action">Signup requests</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Sidebar-->

            <!--Start Main Section-->
            <div class="col col-md-9 col-lg-9 dashboard">

                <!--Add a University to the System-->

                <div class="card">
                    <div class="card-body">
                        <div class="card-title h5">Add a University</div>
                        <form action="addUniversity.php" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="role">Enter University</label>
                                    <input type="text" class="form-control" name="university" placeholder="University Name" >
                                </div>
                            </div>
                            <input type="submit" href="#" class="btn btn-success" value="Add">&nbsp;
                            
                        </form>
                    </div>
                </div>

                <br/>

                <!--Display User University in a table-->

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
                            <!--Get universities from the database and display them in a table-->
                            <?php
                                $universities = $university->getUniversities();
                                if($universities){
                                    $i=0;
                                    while ($result = $universities->fetch_assoc()){
                                        $i++;
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i?></th>
                                <td><?php echo $result['uname']?></td>
                                <td><a onclick="return confirm('Are you sure to delete?')" href="?deluniversity=<?php echo $result['unid']?>" class="btn btn-danger btn-sm">Remove</a></td>
                            </tr>
                           <?php }}?>
                            </tbody>
                        </table>
                        <?php if(isset($delUni)){echo $delUni;}?>
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