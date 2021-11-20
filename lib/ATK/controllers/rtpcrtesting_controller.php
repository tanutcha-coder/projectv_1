<?php
class rtpcrController
{
    public function index()
    {
        $rtpcr_list = Rtpcrtesting::getAll();
        $officer_list = Officer::getAll();

        // echo print_r($rtpcr_list);
        require_once('views/rtpcrtesting/index_rtpcr.php');
    }

    public function newRTPCR()
    {
        $lab_analyst_list = Lab_analyst::getAll();
        $labroom_list = Labroom::getAll();
        $ATK_list = ATK::getAll();
        $officer_list = Officer::getAll();
        require_once('views/rtpcrtesting/new_rtpcr.php');
    }

    public function addRTPCR()
    {
        $rtpcrtesting_ID = $_GET['rtpcrtesting_ID'];
        $TestingID = $_GET['TestingID'];
        $labroom_booking_ID = $_GET['labroom_booking_ID'];
        $rtpcr_datetime = $_GET['rtpcr_datetime'];
        $rtpcr_result = $_GET['rtpcr_result'];
        $officer_ID = $_GET['officer_ID'];

        Rtpcrtesting::add($rtpcrtesting_ID, $TestingID, $labroom_booking_ID,$rtpcr_datetime,$rtpcr_result,$officer_ID);
        rtpcrController::index();
    }
    public function update_rtpcr()
    {
        $rtpcrtesting_ID = $_GET['rtpcrtesting_ID'];
        //echo $rtpcrtesting_ID;
        $rtpcr_list = Rtpcrtesting::get($rtpcrtesting_ID);
        $officer_list = Officer::getAll();
        $labroom_list = Labroom::getAll();
        $ATK_list = ATK::getAll();
        require_once('views/rtpcrtesting/update_rtpcr.php');
    }
    public function update()
    {
        $rtpcrtesting_ID = $_GET['rtpcrtesting_ID'];
        $TestingID = $_GET['TestingID'];
        $labroom_booking_ID = $_GET['labroom_booking_ID'];
        $rtpcr_datetime = $_GET['rtpcr_datetime'];
        $rtpcr_result = $_GET['rtpcr_result'];
        $officer_ID = $_GET['officer_ID'];
        Rtpcrtesting::update($rtpcrtesting_ID, $TestingID, $labroom_booking_ID,$rtpcr_datetime,$rtpcr_result,$officer_ID);
        rtpcrController::index();
    }
    public function delete_rtpcr()
    {
        $rtpcrtesting_ID = $_GET['rtpcrtesting_ID'];
        //echo $rtpcrtesting_ID;
        $rtpcr_list = Rtpcrtesting::get($rtpcrtesting_ID);
        
        require_once('views/rtpcrtesting/delete_rtpcr.php');
    }
    public function delete()
    {
        $rtpcrtesting_ID = $_GET['rtpcrtesting_ID'];
        Rtpcrtesting::delete($rtpcrtesting_ID);
        rtpcrController::index();
    }

    public function search()
    {
        $key = $_GET['key'];
        $rtpcr_list = Rtpcrtesting::search($key);
        require_once('views/rtpcrtesting/index_rtpcr.php');
    }
}
