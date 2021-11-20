<?php
class Officer
{
    public $officer_ID,$officer_N,$officer_LN;
    public function __construct($officer_ID,$officer_N,$officer_LN)
    {
        $this->officer_ID = $officer_ID;
        $this->officer_N = $officer_N;
        $this->officer_LN = $officer_LN;

        
    }
    public static  function getAll()
    {
        $officerList = [];
        require("connection_connect.php");
        $sql = "SELECT officer_ID,officer_N,officer_LN FROM `officer`";
        $result1 = $conn->query($sql);
        while ($my_row = $result1->fetch_assoc()) {
            $officer_N = $my_row["officer_N"];
            $officer_LN = $my_row["officer_LN"];
            $officer_ID = $my_row["officer_ID"];

            $officerList[] = new Officer($officer_ID,$officer_N,$officer_LN);
        }

        require("connection_close.php");
        return $officerList;
    }

    
}
