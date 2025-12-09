<?php

namespace CountryPack\Factory;

use CountryPack\Contracts\LocationNameMapperInterface;
use CountryPack\Dto\LocationDto;
use CountryPack\Enum\LocationNameType;
use CountryPack\Enum\LocationType;

final class LocationFactory
{
    public function __construct(
        private readonly LocationNameMapperInterface $locationNameMapper,
    )
    {
    }

    public function createFromData(array $locationData): LocationDto
    {
        $name = $this->locationNameMapper->mapToName($locationData);

        return new LocationDto(
            $locationData['wgdPlaceId'] ?: null,
            $locationData['wgdId'] ?: null,
            LocationType::tryFrom($locationData['type']),
            $name,
            $locationData['fullName'],
            LocationNameType::tryFrom($locationData['nameType']),
            $locationData['latitude'],
            $locationData['longitude'],
            $locationData['administrationGroup'],
            $locationData['isHistorical'],
            $locationData['isCapital'],
        );
    }
}