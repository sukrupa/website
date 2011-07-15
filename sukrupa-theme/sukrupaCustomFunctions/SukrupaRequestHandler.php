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
    private $msg;
    public function getAdminLink(){
     if ( $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ) {
	     return "http://127.0.0.1:8080";
        }
     else {
	     return "http://school.sukrupa.org";
        }
    }

    public function requestData($controllerMapping){
        $response = @file_get_contents($this->getAdminLink().$controllerMapping);
        if(!$response)
            $this->msg = "Unable to connect to Admin Server";
        else
            $this->msg = "";
        return json_decode($response);
    }


    public function getErrorMessageIfAny(){
        return $this->msg;
    }
}
