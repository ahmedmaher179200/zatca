<?php

namespace Services\ZatcaServices\Tags;

use App\Services\ZatcaServices\Tag;

class TaxNumber extends Tag
{
    public function __construct($value)
    {
        parent::__construct(2, $value);
    }
}
