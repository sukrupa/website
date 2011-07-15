<?php

require_once 'PHPUnit/Autoload.php';
require_once '../sukrupa-theme/sukrupaCustomFunctions/DonationToBigPipelineStatus.php';

class DonationToBigPipelineStatusTest extends PHPUnit_Framework_TestCase {

    /** @test */
    public function shouldReturnTheFirstBigNeed()
    {
        $httpServiceMock = $this->getMock('SukrupaRequestHandler', array('requestData'));

        $json = '{"highPriorityBigNeedItem": "Power Generator"}';

        $httpServiceMock->expects($this->once())
                ->method('requestData')
                ->will($this->returnValue(json_decode($json)));

        $donationToBigPipelineStatus = new DonationToBigPipelineStatus($httpServiceMock);
        $this->assertEquals("Power Generator",$donationToBigPipelineStatus->getHighPriorityBigPipelineItem());
    }

}
