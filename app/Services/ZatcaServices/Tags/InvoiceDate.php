<?php

namespace Services\ZatcaServices\Tags;

use Services\ZatcaServices\Tag;

class InvoiceDate extends Tag
{
    public function __construct($value)
    {
        parent::__construct(3, $value);
    }
}
