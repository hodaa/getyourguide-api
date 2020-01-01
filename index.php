<?php

require "vendor/autoload.php";

use GetYourGuide\DriverFactory;
use GetYourGuide\Parser;
use GetYourGuide\Product;

$driver = 'API';

$resource = DriverFactory::create($driver);
$product = new Product($resource->getResource(), new Parser());

if (defined('STDIN')) {
    isset($argv[1]) ? $start_date = ($argv[1]) : die('You should enter start date');
    isset($argv[2]) ? $end_date = ($argv[2]) : die('You should enter end date');
    isset($argv[3]) ? $travellers_no = ($argv[3]) : die('You should enter travellers number');
    echo $product->isAvailable($start_date, $end_date, $travellers_no);
} else {
    die('Please use CLI not browser');
}
