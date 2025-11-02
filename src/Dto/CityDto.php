<?php

namespace CountryPack\Dto;

readonly class CityDto
{
    public function __construct(
        public StateDto $state,
        public string   $name,
        public ?float   $latitude,
        public ?float   $longitude,
    )
    {
    }
}