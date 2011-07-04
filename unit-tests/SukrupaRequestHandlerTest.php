<?php

require_once '../sukrupa-theme/sukrupaCustomFunctions/SukrupaRequestHandler.php';

class SukrupaRequestHandlerTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function returnDummyValueForRenderingWebpage(){
        $sukrupaRequestHandler = new SukrupaRequestHandler();
        $this->assertEquals(450, $sukrupaRequestHandler->getNumberOfStudents());
        $this->assertEquals(301, $sukrupaRequestHandler->getNumberOfStudentsSponsored());
    }
}

