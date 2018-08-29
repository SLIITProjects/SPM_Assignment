<!--Include header from another file-->
<?php include('inc/header.php'); ?>

<!--Include DB connection from another file-->
<?php
    include('DBConnection.php');
    $query="select Reg_no,Name,Company,Start_date,End_date from schedule_tab";
    $result=mysqli_query($con,$query);
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
                        <h4>Rajitha lakshan</h4>
                        <h5 class="text-muted">Industrial Training Manager</h5>
                        <div class="list-group">
                            <a href="index.php" class="list-group-item list-group-item-action active">Home</a>
                            <a href="" class="list-group-item list-group-item-action">Functions</a>
                        </div>
                    </div>
                </div>
        </div>
        <!--End Sidebar Section-->

        <!--Start Main section-->
        <div class="col col-md-9 col-lg-9">
                    <!--<div class="jumbotron jumbotron-fluid text-center welcome">
                        <div class="container">
                            <h1 class="display-5">Schedule Viva</h1>
                        </div>   
                    </div>-->
                    <div>
                            <!-- Editable table -->
<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Schedule Viva</h3>
    <div class="card-body">
        <div id="table" class="table-editable">
            <!--<span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a></span>-->
            <table class="table table-bordered table-responsive-md table-striped text-center">
                <tr>
                    <th class="text-center">Registration No</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Company Name</th>
                    <th class="text-center">Start Date</th>
                    <th class="text-center">End Date</th>
                    <th class="text-center">Viva Date</th>
                    <th class="text-center">Time</th>
                </tr>

                <?php
                    while($rows=mysqli_fetch_assoc($result))
                    {
                ?>
                <tr>

                    <td class="pt-3-half" contenteditable="true"><?php echo $rows['Reg_no']; ?></td>
                    <td class="pt-3-half" contenteditable="true"><?php echo $rows['Name']; ?></td>
                    <td class="pt-3-half" contenteditable="true"><?php echo $rows['Company']; ?></td>
                    <td class="pt-3-half" contenteditable="true"><?php echo $rows['Start_date']; ?></td>
                    <td class="pt-3-half" contenteditable="true"><?php echo $rows['End_date']; ?></td>
                    <td class="pt-3-half">
                   


                    </td>
                    <td>
                        
                    </td>
                </tr>
                <?php
                    }
                ?>
                                
                
            </table>
        </div>
    </div>
</div>
<!-- Editable table -->

                    </div>
        </div>
        <!--End main section-->

    </div>
</div>
</section>

<!--Include Footer from another file-->
<?php include('inc/footer.php')?>