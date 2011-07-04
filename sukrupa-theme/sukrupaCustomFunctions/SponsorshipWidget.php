<?php

class SponsorshipWidget
{

    var $sukrupaRequestHandler;

    function __construct($sukrupaRequestHandlerInput)
    {
        $this->sukrupaRequestHandler = $sukrupaRequestHandlerInput;
    }

    public function progressComplete()
    {
        $this->sukrupaRequestHandler.getNumberOfStudents();
        return "percent55";
    }

    public function justATestMethodReturning1()
    {
        return 1;
    }

    public function justATestMethodWhichShouldReturnWhatWePassInAtConstructionTime()
    {
        return $this->sukrupaRequestHandler;
    }
}

?>
