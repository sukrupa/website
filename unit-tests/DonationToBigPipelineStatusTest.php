<?php

require_once 'PHPUnit/Autoload.php';
require_once '../sukrupa-theme/sukrupaCustomFunctions/DonationToBigPipelineStatus.php';

class DonationToBigPipelineStatusTest extends PHPUnit_Framework_TestCase {

    /** @test */
    public function shouldReturnTheFirstBigNeedOnHomepage()
    {
        $httpServiceMock = $this->getMock('SukrupaRequestHandler', array('requestData'));

        $json = '{"highPriorityBigNeedItem": "Power Generator"}';

        $httpServiceMock->expects($this->once())
                ->method('requestData')
                ->will($this->returnValue(json_decode($json)));

        $donationToBigPipelineStatus = new DonationToBigPipelineStatus($httpServiceMock);
        $this->assertEquals("Power Generator",$donationToBigPipelineStatus->getHighPriorityBigPipelineItem());
    }

    /** @test */
    public function shouldReturnTheTotalCostOfBigNeedItem()
    {
        $httpServiceMock = $this->getMock('SukrupaRequestHandler', array('requestData'));

        $json = '{"bigNeedItemTotalCost": "50000"}';

        $httpServiceMock->expects($this->once())
                ->method('requestData')
                ->will($this->returnValue(json_decode($json)));

        $donationToBigPipelineStatus = new DonationToBigPipelineStatus($httpServiceMock);
        $this->assertEquals("50000",$donationToBigPipelineStatus->getTotalCostOfBigPipelineItem());
    }

    /** @test */
    public function shouldReturnAmountDonatedToBigNeedItem()
    {
        $httpServiceMock = $this->getMock('SukrupaRequestHandler', array('requestData'));

        $json = '{"bigNeedItemAmountDonated": "20000"}';

        $httpServiceMock->expects($this->once())
                ->method('requestData')
                ->will($this->returnValue(json_decode($json)));

        $donationToBigPipelineStatus = new DonationToBigPipelineStatus($httpServiceMock);
        $this->assertEquals("20000",$donationToBigPipelineStatus->getAmountDonatedToBigPipeLineItem());
    }


}
