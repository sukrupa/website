<?php
/**
 * Created by IntelliJ IDEA.
 * User: sreerajan
 * Date: 15/7/11
 * Time: 9:27 AM
 * To change this template use File | Settings | File Templates.
 */
 
class DonationToBigPipelineStatus {


    private $_sukrupaRequestHandler;

    function __construct(SukrupaRequestHandler $sukrupaRequestHandlerInput)
    {
        $this->_sukrupaRequestHandler = $sukrupaRequestHandlerInput;
    }

    public function getHighPriorityBigPipelineItem(){
        return $this->_sukrupaRequestHandler->getHighPriorityBigPipelineItem();


    }
}
