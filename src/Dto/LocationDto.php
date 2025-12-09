<?php

namespace CountryPack\Dto;

use CountryPack\Enum\LocationNameType;
use CountryPack\Enum\LocationType;

readonly class LocationDto
{
    public function __construct(
        public ?int             $wgdPlaceId,
        public ?int             $wgdId,
        public LocationType     $type,
        public string           $name,
        public string           $originalName,
        public LocationNameType $nameType,
        public ?float           $latitude,
        public ?float           $longitude,
        public ?string          $administrationGroup,
        public bool             $isHistorical,
        public ?bool            $isCapital,
    )
    {
    }
}