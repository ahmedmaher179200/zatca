<?php

namespace Services\ZatcaServices\Tags;

use App\Services\ZatcaServices\Tag;

class InvoiceTaxAmount extends Tag
{
    public function __construct($value)
    {
        parent::__construct(5, $value);
    }
}
