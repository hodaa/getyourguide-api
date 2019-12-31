<?php

use GetYourGuide\DriverFactory;
use PHPUnit\Framework\TestCase;

class DriverFactoryTest extends TestCase
{
    public function testAPIDriverIsClass()
    {
        $this->assertInstanceOf(\GetYourGuide\Drivers\API::class, DriverFactory::create('API'));
    }

    public function tesDBDriverIsClass()
    {
        $this->assertInstanceOf(\GetYourGuide\Drivers\DB::class, DriverFactory::create('DB'));
    }
}
