<?php

require_once '../sukrupa-theme/sukrupaCustomFunctions/SponsorshipWidget.php';

class SponsorshipWidgetTest extends PHPUnit_Framework_TestCase {

    /** @test */
    public function itShouldMakeAHttpRequestToTheAdminSystem()
    {
//        $httpServiceMock = $this->getMock('HttpService');
//
//        $httpServiceMock->expects($this->once())
//                 ->method('requestSponsorshipInfoFromAdminSystem')
//                 ->with($this->equalTo('params'));

//        $sponsorshipWidget = new SponsorshipWidget($httpServiceMock);
        $sponsorshipWidget = new SponsorshipWidget();

        // Call the doSomething() method on the $subject object
        // which we expect to call the mocked Observer object's
        // update() method with the string 'something'.
        $this->assertEquals(1, $sponsorshipWidget->requestSponsorshipInfoFromAdminSystem() );
    }
}
?>

