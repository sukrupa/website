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
    public function requestData(){
        $response = file_get_contents(getAdminLink()."/getsponsorshipinfo");
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
}
