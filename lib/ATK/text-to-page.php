<?php

$request = '';

if(isset($_POST['request'])){
    $request = $_POST['request'];

    if($request == 'หน้าหลัก'){
        $location="./views/pages/home.php";
    }


}