<?php

require_once 'PHPUnit/Autoload.php';
require_once '../sukrupa-theme/sukrupaCustomFunctions/DonationToSmallPipelineStatus.php';


class DonationToSmallPipelineStatusTest extends PHPUnit_Framework_TestCase {

    /** @test */
    public function shouldReturnTheFiveSmallNeedItemsOnHomepage()
    {
        $httpServiceMock = $this->getMock('SukrupaRequestHandler', array('requestData'));
        $smallNeedList=array(
            'Pencil' => 200.0,
            'Uniform' => 250.0,
            'Bag' => 1000.0,
            'Desk' => 8000.0,
            'Chair' => 6000.0,
        );

        echo $smallNeedList;

        $json = '{"smallNeedItems": $smallNeedList}';
        echo $json;

        $httpServiceMock->expects($this->once())
                ->method('requestData')
                ->will($this->returnValue(json_decode($json)));

        $donationToSmallPipelineStatus = new DonationToSmallPipelineStatus($httpServiceMock);
        $smallNeedListGot=$donationToSmallPipelineStatus->getSmallPipelineItems();
        $this->assertEquals(json_decode($smallNeedList),$smallNeedListGot);
    }

}
