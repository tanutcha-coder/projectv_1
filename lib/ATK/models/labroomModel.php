<?php
class Labroom
{
    public $labroom_booking_ID, $labanalyst_ID, $labanalyst_Name, $sign_in_date, $sign_in_time, $sign_out_time;
    public function __construct($labroom_booking_ID, $labanalyst_ID, $labanalyst_Name, $sign_in_date, $sign_in_time, $sign_out_time)
    {
        $this->labroom_booking_ID = $labroom_booking_ID;
        $this->labanalyst_ID = $labanalyst_ID;
        $this->labanalyst_Name = $labanalyst_Name;
        $this->sign_in_date = $sign_in_date;
        $this->sign_in_time = $sign_in_time;
        $this->sign_out_time = $sign_out_time;
    }

    public static  function getAll()
    {
        $labroomList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM `labroom_booking` 
        INNER JOIN laboratory_analyst
        ON laboratory_analyst.labanalyst_ID = labroom_booking.labanalyst_ID";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $labroom_booking_ID = $my_row["labroom_booking_ID"];
            $labanalyst_ID = $my_row["labanalyst_ID"];
            $labanalyst_Name = $my_row["labanalyst_Name"];
            $sign_in_date = $my_row["sign_in_date"];
            $sign_in_time = $my_row["sign_in_time"];
            $sign_out_time = $my_row["sign_out_time"];
            $labroomList[] = new Labroom($labroom_booking_ID, $labanalyst_ID, $labanalyst_Name, $sign_in_date, $sign_in_time, $sign_out_time);
        }

        require("connection_close.php");
        return $labroomList;
    }
    public static function get($labroom_booking_ID)
    {
        require("connection_connect.php");
        $sql = "SELECT * FROM `labroom_booking`
                INNER JOIN laboratory_analyst ON laboratory_analyst.labanalyst_ID = labroom_booking.labanalyst_ID 
                WHERE `labroom_booking_ID`= '$labroom_booking_ID'";
        $result1 = $conn->query($sql);
        $my_row = $result1->fetch_assoc();

        $labroom_booking_ID = $my_row["labroom_booking_ID"];
        $labanalyst_ID = $my_row["labanalyst_ID"];
        $labanalyst_Name = $my_row["labanalyst_Name"];
        $sign_in_date = $my_row["sign_in_date"];
        $sign_in_time = $my_row["sign_in_time"];
        $sign_out_time = $my_row["sign_out_time"];
        require("connection_close.php");
        return new Labroom($labroom_booking_ID, $labanalyst_ID, $labanalyst_Name, $sign_in_date, $sign_in_time, $sign_out_time);
    }

    public static function add($labroom_booking_ID, $labanalyst_ID, $sign_in_date, $sign_in_time, $sign_out_time)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO `labroom_booking`(`labroom_booking_ID`, `labanalyst_ID`, `sign_in_date`, `sign_in_time`, `sign_out_time`) 
        VALUES ('$labroom_booking_ID','$labanalyst_ID','$sign_in_date','$sign_in_time','$sign_out_time')";
        $result = $conn->query($sql);
        require("connection_close.php");
        return "add success $result rows";
    }
    public static function search($key)
    {
        require("connection_connect.php");
        $sql = "SELECT * FROM `labroom_booking` 
                INNER JOIN laboratory_analyst ON laboratory_analyst.labanalyst_ID = labroom_booking.labanalyst_ID 
                WHERE 
                    `labroom_booking`.`labroom_booking_ID` like '%$key%'
                    OR `laboratory_analyst`.`labanalyst_Name` like '%$key%' 
                    OR `labroom_booking`.`sign_in_date` like '%$key%'
                    OR `labroom_booking`.`sign_in_time` like '%$key%'
                    OR `labroom_booking`.`sign_out_time` like '%$key%'
                    ";

        $results = $conn->query($sql);
        while ($my_row = $results->fetch_assoc()) { 
            $labroom_booking_ID = $my_row["labroom_booking_ID"];
            $labanalyst_ID = $my_row["labanalyst_ID"];
            $labanalyst_Name = $my_row["labanalyst_Name"];
            $sign_in_date = $my_row["sign_in_date"]; 
            $sign_in_time = $my_row["sign_in_time"];
            $sign_out_time = $my_row["sign_out_time"];           

            $search[] = new Labroom($labroom_booking_ID, $labanalyst_ID, $labanalyst_Name, $sign_in_date, $sign_in_time, $sign_out_time);
        }

        require("connection_close.php");
        return $search;
    }

    public static function update($labroom_booking_ID, $labanalyst_ID,$sign_in_date, $sign_in_time,  $sign_out_time)
    {
        require("connection_connect.php");
        $sql = "UPDATE `labroom_booking` SET    
                    `labroom_booking`.`labroom_booking_ID`='$labroom_booking_ID',
                    `labroom_booking`.`labanalyst_ID`='$labanalyst_ID',
                    `labroom_booking`.`sign_in_date`='$sign_in_date' ,
                    `labroom_booking`.`sign_in_time`='$sign_in_time',
                    `labroom_booking`.`sign_out_time`='$sign_out_time' 
                WHERE `labroom_booking_ID`='$labroom_booking_ID'";

        $result = $conn->query($sql);
        require("connection_close.php");
        return "update success $result row";
    }
    public static function delete($labroom_booking_ID)
    {
        require("connection_connect.php");
        $sql = "DELETE FROM `labroom_booking` WHERE `labroom_booking_ID`='$labroom_booking_ID'";
        $result = $conn->query($sql);
        require("connection_close.php");
        return "delete success $result row";
    }
}
