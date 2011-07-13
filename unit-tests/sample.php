<?php
/**
 * Created by IntelliJ IDEA.
 * User: aravindp
 * Date: 7/12/11
 * Time: 4:40 PM
 * To change this template use File | Settings | File Templates.
 */

class SponsorshipWidgetTest extends PHPUnit_Framework_TestCase {

    /** @test */
    public function itShouldCalculateThePercentageOfSponsoredChildrenRoundedDownToTheNearest5()
    {
        $httpServiceMock = $this->getMock('SukrupaRequestHandler', array('getNumberOfStudents','getNumberOfStudentsSponsored'));

        $httpServiceMock->expects($this->once())
                ->method('getNumberOfStudents')
                ->will($this->returnValue(400));

        $httpServiceMock->expects($this->once())
                ->method('getNumberOfStudentsSponsored')
                ->will($this->returnValue(238));

        $sponsorshipWidget = new SponsorshipWidget($httpServiceMock);
        $this->assertEquals(55,$sponsorshipWidget->progressComplete());
    }

}
