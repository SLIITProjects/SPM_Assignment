<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class Manager
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function addSchedule($data){
        $vdate =  mysqli_real_escape_string($this->db->link,$data['viva_date']);
        $regNo =  mysqli_real_escape_string($this->db->link,$data['regId']);
        $time =  mysqli_real_escape_string($this->db->link,$data['time']);
        
        if($vdate==""){
           
            echo"<script>alert('Insert a Date!')</script>";    	
        }
        if($time==""){
           
            echo"<script>alert('Insert a Time!')</script>";    	
        }
        
        
            $query = "update schedule_tab set Viva_date='$vdate', Time='$time' where Reg_no='$regNo'";
                      
            $result = $this->db->update($query);
            if($result){
                echo"<script>alert('updated Successfully!!')</script>";
            }else{
                
                echo"<script>alert(' NOT Scheduled Successfully!!')</script>";
            }
        
    }
    public function addMarks($data){
        $sid =  mysqli_real_escape_string($this->db->link,$data['sid']);   
        $vmark =  mysqli_real_escape_string($this->db->link,$data['vmark']);   
        $mpmark =  mysqli_real_escape_string($this->db->link,$data['mpmark']);   
        $irmark =  mysqli_real_escape_string($this->db->link,$data['irmark']);   
        /**
			Form Validation
		**/
		if(empty($vmark)||empty($mpmark)||empty($irmark))
		{
			echo"<script>alert('One are more fields are empty')</script>";
        }
            
            if($vmark>"41" || $vmark<"0")
			{
				echo"<script>alert('Invalid Mark')</script>";	
            }
            if("0">$mpmark || $mpmark>"31")
			{
				echo"<script>alert('Invalid Mark')</script>";	
            }
            if("0">$irmark || $irmark>"31")
			{
				echo"<script>alert('Invalid Mark')</script>";	
			}
            
        else
        {
            $tot=$vmark+$mpmark+$irmark;
            $query="INSERT INTO total_marks(ssid,Vmark, MPmark, IRmark,Total) VALUES('$sid', '$vmark', '$mpmark', '$irmark','$tot')";
            
            $result = $this->db->insert($query);
            if($result){
                $msg = "<span class='alert alert-success msg'>Marks Added Successfully!</span>";
                echo"<script>alert('Added Successfully!!')</script>";
                return $msg;
                
            }else{
                
                echo"<script>alert(' NOT Added Successfully!!')</script>";
            }
        }
    }
    
    public function addMarksTest($id,$vmark,$mpmark,$irmark,$tot){
        $query = "insert into total_marks(ssid,Vmark,MPmark,IRmark,Total) VALUES('$id','$vmark','$mpmark','$irmark','$tot')";
        $result = $this->db->insert($query);
        return true;
    }
    
    public function getTotal($id){
        $query = "SELECT * from total_marks where ssid='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function getSheduleById($id){
        $query = "SELECT * from schedule_tab where Reg_no='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function getSchedule(){
        $query="select * from schedule_tab";
        $result = $this->db->select($query);
        return $result;

    }
}
?>
