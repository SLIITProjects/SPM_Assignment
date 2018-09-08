<!--Include header from another file-->
<?php include('inc/header.php'); ?>

<!--Include DB connection from another file-->
<?php
    include('DBConnection.php');
    $query="select Reg_no,Name,Company,Start_date,End_date from schedule_tab";
    $result=mysqli_query($con,$query);
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
                        <img src="img/mlogo.png" alt="" class="img-fluid rounded-circle w-50 mb-1">
                        <h4>Rajitha lakshan</h4>
                        <h5 class="text-muted">Industrial Training Manager</h5>
                        <div class="list-group">
                            <a href="index.php" class="list-group-item list-group-item-action active">Home</a>
                            <a href="Schedule.php" class="list-group-item list-group-item-action">Schedule viva</a>
                            <a href="schedule_report.php" class="list-group-item list-group-item-action">Generate Report</a>
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
                
                    while($rows=mysqli_fetch_assoc($result))
                    {      
                 ?>
                <tr id="<?php echo $rows['Reg_no']; ?>">

                <td class="pt-3-half" contenteditable="true" > <?php echo $rows['Reg_no']; ?> </td>
                <td class="pt-3-half" contenteditable="true"><?php echo $rows['Name']; ?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $rows['Company']; ?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $rows['Start_date']; ?></td>
                <td class="pt-3-half" contenteditable="true"><?php echo $rows['End_date']; ?></td>
                <td class="pt-3-half" contenteditable="true">
                <button type="button" data-role="update"  onclick="myFunction(this.id)" id='<?php echo $rows['Reg_no'];?>' >Schedule</button>
                </td>
                
                </tr>


                <?php
                $count++;
                }
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
        <button type='submit' class='btn btn-primary' name='submitSchedule'>Submit</button>
                

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

<?php
include('DBConnection.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['submitSchedule']))
	{
        $vdate=$_POST['viva_date'];
        $regNo=$_POST['regId'];
        $time=$_POST['time'];
        
        $sql="update schedule_tab set Viva_date='$vdate', Time='$time' where Reg_no='$regNo'";
			
			if (!mysqli_query($con,$sql)) 
			{
				die('Error: ' . mysqli_error($con));
			}

			echo"<script>alert('Details saved')</script>";	
			mysqli_close($con);
    }
}
?>

        
