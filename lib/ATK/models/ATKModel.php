<?php
class ATK
{
    public $TestingID,$result,$officer_ID;
    public function __construct($TestingID,$result,$officer_ID)
    {
        $this->TestingID = $TestingID;
        $this->result = $result;
        $this->officer_ID = $officer_ID;

        
    }
    public static  function getAll()
    {
        $ATKList = [];
        require("connection_connect.php");
        $sql = "SELECT TestingID,result,officer_ID FROM `atktesting`";
        $result1 = $conn->query($sql);
        while ($my_row = $result1->fetch_assoc()) {
            $TestingID = $my_row["TestingID"];
            $result = $my_row["result"];
            $officer_ID = $my_row["officer_ID"];

            $ATKList[] = new ATK($TestingID,$result,$officer_ID);
        }

        require("connection_close.php");
        return $ATKList;
    }
    public static  function get($TestingID)
    {
        require("connection_connect.php");
        $sql = "SELECT * FROM `atktesting`
                WHERE `TestingID`= '$TestingID'";
                
        $result1 = $conn->query($sql);
        $my_row = $result1->fetch_assoc();

        $TestingID = $my_row["TestingID"];
        $result = $my_row["result"];
        $officer_ID = $my_row["officer_ID"];
        require("connection_close.php");
        return new ATK($TestingID,$result,$officer_ID);
    }

    
}
