<?php

namespace Services\ZatcaServices\Tags;

use Services\ZatcaServices\Tag;

class Seller extends Tag
{
    public function __construct($value)
    {
        parent::__construct(1, $value);
    }
}
