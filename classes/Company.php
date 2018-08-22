<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php

class Company
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function registerCompany($data){


    }

    public function getCompanies(){
        $query = "SELECT * from company";
        $result = $this->db->select($query);
        return $result;

    }


}

?>