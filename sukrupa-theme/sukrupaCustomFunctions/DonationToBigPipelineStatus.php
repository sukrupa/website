<?php

 
class DonationToBigPipelineStatus {

    private $_sukrupaRequestHandler;
    const ROUNDING_TO_5_PERCENT = 5;

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

    public function progressComplete()
    {
        $totalCostOfBigNeed = $this->getTotalCostOfBigPipelineItem();
        $amountDonatedForBigNeed = $this->getAmountDonatedToBigPipeLineItem();

        $percentageOfDonatedAmountAbsolute = $amountDonatedForBigNeed / $totalCostOfBigNeed * 100;
        $roundedPercentage=((int)($percentageOfDonatedAmountAbsolute/ self::ROUNDING_TO_5_PERCENT))* self::ROUNDING_TO_5_PERCENT;

        if ($roundedPercentage>=90)
            $roundedPercentage=85;
        return $roundedPercentage;
    }

}
