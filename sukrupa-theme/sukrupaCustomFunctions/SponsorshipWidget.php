<?php

class SponsorshipWidget
{

    const ROUNDING_TO_5_PERCENT = 5;
    private $_sukrupaRequestHandler;

    // ToDo: Anita & Mike: should by default has a new SukrupaRequestHandler instance
    // but lack of php knowledge need to postpone this
    function __construct(SukrupaRequestHandler $sukrupaRequestHandlerInput)
    {
        $this->_sukrupaRequestHandler = $sukrupaRequestHandlerInput;
    }

    public function progressComplete()
    {
        $numberOfStudents = $this->_sukrupaRequestHandler->getNumberOfStudents();
        $numberOfStudentsSponsored = $this->_sukrupaRequestHandler->getNumberOfStudentsSponsored();

        $sponsoredPercentageAbsolute = $numberOfStudentsSponsored / $numberOfStudents * 100;
        return ((int)($sponsoredPercentageAbsolute/ self::ROUNDING_TO_5_PERCENT))* self::ROUNDING_TO_5_PERCENT;
    }
}
