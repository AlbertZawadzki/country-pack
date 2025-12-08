<?php

namespace CountryPack\Mapper;

use CountryPack\Contracts\LocationNameMapperInterface;

class LocationEnglishNameMapper implements LocationNameMapperInterface
{
    public function mapToName(array $locationData): string
    {
        return $locationData['name'];
    }
}