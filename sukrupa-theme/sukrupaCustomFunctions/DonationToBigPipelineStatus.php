<?php

 
class DonationToBigPipelineStatus {

    private $_sukrupaRequestHandler;

    function __construct(SukrupaRequestHandler $sukrupaRequestHandlerInput)
    {
        $this->_sukrupaRequestHandler = $sukrupaRequestHandlerInput;
    }

    public function getHighPriorityBigPipelineItem(){
        $highPriorityBigNeedItemInfo=$this->_sukrupaRequestHandler->requestData("./getHighPriorityBigNeedItem");
        return $highPriorityBigNeedItemInfo->{'highPriorityBigNeedItem'};
    }

    public function getTotalCostOfBigPipelineItem(){
        $highPriorityBigNeedItemInfo=$this->_sukrupaRequestHandler->requestData("./getHighPriorityBigNeedItem/totalCost");
        return $highPriorityBigNeedItemInfo->{'bigNeedItemTotalCost'};
    }

    public function getAmountDonatedToBigPipeLineItem(){
        $highPriorityBigNeedItemInfo=$this->_sukrupaRequestHandler->requestData("./getHighPriorityBigNeedItem/amountDonated");
        return $highPriorityBigNeedItemInfo->{'bigNeedItemAmountDonated'};
    }

}
