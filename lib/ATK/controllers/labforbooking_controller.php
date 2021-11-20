<?php
    class labforbookingController
    {
        public function index()
        {
            $labforbook_list = Labforbooking::getAll();
            require_once('views/labroomForbooking/index_labforbook.php');
        }
        public function newlabforbooking()
        {
            $labforbook_list = Labforbooking::getAll();
            require_once('views/labroomForbooking/new_labforbooking.php');
        }
    
        public function addlabforbooking()
        {
            $labroom_ID = $_GET["labroom_ID"];
            $labName = $_GET["labName"];
            $Status = $_GET["Status"];
    
            Labforbooking::add($labroom_ID, $labName,$Status);
            labforbookingController::index();
        }
        public function update_labforbooking()
        {
            $labroom_ID = $_GET['labroom_ID'];
            //echo $labroom_ID;
            $labforbook_list = Labforbooking::get($labroom_ID);
            require_once('views/labroomForbooking/update_labforbook.php');
        }
        public function update()
        {
            $labroom_ID = $_GET['labroom_ID'];
            $labName = $_GET['labName'];
            $Status = $_GET['Status'];
           
            Labforbooking::update($labroom_ID,$labName,$Status);
            labforbookingController::index();
        }
        public function delete_labforbooking()
        {
            $labroom_ID = $_GET['labroom_ID'];
            //echo $labroom_ID;
            $labforbook_list = Labforbooking::get($labroom_ID);
            
            require_once('views/labroomForbooking/delete_labforbook.php');
        }
        public function delete()
        {
            $labroom_ID = $_GET['labroom_ID'];
            Labforbooking::delete($labroom_ID);
            labforbookingController::index();
        }
    
        public function search()
        {
            $key = $_GET['key'];
            $labforbook_list = Labforbooking::search($key);
            require_once('views/labroomForbooking/index_labforbook.php');
        }
    }
    