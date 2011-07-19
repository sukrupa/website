<?php
require_once 'PHPUnit/Autoload.php';

class DonateSmallPipelineTest extends PHPUnit_Framework_TestCase {
    /** @test */
    public function ShouldDisplaySmallNeedsMenu()
    {
        $html=file_get_contents('http://sukrupa.localhost');
        $this->assertContains("SMALL NEEDS", $html);
    }

    /** @test */
    public function ShouldDisplayItemName()
    {
        $html=file_get_contents('http://sukrupa.localhost');
        $this->assertContains("Item Name", $html);
    }

    /** @test */
    public function ShouldDisplayCost()
    {
        $html=file_get_contents('http://sukrupa.localhost');
        $this->assertContains("Cost", $html);
    }

}
