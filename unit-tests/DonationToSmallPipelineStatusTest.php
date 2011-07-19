<?php
require_once 'PHPUnit/Autoload.php';
require_once '../sukrupa-theme/sukrupaCustomFunctions/DonationToSmallPipelineStatus.php';


class DonationToSmallPipelineStatusTest extends PHPUnit_Framework_TestCase {

      /** @test */
    public function shouldReturnTheFiveSmallNeedItemsOnHomepage()
    {
        $httpServiceMock = $this->getMock('SukrupaRequestHandler', array('requestData'));

        $json = '{"smallNeedItems": ["Pencil","200.0","Uniform","250.0"]}';
        //echo $json;

        $httpServiceMock->expects($this->once())
                ->method('requestData')
                ->will($this->returnValue(json_decode($json)));

        $donationToSmallPipelineStatus = new DonationToSmallPipelineStatus($httpServiceMock);
        $smallNeedListGot=$donationToSmallPipelineStatus->getSmallPipelineItems();

        $this->assertEquals($smallNeedListGot[0],("Pencil"));
        $this->assertEquals($smallNeedListGot[1],("200.0"));
    }

}

