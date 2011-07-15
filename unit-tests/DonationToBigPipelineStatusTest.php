<?php

require_once 'PHPUnit/Autoload.php';
require_once '../sukrupa-theme/sukrupaCustomFunctions/DonationToBigPipelineStatus.php';

class DonationToBigPipelineStatusTest extends PHPUnit_Framework_TestCase {

    /** @test */
    public function shouldReturnTheFirstBigNeed()
    {
        $httpServiceMock = $this->getMock('SukrupaRequestHandler', array('getHighPriorityBigPipelineItem'));

        $httpServiceMock->expects($this->once())
                ->method('getHighPriorityBigPipelineItem')
                ->will($this->returnValue("Power Generator"));

        $donationToBigPipelineStatus = new DonationToBigPipelineStatus($httpServiceMock);
        $this->assertEquals("Power Generator",$donationToBigPipelineStatus->getHighPriorityBigPipelineItem());
    }

}
