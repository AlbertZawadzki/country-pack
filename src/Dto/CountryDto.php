<?php

namespace CountryPack\Dto;

use CountryPack\Enum\Iso31661Alpha2;
use CountryPack\Enum\Iso31661Alpha3;
use CountryPack\Enum\Iso31661Numeric;

readonly class CountryDto
{
    public function __construct(
        public ?string          $name,
        public ?CurrencyDto     $currency,
        public Iso31661Alpha2   $iso31661Alpha2,
        public ?Iso31661Alpha3  $iso31661Alpha3,
        public ?Iso31661Numeric $iso31661Numeric,
        public ?string          $imageUrl,
    )
    {
    }
}