<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
?>
<?php
class Pagination
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    /*This Method return Total pages required to display*/
    public function addPagination($pages,$tablename){
        $query = "SELECT * FROM $tablename";
        $result = $this->db->select($query);
        $totalRecords = $result->num_rows;
        $totalPages=ceil($totalRecords/$pages);

        return $totalPages;
    }
}