<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>
<?php
class Login
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function loginUser($data){
        $email=  mysqli_real_escape_string($this->db->link,$data['email']);
        $password=  mysqli_real_escape_string($this->db->link,md5($data['password']));

        $query = "SELECT *FROM users WHERE email='$email' AND password='$password' AND status=1";

        $res = $this->db->select($query);

        if(empty($email) || empty($password)){
            $msg = "<span class='alert alert-warning'>Field cannot be Empty!</span>";
            return $msg;
        }else if($res==true){
            $data = $res->fetch_assoc();
                Session::set("userLogin",true);
                Session::set("name",$data['name']);
                Session::set("uid",$data['uid']);
                Session::set("email",$data['email']);
                Session::set("role",$data['role']);
                header("Location:index.php");


        }else{
            $msg = "<span class='alert alert-danger'>Invalid Credentials!</span>";
            return $msg;
        }
    }

}
?>