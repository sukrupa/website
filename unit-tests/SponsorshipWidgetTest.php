<?php

require_once '../sukrupa-theme/sukrupaCustomFunctions/SponsorshipWidget.php';

class SponsorshipWidgetTest extends PHPUnit_Framework_TestCase {

    /** @test */
    public function itShouldMakeAHttpRequestToTheAdminSystem()
    {
        $httpServiceMock = $this->getMock('SukrupaRequestHandler', array('getNumberOfStudents'));

        $httpServiceMock->expects($this->once())
                ->method('getNumberOfStudents')
                ->will($this->returnValue(345));;

        $sponsorshipWidget = new SponsorshipWidget($httpServiceMock);
        $this->assertEquals(345,$sponsorshipWidget->progressComplete());
    }
}
?>

