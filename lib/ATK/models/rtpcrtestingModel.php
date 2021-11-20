<?php
class Rtpcrtesting
{
    public $rtpcrtesting_ID, $TestingID, $labroom_booking_ID, $officer_N, $rtpcr_datetime, $rtpcr_result, $officer_ID;
    public function __construct($rtpcrtesting_ID, $TestingID, $labroom_booking_ID, $officer_N, $rtpcr_datetime, $rtpcr_result, $result, $officer_ID)
    {
        $this->rtpcrtesting_ID = $rtpcrtesting_ID;
        $this->TestingID = $TestingID;
        $this->labroom_booking_ID = $labroom_booking_ID;
        $this->officer_N = $officer_N;
        $this->rtpcr_datetime = $rtpcr_datetime;
        $this->rtpcr_result = $rtpcr_result;
        $this->result = $result;
        $this->officer_ID = $officer_ID;
    }
    public static  function getAll()
    {
        $rtpcrList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM `rtpcrtesting`
                INNER JOIN atktesting ON atktesting.TestingID = rtpcrtesting.TestingID
                    INNER JOIN officer ON officer.officer_ID = rtpcrtesting.officer_ID
                    INNER JOIN labroom_booking ON labroom_booking.labroom_booking_ID = rtpcrtesting.labroom_booking_ID
                    INNER JOIN laboratory_analyst ON laboratory_analyst.labanalyst_ID = labroom_booking.labanalyst_ID ";
        $result1 = $conn->query($sql);
        while ($my_row = $result1->fetch_assoc()) {
            $rtpcrtesting_ID = $my_row["rtpcrtesting_ID"];
            $TestingID = $my_row["TestingID"];
            $labroom_booking_ID = $my_row["labroom_booking_ID"];
            $officer_ID = $my_row["officer_ID"];
            $rtpcr_datetime = $my_row["rtpcr_datetime"];
            $rtpcr_result = $my_row["rtpcr_result"];
            $officer_N = $my_row["officer_N"];
            $result = $my_row["result"];
            $rtpcrList[] = new Rtpcrtesting($rtpcrtesting_ID, $TestingID, $labroom_booking_ID, $officer_N, $rtpcr_datetime, $rtpcr_result, $result, $officer_ID);
        }
        // echo print_r($rtpcrList);
        require("connection_close.php");
        return $rtpcrList;
    }

    public static function get($rtpcrtesting_ID)
    {
        require("connection_connect.php");
        $sql = "SELECT * FROM `rtpcrtesting`
                    INNER JOIN atktesting ON atktesting.TestingID = rtpcrtesting.TestingID
                    INNER JOIN officer ON officer.officer_ID = rtpcrtesting.officer_ID
                    INNER JOIN labroom_booking ON labroom_booking.labroom_booking_ID = rtpcrtesting.labroom_booking_ID
                    INNER JOIN laboratory_analyst ON laboratory_analyst.labanalyst_ID = labroom_booking.labanalyst_ID 
                WHERE `rtpcrtesting_ID`= '$rtpcrtesting_ID'";
        $result1 = $conn->query($sql);
        $my_row = $result1->fetch_assoc();
        $rtpcrtesting_ID = $my_row["rtpcrtesting_ID"];
        $TestingID = $my_row["TestingID"];
        $labroom_booking_ID = $my_row["labroom_booking_ID"];
        $officer_N = $my_row["officer_N"];
        $officer_ID = $my_row["officer_ID"];
        $rtpcr_datetime = $my_row["rtpcr_datetime"];
        $rtpcr_result = $my_row["rtpcr_result"];
        $result = $my_row["result"];
        require("connection_close.php");
        return new Rtpcrtesting($rtpcrtesting_ID, $TestingID, $labroom_booking_ID,$officer_N , $rtpcr_datetime, $rtpcr_result,$result , $officer_ID);
    }

    public static function add($rtpcrtesting_ID, $TestingID, $labroom_booking_ID, $rtpcr_datetime, $rtpcr_result, $officer_ID)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO `rtpcrtesting`(`rtpcrtesting_ID`, `TestingID`, `labroom_booking_ID`, `rtpcr_result`, `rtpcr_datetime`, `officer_ID`) 
        VALUES ('$rtpcrtesting_ID','$TestingID','$labroom_booking_ID','$rtpcr_result','$rtpcr_datetime','$officer_ID')";
        $result = $conn->query($sql);
        //echo $sql;
        require("connection_close.php");
        return "add success $result rows";
    }
    public static function search($key)
    {
        require("connection_connect.php");
        $sql = "SELECT * FROM `rtpcrtesting` 
                INNER JOIN atktesting ON atktesting.TestingID = rtpcrtesting.TestingID
                INNER JOIN officer ON officer.officer_ID = rtpcrtesting.officer_ID
                INNER JOIN labroom_booking ON labroom_booking.labroom_booking_ID = rtpcrtesting.labroom_booking_ID
                INNER JOIN laboratory_analyst ON laboratory_analyst.labanalyst_ID = labroom_booking.labanalyst_ID 
                WHERE 
                    `rtpcrtesting`.`rtpcrtesting_ID` like '%$key%'
                    OR `rtpcrtesting`.`TestingID` like '%$key%' 
                    OR `rtpcrtesting`.`labroom_booking_ID` like '%$key%' 
                    OR `rtpcrtesting`.`rtpcr_result` like '%$key%'
                    OR `officer`.`officer_N` like '%$key%'
                    OR `rtpcrtesting`.`rtpcr_datetime` like '%$key%' 
                    OR `atktesting`.`result` like '%$key%'";

        $results = $conn->query($sql);
        while ($my_row = $results->fetch_assoc()) {
            $rtpcrtesting_ID = $my_row["rtpcrtesting_ID"];
            $TestingID = $my_row["TestingID"];
            $labroom_booking_ID = $my_row["labroom_booking_ID"];
            $result = $my_row["result"];
            $rtpcr_result = $my_row["rtpcr_result"];
            $officer_N = $my_row["officer_N"];
            $officer_ID = $my_row["officer_ID"];
            $rtpcr_datetime = $my_row["rtpcr_datetime"];
            
            $search[] = new Rtpcrtesting($rtpcrtesting_ID, $TestingID, $labroom_booking_ID,$officer_N , $rtpcr_datetime, $rtpcr_result,$result, $officer_ID);
         }
        
        require("connection_close.php");
        return $search;
    }

    public static function update($rtpcrtesting_ID, $TestingID, $labroom_booking_ID, $rtpcr_datetime, $rtpcr_result, $officer_ID)
    {
        require("connection_connect.php");
        $sql = "UPDATE `rtpcrtesting` SET    
                    `rtpcrtesting_ID`='$rtpcrtesting_ID',
                    `TestingID`='$TestingID',
                    `labroom_booking_ID`='$labroom_booking_ID',
                    `rtpcr_datetime`='$rtpcr_datetime',
                    `rtpcr_result`='$rtpcr_result' ,
                    `officer_ID`='$officer_ID' 
                WHERE `rtpcrtesting_ID`='$rtpcrtesting_ID'";

        $result1 = $conn->query($sql);
        require("connection_close.php");
        return "update success $result1 row";
    }
    public static function delete($rtpcrtesting_ID)
    {
        require("connection_connect.php");
        $sql = "DELETE FROM `rtpcrtesting` WHERE `rtpcrtesting_ID`='$rtpcrtesting_ID'";
        $result = $conn->query($sql);
        require("connection_close.php");
        return "delete success $result row";
    }
}
