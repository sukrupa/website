<?php

class DonationToSmallPipelineStatus {

    private $_sukrupaRequestHandler;

    function __construct(SukrupaRequestHandler $sukrupaRequestHandlerInput)
    {
        $this->_sukrupaRequestHandler = $sukrupaRequestHandlerInput;
    }

    public function getSmallPipelineItems(){
        $smallNeedList=$this->_sukrupaRequestHandler->requestData("./getSmallNeedListForDonation");
        return $smallNeedList->{'smallNeedItems'};
    }

}

