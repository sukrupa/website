<?php

require_once '../sukrupa-theme/sukrupaCustomFunctions/SponsorshipWidget.php';
require_once '../sukrupa-theme/sukrupaCustomFunctions/SukrupaRequestHandler.php';

class SponsorshipWidgetTest extends PHPUnit_Framework_TestCase {

    /** @test */
    public function itShouldMakeAHttpRequestToTheAdminSystem()
    {
        $httpServiceMock = $this->getMock('SukrupaRequestHandler', array('getNumberOfStudents'));

        $httpServiceMock->expects($this->once())
                  ->method('getNumberOfStudents');

        $sponsorshipWidget = new SponsorshipWidget($httpServiceMock);
        $sponsorshipWidget->progressComplete();

 //            ->method('progressComplete');
 //                 ->with($this->equalTo('params'));

    }
}
?>

