<?php

require_once 'PHPUnit/Autoload.php';
require_once '../sukrupa-theme/sukrupaCustomFunctions/SponsorshipWidget.php';

class UpdateBigPipeLineTest extends PHPUnit_Framework_TestCase {

    /** @test */
    public function shouldReturnTheFirstBigNeed()
    {
        $httpServiceMock = $this->getMock('SukrupaRequestHandler');

        $httpServiceMock->expects($this->once())
                ->method('getBigPipelineNeed')
                ->will($this->returnValue("Power Generator"));


        $UpdateBigPipelineWidget = new UpdateBigPipeLineWidget($httpServiceMock);
        $this->assertEquals("Power Generator",$UpdateBigPipelineWidget->getTheBigPipeLineItem());
    }

}
