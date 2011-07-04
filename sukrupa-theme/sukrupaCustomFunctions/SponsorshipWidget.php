<?php

class SponsorshipWidget
{

    private $_sukrupaRequestHandler;

    function __construct(SukrupaRequestHandler $sukrupaRequestHandlerInput)
    {
        $this->_sukrupaRequestHandler = $sukrupaRequestHandlerInput;
    }

    public function progressComplete()
    {
        return $this->_sukrupaRequestHandler->getNumberOfStudents();
    }
}

?>
