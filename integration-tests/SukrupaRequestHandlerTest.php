<?php

require_once '../sukrupa-theme/sukrupaCustomFunctions/SukrupaRequestHandler.php';

class SukrupaRequestHandlerTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function returnValueForRenderingWebpageFromAdminSite(){
        $_SERVER['REMOTE_ADDR'] = "127.0.0.1";
        $sukrupaRequestHandler = new SukrupaRequestHandler();
        $this->assertNotNull($sukrupaRequestHandler->getNumberOfStudents());
        $this->assertNotNull($sukrupaRequestHandler->getNumberOfStudentsSponsored());
    }
}

