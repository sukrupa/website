<?php

class SponsoredChildrenStatus
{

    const ROUNDING_TO_5_PERCENT = 5;
    private $_sukrupaRequestHandler;
    private $_sponsorshipInfo;

    // ToDo: Anita & Mike: should by default has a new SukrupaRequestHandler instance
    // but lack of php knowledge need to postpone this
    function __construct(SukrupaRequestHandler $sukrupaRequestHandlerInput)
    {
        $this->_sukrupaRequestHandler = $sukrupaRequestHandlerInput;
        $this->_sponsorshipInfo = $this->_sukrupaRequestHandler->requestData("/getsponsorshipinfo");
    }

    public function progressComplete()
    {
        $numberOfStudents = $this->getNumberOfStudents();
        $numberOfStudentsSponsored = $this->getNumberOfStudentsSponsored();

        $sponsoredPercentageAbsolute = $numberOfStudentsSponsored / $numberOfStudents * 100;
        return ((int)($sponsoredPercentageAbsolute/ self::ROUNDING_TO_5_PERCENT))* self::ROUNDING_TO_5_PERCENT;
    }

    public function getNumberOfStudents(){
       return $this->_sponsorshipInfo->{'numberOfStudents'};
    }

    public function getNumberOfStudentsSponsored(){
        return $this->_sponsorshipInfo->{'numberOfStudentsSponsored'};
    }

    public function getErrorMessageIfAny(){
        return $this->_sukrupaRequestHandler->getErrorMessageIfAny();
    }
}
