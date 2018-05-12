<?php

use PHPUnit\Framework\TestCase;
use GetYourGuide\DriverFactory;

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