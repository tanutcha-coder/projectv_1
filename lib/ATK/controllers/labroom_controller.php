<?php
    class labroomController
    {
        public function index()
        {
            $labroom_list = Labroom::getAll();
            $labforbook_list =Labforbooking :: getAll();
            require_once('views/labroom/index_labroom.php');
        }
        public function newlabroom()
        {
            $lab_analyst_list = Lab_analyst::getAll();
            $labroom_list = Labroom::getAll();
            $labforbook_list =Labforbooking :: getAll();

            require_once('views/labroom/new_labroom.php');
        }
    
        public function addlabroom()
        {
            $labroom_booking_ID = $_GET["labroom_booking_ID"];
            $labanalyst_ID = $_GET["labanalyst_ID"];
            $sign_in_date = $_GET["sign_in_date"];
            $sign_in_time = $_GET["sign_in_time"];
            $sign_out_time = $_GET["sign_out_time"];
    
            Labroom::add($labroom_booking_ID, $labanalyst_ID,$sign_in_date,$sign_in_time,$sign_out_time);
            labroomController::index();
        }
        public function update_labroom()
        {
            $labroom_booking_ID = $_GET['labroom_booking_ID'];
            //echo $labroom_booking_ID;
            $labroom_list = Labroom::get($labroom_booking_ID);
            $lab_analyst_list = Lab_analyst::getAll();
            require_once('views/labroom/update_labroom.php');
        }
        public function update()
        {
            $labroom_booking_ID = $_GET['labroom_booking_ID'];
            $labanalyst_ID = $_GET['labanalyst_ID'];
            $sign_in_date = $_GET['sign_in_date'];
            $sign_in_time = $_GET['sign_in_time'];
            $sign_out_time = $_GET['sign_out_time'];
            Labroom::update($labroom_booking_ID,$labanalyst_ID,$sign_in_date,$sign_in_time,$sign_out_time);
            labroomController::index();
        }
        public function delete_labroom()
        {
            $labroom_booking_ID = $_GET['labroom_booking_ID'];
            //echo $labroom_booking_ID;
            $labroom_list = Labroom::get($labroom_booking_ID);
            
            require_once('views/labroom/delete_labroom.php');
        }
        public function delete()
        {
            $labroom_booking_ID = $_GET['labroom_booking_ID'];
            Labroom::delete($labroom_booking_ID);
            labroomController::index();
        }
    
        public function search()
        {
            $key = $_GET['key'];
            $labroom_list = Labroom::search($key);
            require_once('views/labroom/index_labroom.php');
        }
    }
    