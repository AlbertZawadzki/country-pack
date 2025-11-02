<?php

namespace CountryPack\Dto;

use CountryPack\Enum\Iso4217;

readonly class CurrencyDto
{
    public function __construct(
        public Iso4217 $code,
        public ?string $name = null,
        public ?string $sign = null,
    )
    {
    }
}