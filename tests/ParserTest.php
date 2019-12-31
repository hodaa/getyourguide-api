<?php

use PHPUnit\Framework\TestCase;
use GetYourGuide\Parser;

class ParserTest extends TestCase
{
    public function testReturnIsJsonFormat()
    {
        $item = new stdClass();
        $item->product_id = 1;
        $item->activity_start_datetime = "2017-11-20T09:30";

        $parser = new Parser();
        $result = $parser->parse($item, strtotime("2017-11-21T09:30"));

        $this->assertArrayHasKey('available_starttimes', $result);
    }

    public function testParsedDataAvailableStarttimes()
    {
        $item = new stdClass();
        $item->product_id = 1;
        $item->activity_start_datetime = "2017-11-20T09:30";

        $parser = new Parser();
        $result = $parser->parse($item, strtotime("2017-11-21T09:30"));

        $this->assertTrue(is_array($result['available_starttimes']));
    }
}
