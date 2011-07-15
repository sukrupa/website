<?php

require_once 'PHPUnit/Autoload.php';
require_once '../sukrupa-theme/sukrupaCustomFunctions/SponsoredChildrenStatus.php';

class SponsoredChildrenStatusTest extends PHPUnit_Framework_TestCase {

    /** @test */
    public function itShouldCalculateThePercentageOfSponsoredChildrenRoundedDownToTheNearest5()
    {
        $httpServiceMock = $this->getMock('SukrupaRequestHandler', array('requestData'));

        $json = '{"numberOfStudents":400,"numberOfStudentsSponsored":238}';

        $httpServiceMock->expects($this->once())
                ->method('requestData')
                ->will($this->returnValue(json_decode($json)));

        $sponsorshipWidget = new SponsoredChildrenStatus($httpServiceMock);
        $this->assertEquals(55,$sponsorshipWidget->progressComplete());
    }

}


