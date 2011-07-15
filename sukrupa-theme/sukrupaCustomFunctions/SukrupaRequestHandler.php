<?php
/**
 * Created by IntelliJ IDEA.
 * User: nbailey
 * Date: 04/07/2011
 * Time: 14:04
 * To change this template use File | Settings | File Templates.
 */
class SukrupaRequestHandler
{
    private $sponsorshipinfo;
    private $msg;
    public function getAdminLink(){
     if ( $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ) {
	     return "http://127.0.0.1:8080";
    } else {
	     return "http://school.sukrupa.org";
    }

}
    public function requestData(){
        $response = @file_get_contents($this->getAdminLink()."/getsponsorshipinfo");
        if(!$response)
            $this->msg = "Unable to connect to Admin Server";
        else
            $this->msg = "";
        $this->sponsorshipinfo = json_decode($response);
    }
    public function getNumberOfStudents()
    {
       $this->requestData();
       return $this->sponsorshipinfo->{'numberOfStudents'};
    }

    public function getNumberOfStudentsSponsored()
    {
        $this->requestData();
        return $this->sponsorshipinfo->{'numberOfStudentsSponsored'};
    }
    public function getBigPipelineNeed(){

    }
    public function getErrorMessageIfAny(){
        return $this->msg;
    }
}
