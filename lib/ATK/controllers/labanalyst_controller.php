<?php
    class labanaController
    {
        public function index()
        {
            $labana_list = Lab_analyst::getAll();
            require_once('views/lab_analyst/index_lab_analyst.php');
        }
        public function newlabana()
        {
            $labana_list = Lab_analyst::getAll();
            require_once('views/lab_analyst/new_lab_analyst.php');
        }
    
        public function addlabana()
        {
            $labanalyst_ID = $_GET['labanalyst_ID'];
            $labanalyst_Name = $_GET['labanalyst_Name'];
            $labanalyst_Lname = $_GET['labanalyst_Lname'];
            $Address = $_GET['Address'];
    
            Lab_analyst::add($labanalyst_ID,$labanalyst_Name,$labanalyst_Lname,$Address);
            labanaController::index();
        }
        public function update_labana()
        {
            $labanalyst_ID = $_GET['labanalyst_ID'];
            //echo $labanalyst_ID;
            $labana_list = Lab_analyst::get($labanalyst_ID);
            
            require_once('views/lab_analyst/ีupdate_lab_analyst.php');
        }
        public function update()
        {
            $labanalyst_ID = $_GET["labanalyst_ID"];
            $labanalyst_Name = $_GET["labanalyst_Name"];
            $labanalyst_Lname = $_GET["labanalyst_Lname"];
            $Address = $_GET["Address"];
            Lab_analyst::update($labanalyst_ID,$labanalyst_Name,$labanalyst_Lname,$Address);
            labanaController::index();
        }
        public function delete_labana()
        {
            $labanalyst_ID = $_GET['labanalyst_ID'];
            //echo $labanalyst_ID;
            $labana_list = Lab_analyst::get($labanalyst_ID);
            
            require_once('views/lab_analyst/delete_lab_analyst.php');
        }
        public function delete()
        {
            $labanalyst_ID = $_GET['labanalyst_ID'];
            Lab_analyst::delete($labanalyst_ID);
            labanaController::index();
        }
    
        public function search()
        {
            $key = $_GET['key'];
            $labana_list = Lab_analyst::search($key);
            require_once('views/lab_analyst/index_lab_analyst.php');
        }
        
    }
    