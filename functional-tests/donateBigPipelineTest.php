<?php

require_once 'PHPUnit/Autoload.php';


class donateBigPipelineTest extends PHPUnit_Framework_TestCase {

    /** @test */
    public function ShouldDisplayClickHereToDonateLink()
    {
        $html=file_get_contents('http://sukrupa.localhost');
        $this->assertContains("Click here to donate", $html);
    }


    /** @test */
    public function shouldDisplayMentionItInAddMessage(){
        $html=file_get_contents('http://sukrupa.localhost/big-pipe-line-donation');
        $this->assertContains("Please \"Add a message\" including ", $html);
    }
}
