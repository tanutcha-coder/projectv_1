<?php
    $controllers = array(
        'pages'=>['home','error'],
        'rtpcrtesting'=>['index', 'newRTPCR','addRTPCR','update_rtpcr','update','delete_rtpcr','delete','search'],
        'labroom'=>['index','newlabroom','addlabroom','update_labroom','update','delete_labroom','delete','search'],
        'labanalyst'=>['index','newlabana','addlabana','update_labana','update','delete_labana','delete','search'],
        'labforbooking'=>['index','newlabforbooking','addlabforbooking','update_labforbooking','update','delete_labforbooking','delete','search']


);

    function call($controller,$action){
       //echo "routes to ".$controller."-".$action."<br>";
        require_once("controllers/".$controller."_controller.php");
        switch($controller)
        {
            case "pages" : $controller = new PagesController();
                           break;
            case "rtpcrtesting" :
                $controller = new rtpcrController();
                 require_once("models/rtpcrtestingModel.php");
                 require_once("models/labroomModel.php");
                 require_once("models/lab_analystModel.php");
                 require_once("models/ATKModel.php");
                 require_once("models/officerModel.php");
                 break;
            case "labroom":
                $controller = new labroomController();
                require_once("models/labroomModel.php");
                require_once("models/labforbookingModel.php");
                require_once("models/lab_analystModel.php");
                break;
            case "labanalyst" :
                $controller = new labanaController();
                require_once("models/lab_analystModel.php");
                break;
            case "labforbooking" :
                $controller = new labforbookingController();
                require_once("models/labforbookingModel.php");
                break;
          
        }
        $controller->{$action}();
    }
    if(array_key_exists($controller,$controllers))
    {
        if(in_array($action,$controllers[$controller]))
        {
            call($controller,$action);
        }
        else
        {
            call('pages','error');
        }
    }
    else
    {
        call('pages','error');
    }
?>