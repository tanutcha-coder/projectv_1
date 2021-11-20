<?php
class Labforbooking
{
    public $labroom_ID, $labName, $labanalyst_Name, $Status;
    public function __construct($labroom_ID, $labName, $Status)
    {
        $this->labroom_ID = $labroom_ID;
        $this->labName = $labName;
        $this->Status = $Status;
    }

    public static  function getAll()
    {
        $labroomList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM `labroom`";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $labroom_ID = $my_row["labroom_ID"];
            $labName = $my_row["labName"];
            $Status = $my_row["Status"];
            $labroomList[] = new Labforbooking($labroom_ID, $labName, $Status);
        }

        require("connection_close.php");
        return $labroomList;
    }
    public static function get($labroom_ID)
    {
        require("connection_connect.php");
        $sql = "SELECT * FROM `labroom`
                WHERE `labroom_ID`= '$labroom_ID'";
        $result1 = $conn->query($sql);
        $my_row = $result1->fetch_assoc();

        $labroom_ID = $my_row["labroom_ID"];
        $labName = $my_row["labName"];
        $Status = $my_row["Status"];
        require("connection_close.php");
        return new Labforbooking($labroom_ID, $labName,$Status);
    }

    public static function add($labroom_ID, $labName, $Status)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO `labroom`(`labroom_ID`, `labName`, `Status`) 
        VALUES ('$labroom_ID','$labName','$Status')";
        $result = $conn->query($sql);
        require("connection_close.php");
        return "add success $result rows";
    }
    public static function search($key)
    {
        require("connection_connect.php");
        $sql = "SELECT * FROM `labroom` 
                WHERE 
                    `labroom`.`labroom_ID` like '%$key%'
                    OR `labroom`.`labName` like '%$key%'
                    OR `labroom`.`Status` like '%$key%'
                    ";

        $results = $conn->query($sql);
        while ($my_row = $results->fetch_assoc()) { 
            $labroom_ID = $my_row["labroom_ID"];
            $labName = $my_row["labName"];
            $Status = $my_row["Status"]; 

            $search[] = new Labforbooking($labroom_ID, $labName, $Status);
        }

        require("connection_close.php");
        return $search;
    }

    public static function update($labroom_ID, $labName,$Status)
    {
        require("connection_connect.php");
        $sql = "UPDATE `labroom` SET 
        `labName`='$labName',
        `Status`='$Status' 
        WHERE `labroom_ID`='$labroom_ID'";

        $result = $conn->query($sql);
        require("connection_close.php");
        return "update success $result row";
    }
    public static function delete($labroom_ID)
    {
        require("connection_connect.php");
        $sql = "DELETE FROM `labroom` WHERE `labroom_ID`='$labroom_ID'";
        $result = $conn->query($sql);
        require("connection_close.php");
        return "delete success $result row";
    }
}
