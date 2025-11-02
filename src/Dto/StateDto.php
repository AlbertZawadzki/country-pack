<?php

namespace CountryPack\Dto;

readonly class StateDto
{
    public function __construct(
        public CountryDto $countryDto,
        public string     $name,
        public ?string    $code,
    )
    {
    }
}