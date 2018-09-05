<?php
include 'lib/Database.php';
?>
<?php

$db = new Database();

    $q = $_GET['q'];
    $query = "SELECT * FROM users WHERE studentId='$q'";
	

if(!empty($_GET['q'])){ 
    $result = $db->select($query);
    if($result){
    while($output = $result->fetch_assoc()){	
	
    echo '<div class="form-group">
				<label><b>Student Name</b></label>
				<input class="form-control" name="Stdname" placeholder="Enter Student name" type="text" value="'.$output['name'].'">
				</div>	
                
                    <br/>
                    
				<div class="form-group">
				<label><b>Supervisors Name </b></label>
				<input class="form-control" name="SupName" placeholder="Enter the supervisor name" type="text" value="'.$output['supervisor'].'">
         
         </div>';
    
        }
    }
    
}


?>

							


