<?php

namespace GetYourGuide;

class Parser
{
    public function parse($item, $itemEndDate)
    {
        return [
            'product_id' => $item->product_id,
            'available_starttimes' => [
                    $item->activity_start_datetime,
                    date('Y-m-d\TH:i', $itemEndDate),
                ],
        ];
    }
}
