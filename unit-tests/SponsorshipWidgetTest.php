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

    /** @test */
    public function justAFirstRunningTestShouldBeDeletedOnceWeHAveAnotherRunningTest()
    {
        $sponsorshipWidget = new SponsorshipWidget(null);
        $this->assertEquals(1, $sponsorshipWidget->justATestMethodReturning1() );
    }

    /** @test */
    public function justAnotherTestShouldBeDeletedOnceWeHAveAnotherRunningTest()
    {
        $sponsorshipWidget = new SponsorshipWidget(5);
        $this->assertEquals(5, $sponsorshipWidget->justATestMethodWhichShouldReturnWhatWePassInAtConstructionTime() );
    }

     /** @test */
    public function itShouldCallAMethodOfTheConstructorObject()
    {

        $sponsorshipWidget = new SponsorshipWidget(new SukrupaRequestHandler());

        $this->assertEquals("percent55",$sponsorshipWidget->progressComplete());

 //            ->method('progressComplete');
 //                 ->with($this->equalTo('params'));

    }
}
?>

