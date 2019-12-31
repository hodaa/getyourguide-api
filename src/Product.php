<?php

namespace GetYourGuide;

class Product
{
    private $resource;
    private $formatedProduct;

    public function __construct($resource, Parser $parser)
    {
        $this->resource = $resource;
        $this->formatedProduct = $parser;
    }

    public function isAvailable($start, $end, $travelersNo)
    {
        $this->validateInputs($start, $end, $travelersNo);
        $availableProduct = [];
        foreach ($this->resource->product_availabilities as $item) {
            $itemEndDate = $this->calculateEndDate($item->activity_start_datetime, $item->activity_duration_in_minutes);
            if (strtotime($item->activity_start_datetime) > strtotime($start) &&
                $itemEndDate < strtotime($end) &&
                $item->places_available >= $travelersNo) {
                $availableProduct[] = $this->formatedProduct->parse($item, $itemEndDate);
            }
        }

        usort($availableProduct, function ($a, $b) {
            return $a['available_starttimes'] <=> $b['available_starttimes'];
        });

        return json_encode($availableProduct);
    }

    public function validateInputs($start, $end, $travelersNo)
    {
        if ($travelersNo >= 30 || $travelersNo <= 0) {
            die('Number of travelers should be between 1 and 30');
        }

        if (empty($this->resource)) {
            die('No Data Found');
        }
        if (!$this->validateDate($start)) {
            die("Please Enter start date in  'Y-m-d\TH:i' format ");
        }
        if (!$this->validateDate($end)) {
            die("Please Enter end date in  'Y-m-d\TH:i' format ");
        }
    }

    public function validateDate($date)
    {
        $format = 'Y-m-d\TH:i';
        $d = \DateTime::createFromFormat($format, $date);

        return $d && $d->format($format) == $date;
    }

    public function calculateEndDate($start, $duration)
    {
        return strtotime($start) + ($duration * 60);
    }
}
