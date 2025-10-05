<?php

namespace Services\ZatcaServices\Tags;

use Services\ZatcaServices\Tag;

class InvoiceTotalAmount extends Tag
{
    public function __construct($value)
    {
        parent::__construct(4, $value);
    }
}
