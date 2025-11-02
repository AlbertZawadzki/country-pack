<?php

namespace CountryPack\Dto;

readonly class StateDto
{
    public function __construct(
        public CountryDto $country,
        public string     $name,
        public ?string    $code,
    )
    {
    }
}