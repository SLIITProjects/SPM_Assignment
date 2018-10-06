<!--Include header from another file-->
<?php include('inc/header.php'); ?>



<!--Include DB connection from another file-->
   

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $addSchedule = $manager->addSchedule($_POST);
    }

?>
<!--Include Navbar from another file-->
<?php include('inc/navbar.php')?>

<!--scripts-->
<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css" >

<link rel="stylesheet" type="text/css" href="css/timepicker.css">
    <script type="text/javascript" src="js/timepicker.js"></script>

<!--stylesheet of the modal-->
<link rel="stylesheet" type="text/css" href="css/modal.css" >

<!--script of the datepicker-->
                        <script>
                        $(function() {
                        $('.dates #usr1').datepicker({
                            'format': 'yyyy-mm-dd',
                            'autoclose': true
                        });
                        });
                        </script>


  

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
                            <a href="register_supervisor.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="CMP"){echo "display:none";}?>">Register Supervisor</a>
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
                            <a href="form5.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="SUP"){echo "display:none";}?>">Form I-5</a>
                            <a href="form_I-7.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Form I-7</a>
                            <a href="getPerformances.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Performance</a>
                            <a href="form-i-3-supervisor.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="STD"){echo "display:none";}?>">Certify And Email Form I-3</a>
                            <a href="grade.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Grading-From</a>
                            <a href="marking_summary.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Marking Summary From</a>
                            <a href="Schedule.php" class="list-group-item list-group-item-action active" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Schedule</a>
                            <a href="schedule_report.php" class="list-group-item list-group-item-action" style="<?php if(Session::get('role')!="ADM"){echo "display:none";}?>">Schedule Report</a>
                        </div>
                    </div>
                </div>
        </div>
      
        <!--End Sidebar Section-->

<!--Start Main section-->
<div class="col col-md-9 col-lg-9">
                    
                    <div>
                     <!-- Editable table -->
<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Schedule Viva</h3>
    <div class="card-body">
        <div id="table" class="table-editable">
            <!--<span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a></span>-->

            
			
            <table class="table table-bordered table-responsive-md table-striped text-center" id="table">
                <tr>
                    <th class="text-center">Registration No</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Company Name</th>
                    <th class="text-center">Start Date</th>
                    <th class="text-center">End Date</th>
                    <th class="text-center"> </th>   
                </tr>
                
                <?php
                $count=1;
                $data = $manager->getSchedule();
                if($data){
                    while($rows=$data->fetch_assoc())
                    {      
                 ?>
                <tr id="<?php echo $rows['Reg_no']; ?>">

                <td class="pt-3-half" contenteditable="true" > <?php echo $rows['Reg_no']; ?> </td>
                <td class="pt-3-half" contenteditable="true"><?php echo $rows['Name']; ?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $rows['Company']; ?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $rows['Start_date']; ?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $rows['End_date']; ?></td>
                <td class="pt-3-half" contenteditable="true">
                <button type="button" class='btn btn-primary' data-role="update"  onclick="myFunction(this.id)" id='<?php echo $rows['Reg_no'];?>' >Schedule</button>
                </td>
                
                </tr>


                <?php
                $count++;
                }}
                ?>
                     
        </table>
<script>
function myFunction(elem) {
    document.querySelector('.bg-modal').style.display = 'flex'; 
    document.querySelector('#regId').value=elem;    
}
</script>

        
        </div>
    </div>
</div>



<!-- /Editable table -->

<!--pop up modal-->
<div class="bg-modal">
    <div class="modal-content">
        <form method="POST" action="">
        <div class="close" >+</div>

                <input type="text" style="width:200px;" name="regId" id="regId" value=""/>

        
        <div class="dates" style="color:#2471a3;">
        <input type="text" style="width:200px;background-color:#aed6f1;" class="form-control" id="usr1" name="viva_date" placeholder="YYYY-MM-DD" autocomplete="off" >
        </div>
      
         <input type="time" style="width:200px;" class="form-control" name="time">    
        <button type='submit' class='btn btn-primary' name='submit'>Submit</button>
                

            <script>
            document.querySelector('.close').addEventListener('click',function(){
            document.querySelector('.bg-modal').style.display = 'none'; 
            });
            </script>
        
        </form>    
    </div>

</div>


    
</div>
</div>
<!--End main section-->

    </div>
</div>
</section>



        
