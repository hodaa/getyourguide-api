<?php

use PHPUnit\Framework\TestCase;
use GetYourGuide\Product;
use GetYourGuide\DriverFactory;
use GetYourGuide\Parser;

class ProductTest extends TestCase
{
    public function testIsValidReturnArray()
    {
        $driver = 'API';
        $resource = DriverFactory::create($driver);

        $obj = new Product($resource->getResource(), new Parser());
        $products = $obj->isAvailable('2017-11-20T09:30', '2017-11-23T19:30', 2);
        $this->assertTrue(is_array(json_decode($products)));
    }
}
