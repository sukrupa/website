<?php

class SponsorshipWidget
{

    private $_sukrupaRequestHandler;

    // ToDo: Anita & Mike: should by default has a new SukrupaRequestHandler instance
    // but lack of php knowledge need to postpone this
    function __construct(SukrupaRequestHandler $sukrupaRequestHandlerInput)
    {
        $this->_sukrupaRequestHandler = $sukrupaRequestHandlerInput;
    }

    public function progressComplete()
    {
        return $this->_sukrupaRequestHandler->getNumberOfStudents();
    }
}
