<?php
class Lab_analyst
{
    public $labanalyst_ID,$labanalyst_Name,$labanalyst_Lname,$Address;
    public function __construct($labanalyst_ID,$labanalyst_Name,$labanalyst_Lname,$Address)
    {
        $this->labanalyst_ID = $labanalyst_ID;
        $this->labanalyst_Name = $labanalyst_Name;
        $this->labanalyst_Lname = $labanalyst_Lname;
        $this->Address = $Address;
        
    }
    public static  function getAll()
    {
        $lab_analystList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM `laboratory_analyst`";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
            $labanalyst_ID = $my_row["labanalyst_ID"];
            $labanalyst_Name = $my_row["labanalyst_Name"];
            $labanalyst_Lname = $my_row["labanalyst_Lname"];
            $Address = $my_row["Address"];

            $lab_analystList[] = new Lab_analyst($labanalyst_ID,$labanalyst_Name,$labanalyst_Lname,$Address);
        }

        require("connection_close.php");
        return $lab_analystList;
    }

    public static function get($labanalyst_ID)
    {
        require("connection_connect.php");
        $sql = "SELECT * FROM `laboratory_analyst`
                WHERE `labanalyst_ID`= '$labanalyst_ID'";
        $result1 = $conn->query($sql);
        $my_row = $result1->fetch_assoc();

        $labanalyst_ID = $my_row["labanalyst_ID"];
        $labanalyst_Name = $my_row["labanalyst_Name"];
        $labanalyst_Lname = $my_row["labanalyst_Lname"];
        $Address = $my_row["Address"];
        require("connection_close.php");
        return new Lab_analyst($labanalyst_ID, $labanalyst_Name, $labanalyst_Lname, $Address);
    }

    public static function add($labanalyst_ID, $labanalyst_Name, $labanalyst_Lname, $Address)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO `laboratory_analyst`(`labanalyst_ID`, `labanalyst_Name`, `labanalyst_Lname`, `Address`) 
        VALUES ('$labanalyst_ID','$labanalyst_Name','$labanalyst_Lname','$Address')";
        $result = $conn->query($sql);
        require("connection_close.php");
        return "add success $result rows";
    }
    public static function search($key)
    {
        require("connection_connect.php");
        $sql = "SELECT * FROM `laboratory_analyst` 
                WHERE 
                    `laboratory_analyst`.`labanalyst_ID` like '%$key%'
                    OR `laboratory_analyst`.`labanalyst_Name` like '%$key%' 
                    OR `laboratory_analyst`.`labanalyst_Lname` like '%$key%'
                    OR `laboratory_analyst`.`Address` like '%$key%'
                    ";

        $results = $conn->query($sql);
        while ($my_row = $results->fetch_assoc()) { 
            $labanalyst_ID = $my_row["labanalyst_ID"];
            $labanalyst_Name = $my_row["labanalyst_Name"];
            $labanalyst_Lname = $my_row["labanalyst_Lname"]; 
            $Address = $my_row["Address"];

            $search[] = new Lab_analyst($labanalyst_ID, $labanalyst_Name, $labanalyst_Lname, $Address);
        }

        require("connection_close.php");
        return $search;
    }

    public static function update($labanalyst_ID, $labanalyst_Name,$labanalyst_Lname, $Address)
    {
        require("connection_connect.php");
        $sql = "UPDATE `laboratory_analyst` SET 
        `labanalyst_Name`='$labanalyst_Name',
        `labanalyst_Lname`='$labanalyst_Lname',
        `Address`='$Address' WHERE `labanalyst_ID`='$labanalyst_ID' ";
        $result = $conn->query($sql);
        require("connection_close.php");
        return "update success $result row";
    }
    public static function delete($labanalyst_ID)
    {
        require("connection_connect.php");
        $sql = "DELETE FROM `laboratory_analyst` WHERE `labanalyst_ID`='$labanalyst_ID'";
        $result = $conn->query($sql);
        require("connection_close.php");
        return "delete success $result row";
    }

    
}
